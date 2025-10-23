<?php

namespace App\Http\Controllers;

use App\Models\WebExtra;
use Illuminate\Http\Request;

class FrontAboutUsController extends Controller
{
    public $about_us;
    public function index()
    {
        $this->about_us = WebExtra::latest()->first();
        return view('front.aboutus.index',['aboutus'=>$this->about_us]);
    }
}
