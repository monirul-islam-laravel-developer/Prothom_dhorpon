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
        $news = Post::findOrFail($id);
        $ads = Ads::first();

        $mainPath = public_path('uploads/news/' . ($news->image ?? 'default-news.jpg'));
        $bannerPath = public_path($ads->head_banner ?? 'default-banner.jpg');

        $mainImg = $this->loadAnyImage($mainPath);
        $bannerImg = $this->loadAnyImage($bannerPath);

        if (!$mainImg) abort(404);

        $mainW = imagesx($mainImg);
        $mainH = imagesy($mainImg);

        if ($bannerImg) {
            $bw = imagesx($bannerImg);
            $bh = imagesy($bannerImg);

            $newBW = $mainW;
            $newBH = intval(($bh / $bw) * $newBW);

            $resizedBanner = imagecreatetruecolor($newBW, $newBH);
            imagealphablending($resizedBanner, false);
            imagesavealpha($resizedBanner, true);

            imagecopyresampled($resizedBanner, $bannerImg, 0, 0, 0, 0, $newBW, $newBH, $bw, $bh);
            imagecopy($mainImg, $resizedBanner, 0, $mainH - $newBH, 0, 0, $newBW, $newBH);

            imagedestroy($bannerImg);
            imagedestroy($resizedBanner);
        }

        return response()->stream(function() use ($mainImg) {
            imagejpeg($mainImg, null, 90);
            imagedestroy($mainImg);
        }, 200, [
            'Content-Type' => 'image/jpeg',
            'Cache-Control' => 'public, max-age=3600'
        ]);
    }

    private function loadAnyImage($path)
    {
        if (!file_exists($path)) return false;
        $info = @getimagesize($path);
        if (!$info) return false;

        switch ($info['mime']) {
            case 'image/jpeg': return imagecreatefromjpeg($path);
            case 'image/png': return imagecreatefrompng($path);
            case 'image/webp': return imagecreatefromwebp($path);
            case 'image/gif': return imagecreatefromgif($path);
            default: return false;
        }
    }












}
