<?php

namespace App\Http\Controllers;

use App\Models\WebExtra;
use Illuminate\Http\Request;

class Terms_and_ConditionController extends Controller
{
    public $terms;
    public function index()
    {
        $this->terms=WebExtra::latest()->first();
        return view('front.terms.index',['terms'=>$this->terms]);
    }
}
