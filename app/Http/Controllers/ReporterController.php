<?php

namespace App\Http\Controllers;

use App\Models\Reporter;
use Illuminate\Http\Request;
use RealRashid\SweetAlert\Facades\Alert;

class ReporterController extends Controller
{
    public $reporters;
    public $reporter;
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $this->reporters=Reporter::orderBy('id','asc')->get();
        return view('admin.reporter.index',['reporters'=>$this->reporters]);
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        return view('admin.reporter.create');
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        Reporter::storeReporter($request);
        Alert::success('Reporter Add Successfully');
        return redirect()->back();
    }

    /**
     * Display the specified resource.
     */
    public function show($id)
    {
        $this->reporter=Reporter::find($id);
        if ($this->reporter->status==1)
        {
            $this->reporter->status=2;
            Alert::warning('This Reporter Inactive');
        }
        else
        {
            $this->reporter->status=1;
            Alert::Success('This Reporter Active');
        }
        $this->reporter->save();

        return redirect('/reporter');

    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit($id)
    {
        $this->reporter =Reporter::find($id);
        return view('admin.reporter.edit',['reporter'=>$this->reporter]);

    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, $id)
    {
        Reporter::updateReporter($request,$id);
        Alert::success('Reporter Update Successfully');
        return redirect('/reporter');

    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy($id)
    {
        $this->reporter=Reporter::find($id);
        if (file_exists($this->reporter->image))
        {
            unlink($this->reporter->image);
        }
        $this->reporter->delete();
        Alert::success('Reporter Delete Successfully');
        return redirect('/reporter');
    }
}
