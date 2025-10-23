<?php

namespace App\Http\Controllers;

use App\Models\WebExtra;
use Illuminate\Http\Request;

class FrontPrivacyController extends Controller
{
    public $privacy;
    public function index()
    {
        $this->privacy=WebExtra::latest()->first();
        return view('front.privacy.index',['privacy'=> $this->privacy]);
    }
}
