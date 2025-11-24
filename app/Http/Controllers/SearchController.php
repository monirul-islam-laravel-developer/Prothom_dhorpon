<?php

namespace App\Http\Controllers;

use App\Models\Post;
use Illuminate\Http\Request;

class SearchController extends Controller
{
    public function index(Request $request)
    {
        $search_newes = Post::orderBy('id','desc')
            ->where('status', 1)
            ->where('title', 'LIKE', '%'.$request->search.'%')->get();   // <-- pagination 9

        return view('front.news.search-news', compact('search_newes'));
    }

}
