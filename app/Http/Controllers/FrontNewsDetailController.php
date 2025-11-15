<?php

namespace App\Http\Controllers;

use App\Models\Ads;
use App\Models\Logo;
use App\Models\Post;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Cache;
use Carbon\Carbon; // আগে থেকে যদি না থাকে



class FrontNewsDetailController extends Controller
{
    public $news,$relatedNews;
    public function index($id)
    {
        // Post fetch
        $news = Post::where('id', $id)
            ->where('status', 1)
            ->firstOrFail();

        $random = range(1, 100);
        $add = 100 + $random[array_rand($random)];
        $news->increment('view_count', $add);


        // Related news
        $relatedNews = Post::where('category_id', $news->category_id)
            ->where('status', 1)
            ->where('id', '!=', $id)
            ->latest()
            ->take(6)
            ->get();

        // Today's Views using Cache
        $today = Carbon::now()->toDateString();
        $cacheKey = "post_{$id}_views_{$today}";

        if (Cache::has($cacheKey)) {
            Cache::increment($cacheKey);
        } else {
            Cache::put($cacheKey, 1, 86400); // 24 hours
        }

        $todayViews = Cache::get($cacheKey);

        return view('front.news-detail.index', compact('news', 'relatedNews', 'todayViews'));
    }
    public function show($id)
    {
        $news = Post::where('id', $id)->where('status', 1)->firstOrFail();
        return view('news.show', compact('news'));
    }

    public function ogImage($id)
    {
        $news = Post::where('id', $id)->where('status', 1)->firstOrFail();
        $ads = Ads::first();

        $mainPath = public_path($news->image ?? 'default-news.jpg');
        $bannerPath = public_path($ads->news_pics_under_ads ?? 'default-banner.jpg');

        $mainImg = $this->loadAnyImage($mainPath);
        if (!$mainImg) abort(404, "Main Image Not Found");

        $mainW = imagesx($mainImg);
        $mainH = imagesy($mainImg);

        if (file_exists($bannerPath)) {
            $bannerImg = $this->loadAnyImage($bannerPath);
            if ($bannerImg) {
                $bw = imagesx($bannerImg);
                $bh = imagesy($bannerImg);

                // Scale banner width to main image width
                $newBW = $mainW;
                $newBH = intval(($bh / $bw) * $newBW);

                $resizedBanner = imagecreatetruecolor($newBW, $newBH);

                // Preserve transparency for PNG/GIF
                imagealphablending($resizedBanner, false);
                imagesavealpha($resizedBanner, true);
                $transparent = imagecolorallocatealpha($resizedBanner, 0, 0, 0, 127);
                imagefill($resizedBanner, 0, 0, $transparent);

                imagecopyresampled($resizedBanner, $bannerImg, 0, 0, 0, 0, $newBW, $newBH, $bw, $bh);

                // Place banner at bottom
                imagecopy($mainImg, $resizedBanner, 0, $mainH - $newBH, 0, 0, $newBW, $newBH);

                imagedestroy($bannerImg);
                imagedestroy($resizedBanner);
            }
        }

        // Always return JPEG
        header('Content-Type: image/jpeg');
        imagejpeg($mainImg, null, 90);

        imagedestroy($mainImg);
        exit;
    }

    private function loadAnyImage($path)
    {
        if (!file_exists($path)) return false;
        $info = @getimagesize($path);
        if (!$info) return false;

        switch ($info['mime']) {
            case 'image/jpeg':
                return imagecreatefromjpeg($path);
            case 'image/png':
                return imagecreatefrompng($path);
            case 'image/webp':
                return imagecreatefromwebp($path);
            case 'image/gif':
                return imagecreatefromgif($path);
            default:
                return false;
        }
    }







}
