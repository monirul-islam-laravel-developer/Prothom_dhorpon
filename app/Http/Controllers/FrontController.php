<?php

namespace App\Http\Controllers;

use App\Models\Category;
use App\Models\Post;
use App\Models\Slider;
use App\Models\Video;
use Illuminate\Http\Request;

class FrontController extends Controller
{
    public $jatiyo,$jatiyonewses,$rajniti,$rajnitinewses,$antorjarrtik,$antarjarrtiknewses,
    $kheladhula,$kheladhulanewses,$saradesh,$saradeshnews1;
    public $sliders,$videos5;
    public function index()
    {
        $this->jatiyos = Category::where('status', 1)->where('id', 2)->first();
        $this->rajniti = Category::where('status', 1)->where('id', 3)->first();
        $this->antorjarrtik = Category::where('status', 1)->where('id', 5)->first();
        $this->kheladhula= Category::where('status', 1)->where('id', 6)->first();
        $this->saradesh= Category::where('status', 1)->where('id', 9)->first();
        $this->jatiyonewses = Post::where('status', 1)->where('category_id', $this->jatiyos->id ?? null)->take(8)->get();
        $this->rajnitinewses = Post::where('status', 1)->where('category_id', $this->rajniti->id ?? null)->take(8)->get();
        $this->antarjarrtiknewses=Post::where('status', 1)->where('category_id', $this->antorjarrtik->id ?? null)->take(8)->get();
        $this->kheladhulanewses=Post::where('status', 1)->where('category_id', $this->kheladhula->id ?? null)->take(8)->get();
        $this->saradeshnews1=Post::where('status', 1)->where('category_id', $this->saradesh->id ?? null)->take(1)->get();


        $this->sliders = Slider::latest()->take(8)->get();
        $this->videos5=Video::where('status',1)-> orderBy('id','desc')->take(5)->get();
        return view('front.home.index',[
            'sliders'=>$this->sliders,
            'videos5'=>$this->videos5,
            'jatiyo'=>$this->jatiyos,
            'jatiyonewses'=>$this->jatiyonewses,
            'rajniti'=>$this->rajniti,
            'rajnitinewses'=>$this->rajnitinewses,
            'antorjarrtik'=>$this->antorjarrtik,
            'antarjarrtiknewses'=>$this->antarjarrtiknewses,
            'kheladhula'=>$this->kheladhula,
            'kheladhulanewses'=>$this->kheladhulanewses,
            'saradesh'=>$this->saradesh,
            'saradeshnews1'=>$this->saradeshnews1
        ]);
    }
}
