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
        $ads  = Ads::first();

        $mainPath   = public_path($news->image ?? 'default-news.jpg');
        $bannerPath = public_path($ads->head_banner ?? 'default-banner.jpg');

        // Facebook standard OG size
        $finalW = 1200;
        $finalH = 628;

        // Create canvas
        $finalImg = imagecreatetruecolor($finalW, $finalH);

        // White Background
        $white = imagecolorallocate($finalImg, 255, 255, 255);
        imagefilledrectangle($finalImg, 0, 0, $finalW, $finalH, $white);

        // Load main image
        $mainImg = $this->loadAnyImage($mainPath);
        if ($mainImg) {
            $mw = imagesx($mainImg);
            $mh = imagesy($mainImg);

            // Fit main image into top 70%
            $targetH = intval($finalH * 0.70);
            $scale = min($finalW / $mw, $targetH / $mh);

            $newMW = intval($mw * $scale);
            $newMH = intval($mh * $scale);

            $resizedMain = imagecreatetruecolor($newMW, $newMH);
            imagecopyresampled($resizedMain, $mainImg, 0, 0, 0, 0, $newMW, $newMH, $mw, $mh);

            $x = intval(($finalW - $newMW) / 2);
            $y = 0;

            imagecopy($finalImg, $resizedMain, $x, $y, 0, 0, $newMW, $newMH);
        }

        // Load banner
        $bannerImg = $this->loadAnyImage($bannerPath);
        if ($bannerImg) {

            $bw = imagesx($bannerImg);
            $bh = imagesy($bannerImg);

            // Fit banner into bottom 30%
            $targetBH = intval($finalH * 0.30);
            $scaleB = min($finalW / $bw, $targetBH / $bh);

            $newBW = intval($bw * $scaleB);
            $newBH = intval($bh * $scaleB);

            $resizedBanner = imagecreatetruecolor($newBW, $newBH);

            // Transparency enable
            imagealphablending($resizedBanner, false);
            imagesavealpha($resizedBanner, true);

            imagecopyresampled($resizedBanner, $bannerImg, 0, 0, 0, 0, $newBW, $newBH, $bw, $bh);

            // Bottom centered
            $bx = intval(($finalW - $newBW) / 2);
            $by = $finalH - $newBH;

            imagecopy($finalImg, $resizedBanner, $bx, $by, 0, 0, $newBW, $newBH);
        }

        header("Content-Type: image/jpeg");
        imagejpeg($finalImg, null, 90);

        imagedestroy($finalImg);
        exit;
    }

    private function loadAnyImage($path)
    {
        if (!file_exists($path)) return false;
        $info = getimagesize($path);
        if (!$info) return false;

        switch ($info['mime']) {
            case 'image/jpeg': return imagecreatefromjpeg($path);
            case 'image/png':  return imagecreatefrompng($path);
            case 'image/webp': return imagecreatefromwebp($path);
            case 'image/gif':  return imagecreatefromgif($path);
            default: return false;
        }
    }



}
