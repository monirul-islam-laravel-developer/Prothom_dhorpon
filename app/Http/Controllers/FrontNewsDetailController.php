<?php

namespace App\Http\Controllers;

use App\Models\Post;
use Illuminate\Http\Request;

class FrontNewsDetailController extends Controller
{
    public $news,$relatedNews;
    public function index($id)
    {
        // নিউজ খোঁজা
        $this->news = Post::where('id', $id)
            ->where('status', 1)
            ->firstOrFail();

//        // 🔹 Session key (প্রতি নিউজের জন্য আলাদা)
        $this->news->increment('view_count');
//        $sessionKey = 'news_viewed_' . $id;
////
//        // যদি session এ না থাকে, তাহলে একবারই view বাড়াবে
//        if (!session()->has($sessionKey)) {
//            $this->news->increment('view_count');
//            session()->put($sessionKey, true);
//        }

        $this->relatedNews = Post::where('category_id', $this->news->category_id)
            ->where('status', 1)
            ->where('id', '!=', $id)
            ->latest()
            ->take(6)
            ->get();

        // 🔹 Related News Logic
//        if (!is_null($this->news->upazela_id)) {
//            $this->relatedNews = Post::where('upazela_id', $this->news->upazela_id)
//                ->where('status', 1)
//                ->where('id', '!=', $id)
//                ->latest()
//                ->take(6)
//                ->get();
//        } elseif (!is_null($this->news->district_id)) {
//            $this->relatedNews = Post::where('district_id', $this->news->district_id)
//                ->where('status', 1)
//                ->where('id', '!=', $id)
//                ->latest()
//                ->take(6)
//                ->get();
//        } elseif (!is_null($this->news->subcategory_id)) {
//            $this->relatedNews = Post::where('subcategory_id', $this->news->subcategory_id)
//                ->where('status', 1)
//                ->where('id', '!=', $id)
//                ->latest()
//                ->take(6)
//                ->get();
//        } elseif (!is_null($this->news->category_id)) {
//            $this->relatedNews = Post::where('category_id', $this->news->category_id)
//                ->where('status', 1)
//                ->where('id', '!=', $id)
//                ->latest()
//                ->take(6)
//                ->get();
//        } else {
//            $this->relatedNews = collect();
//        }

        // 🔹 View এ পাঠানো
        return view('front.news-detail.index', [
            'news' => $this->news,
            'relatedNews' => $this->relatedNews,
        ]);
    }


}
