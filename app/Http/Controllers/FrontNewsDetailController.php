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

        // Final OG Image Size (Facebook recommended)
        $finalWidth  = 1200;
        $finalHeight = 630;

        // Create blank final image canvas
        $final = imagecreatetruecolor($finalWidth, $finalHeight);

        // White Background
        $white = imagecolorallocate($final, 255, 255, 255);
        imagefill($final, 0, 0, $white);

        // Load main news image
        $mainPath = public_path($news->image ?? 'default-news.jpg');
        $mainImg = imagecreatefromjpeg($mainPath);

        // Load banner ad
        $bannerPath = public_path($ads->head_banner ?? 'default-banner.jpg');
        $bannerImg = imagecreatefromjpeg($bannerPath);

        // Resize main image into 1200x450
        $mainTargetH = 450;
        $mainTargetW = 1200;
        imagecopyresampled($final, $mainImg, 0, 0, 0, 0, $mainTargetW, $mainTargetH, imagesx($mainImg), imagesy($mainImg));

        // Resize banner into 1200x180
        $bannerTargetH = 180;
        $bannerTargetW = 1200;
        imagecopyresampled($final, $bannerImg, 0, $mainTargetH, 0, 0, $bannerTargetW, $bannerTargetH, imagesx($bannerImg), imagesy($bannerImg));

        // Save final OG image
        $savePath = public_path("og-images/og-$id.jpg");
        imagejpeg($final, $savePath, 90);

        imagedestroy($final);
        imagedestroy($mainImg);
        imagedestroy($bannerImg);

        return response()->file($savePath);
    }




}
