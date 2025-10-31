<?php

namespace App\Http\Controllers;

use App\Models\Post;
use Illuminate\Http\Request;

class PrintController extends Controller
{
    public $news;
    public function index($id)
    {
        $this->news=Post::find($id);
        return view('front.print.index',['news'=>$this->news]);
    }
}
