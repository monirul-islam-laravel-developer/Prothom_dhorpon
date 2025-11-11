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
        $webLogo = Logo::first();

        // মূল image path
        $mainPath = public_path($news->image ?? 'default-news.jpg');
        $bannerPath = public_path($ads->head_banner ?? 'default-banner.jpg');
        $logoPath = public_path($webLogo->desktop_logo ?? 'default-logo.png');

        // Create main image
        $mainImg = imagecreatefromjpeg($mainPath);

        // Overlay banner
        if (file_exists($bannerPath)) {
            $bannerImg = imagecreatefromjpeg($bannerPath);
            $bannerWidth = imagesx($mainImg);
            $bannerHeight = imagesy($bannerImg);

            // Resize banner to main width
            $resizedBanner = imagecreatetruecolor($bannerWidth, $bannerHeight);
            imagecopyresampled($resizedBanner, $bannerImg, 0, 0, 0, 0, $bannerWidth, $bannerHeight, imagesx($bannerImg), imagesy($bannerImg));

            // Insert banner at bottom
            imagecopy($mainImg, $resizedBanner, 0, imagesy($mainImg)-$bannerHeight, 0, 0, $bannerWidth, $bannerHeight);

            imagedestroy($bannerImg);
            imagedestroy($resizedBanner);
        }

        // Overlay logo
        if (file_exists($logoPath)) {
            $logoImg = imagecreatefrompng($logoPath);
            $logoWidth = 100;
            $logoHeight = 100;

            $resizedLogo = imagecreatetruecolor($logoWidth, $logoHeight);
            // Preserve transparency
            imagesavealpha($resizedLogo, true);
            $transColor = imagecolorallocatealpha($resizedLogo, 0, 0, 0, 127);
            imagefill($resizedLogo, 0, 0, $transColor);

            imagecopyresampled($resizedLogo, $logoImg, 0, 0, 0, 0, $logoWidth, $logoHeight, imagesx($logoImg), imagesy($logoImg));

            // Insert logo at top-left
            imagecopy($mainImg, $resizedLogo, 10, 10, 0, 0, $logoWidth, $logoHeight);

            imagedestroy($logoImg);
            imagedestroy($resizedLogo);
        }

        // Output image as JPEG
        header('Content-Type: image/jpeg');
        imagejpeg($mainImg, null, 90);

        // Clean up
        imagedestroy($mainImg);
        exit;
    }






}
