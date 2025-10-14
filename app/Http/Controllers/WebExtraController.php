<?php

namespace App\Http\Controllers;

use App\Models\WebExtra;
use Illuminate\Http\Request;
use RealRashid\SweetAlert\Facades\Alert;

class WebExtraController extends Controller
{
    public $webextra;
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $this->webextra =WebExtra::latest()->first();
        return view('admin.webextra.index',['webextra'=>$this->webextra]);
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        //
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        $this->webextra=new WebExtra();
        $this->webextra->about_us =$request->about_us;
        $this->webextra->privacy_and_policy =$request->privacy_and_policy;
        $this->webextra->terms_and_conditions =$request->terms_and_conditions;
        $this->webextra->save();
        Alert::success('All Info Add Successfully');
        return redirect()->back();
    }

    /**
     * Display the specified resource.
     */
    public function show(WebExtra $webExtra)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(WebExtra $webExtra)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request,$id)
    {
        $this->webextra=WebExtra::find($id);
        $this->webextra->about_us =$request->about_us;
        $this->webextra->privacy_and_policy =$request->privacy_and_policy;
        $this->webextra->terms_and_conditions =$request->terms_and_conditions;
        $this->webextra->save();
        Alert::success('All Info Update Successfully');
        return redirect()->back();
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(WebExtra $webExtra)
    {
        //
    }
}
