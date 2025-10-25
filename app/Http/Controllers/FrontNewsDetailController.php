<?php

namespace App\Http\Controllers;

use App\Models\Post;
use Illuminate\Http\Request;

class FrontNewsDetailController extends Controller
{
    public $news;
    public function index($id)
    {
        $this->news = Post::where('id', $id)->where('status', 1)->first();

        return view('front.news-detail.index',['news'=>$this->news]);
    }
}
