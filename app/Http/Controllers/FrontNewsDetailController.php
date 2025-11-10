<?php

namespace App\Http\Controllers;

use App\Models\Post;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Cache;
use Carbon\Carbon; // আগে থেকে যদি না থাকে
use Intervention\Image\ImageManager;
use Intervention\Image\Drivers\Gd\Driver;


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
    public function image($id)
    {
        $news = Post::where('id', $id)
            ->where('status', 1)
            ->firstOrFail();

        $ads = Ads::first();
        $webLogo = WebLogo::first();

        $manager = new ImageManager(['driver' => 'gd']);

        // Create base canvas 1200x630
        $canvas = $manager->canvas(1200, 630, '#ffffff');

        // Main image
        if ($news->image && file_exists(public_path($news->image))) {
            $mainImage = $manager->make(public_path($news->image))
                ->resize(1200, 630, function ($constraint) {
                    $constraint->aspectRatio();
                    $constraint->upsize();
                });
            $canvas->insert($mainImage, 'center');
        }

        // Banner overlay at bottom
        if ($ads && $ads->head_banner && file_exists(public_path($ads->head_banner))) {
            $banner = $manager->make(public_path($ads->head_banner))
                ->resize(1200, null, function ($constraint) {
                    $constraint->aspectRatio();
                });
            $canvas->insert($banner, 'bottom');
        }

        // Logo overlay at top-left
        if ($webLogo && $webLogo->desktop_logo && file_exists(public_path($webLogo->desktop_logo))) {
            $logo = $manager->make(public_path($webLogo->desktop_logo))
                ->resize(150, 150, function ($constraint) {
                    $constraint->aspectRatio();
                    $constraint->upsize();
                });
            $canvas->insert($logo, 'top-left', 20, 20);
        }

        // Response without saving
        return $canvas->response('jpg');
    }



}
