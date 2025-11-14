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

        $mainImg = $this->loadAnyImage($mainPath);
        if (!$mainImg) abort(404);

        $mainW = imagesx($mainImg);
        $mainH = imagesy($mainImg);

        $bannerImg = $this->loadAnyImage($bannerPath);

        if ($bannerImg) {

            // ORIGINAL banner details
            $bw = imagesx($bannerImg);
            $bh = imagesy($bannerImg);

            // ---- FIX 1: Banner বড় হলে proportionally resize ----
            if ($bw > $mainW) {
                $scale = $mainW / $bw;
                $newBW = $mainW;
                $newBH = intval($bh * $scale);
            } else {
                // ছোট হলে original রাখবো
                $newBW = $bw;
                $newBH = $bh;
            }

            // ---- FIX 2: Always make proper canvas for resized banner ----
            $bannerFinal = imagecreatetruecolor($newBW, $newBH);

            // Support PNG transparency
            imagealphablending($bannerFinal, false);
            imagesavealpha($bannerFinal, true);

            // Proper resample
            imagecopyresampled($bannerFinal, $bannerImg, 0, 0, 0, 0, $newBW, $newBH, $bw, $bh);

            // ---- FIX 3: Create new final canvas (mainH + bannerH) ----
            $newHeight = $mainH + $newBH;
            $final = imagecreatetruecolor($mainW, $newHeight);

            // White BG
            $white = imagecolorallocate($final, 255, 255, 255);
            imagefilledrectangle($final, 0, 0, $mainW, $newHeight, $white);

            // Main image on top
            imagecopy($final, $mainImg, 0, 0, 0, 0, $mainW, $mainH);

            // Banner perfectly centered
            $x = intval(($mainW - $newBW) / 2);
            imagecopy($final, $bannerFinal, $x, $mainH, 0, 0, $newBW, $newBH);

            $mainImg = $final;
        }

        header('Content-Type: image/jpeg');
        imagejpeg($mainImg, null, 90);
        imagedestroy($mainImg);
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
