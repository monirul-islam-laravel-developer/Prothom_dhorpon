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

        // Increment total view_count
        $news->increment('view_count', 100);

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
// app/Http/Controllers/FrontNewsDetailController.php
    public function ogImage($id)
    {
        $news = Post::where('id', $id)->where('status', 1)->firstOrFail();
        $ads = Ads::first();

        // মূল image path
        $mainPath = public_path($news->image ?? 'default-news.jpg');
        $bannerPath = public_path($ads->head_banner ?? 'default-banner.jpg');

        // মূল image তৈরি
        $mainImg = imagecreatefromjpeg($mainPath);
        $mainWidth = imagesx($mainImg);
        $mainHeight = imagesy($mainImg);

        // Banner overlay
        if (file_exists($bannerPath)) {
            $bannerImg = imagecreatefromjpeg($bannerPath);

            // Banner height = মূল image height-এর 20%
            $bannerWidth = $mainWidth;
            $bannerHeight = intval($mainHeight * 0.2);

            $resizedBanner = imagecreatetruecolor($bannerWidth, $bannerHeight);

            // Preserve transparency for PNG if needed
            imagecopyresampled(
                $resizedBanner,
                $bannerImg,
                0, 0, 0, 0,
                $bannerWidth,
                $bannerHeight,
                imagesx($bannerImg),
                imagesy($bannerImg)
            );

            // Insert banner at bottom
            imagecopy($mainImg, $resizedBanner, 0, $mainHeight - $bannerHeight, 0, 0, $bannerWidth, $bannerHeight);

            imagedestroy($bannerImg);
            imagedestroy($resizedBanner);
        }

        // Output image as JPEG
        header('Content-Type: image/jpeg');
        imagejpeg($mainImg, null, 90);

        // Clean up
        imagedestroy($mainImg);
        exit;
    }







}
