<?php

namespace App\Http\Controllers;

use App\Models\Post;
use Illuminate\Http\Request;

class FrontLatestnewsController extends Controller
{
    public $all_latestnewses;
    public function index()
    {
        $this->all_latestnewses = Post::where('status', 1)
            ->orderBy('id', 'desc')
            ->paginate(40); // 10 items per page

        return view('front.latest.index',['all_latestnewses'=>$this->all_latestnewses]);
    }
}
