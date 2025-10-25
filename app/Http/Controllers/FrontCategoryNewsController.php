<?php

namespace App\Http\Controllers;

use App\Models\Category;
use App\Models\Post;
use Illuminate\Http\Request;

class FrontCategoryNewsController extends Controller
{
    public $category,$cat_newses;
    public function index($id)
    {
        $this->category =Category::find($id);
        $this->cat_newses = Post::where('status', 1)->where('category_id', $this->category->id)->get();


        return view('front.cat_news.index',[
            'category'=>$this->category,
            'cat_newses'=>$this->cat_newses
            ]);
    }
}
