<?php

namespace App\Http\Controllers;

use App\Models\Slider;
use App\Models\Video;
use Illuminate\Http\Request;

class FrontController extends Controller
{
    public $sliders,$videos5;
    public function index()
    {
        $this->sliders = Slider::latest()->take(8)->get();
        $this->videos5=Video::where('status',1)-> orderBy('id','desc')->take(5)->get();
        return view('front.home.index',[
            'sliders'=>$this->sliders,
            'videos5'=>$this->videos5
        ]);
    }
}
