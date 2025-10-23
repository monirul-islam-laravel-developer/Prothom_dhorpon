<?php

namespace App\Http\Controllers;

use App\Models\Reporter;
use Illuminate\Http\Request;

class FrontReporterController extends Controller
{
    public $reporters;
    public function index()
    {
        $this->reporters = Reporter::where('status', 1)->orderBy('id', 'asc')->get();
        return view('front.poribar.index',['reporters'=>$this->reporters]);
    }
}
