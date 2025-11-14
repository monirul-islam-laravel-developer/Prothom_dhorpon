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

        $finalWidth  = 1200;
        $finalHeight = 630;

        // Create final canvas
        $final = imagecreatetruecolor($finalWidth, $finalHeight);

        // White background
        $white = imagecolorallocate($final, 255, 255, 255);
        imagefill($final, 0, 0, $white);

        // MAIN IMAGE
        $mainPath = public_path($news->image);
        $mainImg = @imagecreatefromjpeg($mainPath);

        // যদি jpg না হয় (png হলে)
        if (!$mainImg && file_exists($mainPath)) {
            $mainImg = @imagecreatefrompng($mainPath);
        }

        // BANNER IMAGE
        $bannerPath = public_path($ads->head_banner);
        $bannerImg = @imagecreatefromjpeg($bannerPath);

        if (!$bannerImg && file_exists($bannerPath)) {
            $bannerImg = @imagecreatefrompng($bannerPath);
        }

        // Resize main image (top)
        imagecopyresampled(
            $final, $mainImg,
            0, 0, 0, 0,
            1200, 450,
            imagesx($mainImg), imagesy($mainImg)
        );

        // Resize banner (bottom)
        imagecopyresampled(
            $final, $bannerImg,
            0, 450, 0, 0,
            1200, 180,
            imagesx($bannerImg), imagesy($bannerImg)
        );

        // Save final output
        $save = public_path("og-images/og-$id.jpg");
        imagejpeg($final, $save, 90);

        // destroy memory
        imagedestroy($final);
        imagedestroy($mainImg);
        imagedestroy($bannerImg);

        // Return proper image header
        return response()->file($save)->header('Content-Type', 'image/jpeg');
    }





}
