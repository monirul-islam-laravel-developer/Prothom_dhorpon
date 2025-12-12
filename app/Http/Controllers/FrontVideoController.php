<?php

namespace App\Http\Controllers;

use App\Models\Video;
use Illuminate\Http\Request;

class FrontVideoController extends Controller
{
    public $all_videos;
    public function index()
    {
        $this->all_videos =Video::orderBy('id','desc')->get();
        return view('front.video.index',['all_videos'=>$this->all_videos]);
    }
}
