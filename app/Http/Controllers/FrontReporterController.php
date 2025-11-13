<?php

namespace App\Http\Controllers;

use App\Models\Reporter;
use Illuminate\Http\Request;

class FrontReporterController extends Controller
{
    public $reporters,$reporter;
    public function index()
    {
        $this->reporters = Reporter::where('status', 1)->orderBy('id', 'asc')->get();
        return view('front.poribar.index',['reporters'=>$this->reporters]);
    }
    public function reporter_view($id)
    {
        $this->reporter = Reporter::find($id);
        return view('front.reporter.index',['reporter'=>$this->reporter]);
    }

}
