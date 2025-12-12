<?php

namespace App\Http\Controllers;

use App\Models\Slider;
use Illuminate\Http\Request;

class FrontPhotogalleryController extends Controller
{
    public $all_photosgalleries;
    public function index()
    {
        $this->all_photosgalleries =Slider::orderBy('id','desc')->get();
        return view('front.photogallery.index',['all_photosgalleries'=>$this->all_photosgalleries]);
    }
}
