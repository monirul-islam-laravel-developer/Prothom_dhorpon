<?php

namespace App\Http\Controllers;

use App\Models\Post;
use Illuminate\Http\Request;

class PhotoCartController extends Controller
{
    public $news;
    public function index($id)
    {
        $this->news=Post::find($id);
        return view('front.photocart.index',['news'=>$this->news]);
    }
}
