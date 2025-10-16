<?php

namespace App\Http\Controllers;

use App\Models\Ads;
use Illuminate\Http\Request;
use RealRashid\SweetAlert\Facades\Alert;

class AdsController extends Controller
{
    public $ads;
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $this->ads=Ads::latest()->first();
        return view('admin.ads.index',['ads'=>$this->ads]);
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
        Ads::storeAds($request);
        Alert::success('Ads Add Successfull');
        return redirect()->back();
    }

    /**
     * Display the specified resource.
     */
    public function show(Ads $ads)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(Ads $ads)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request,$id)
    {
        Ads::updateAds($request,$id);
        Alert::success('Ads Update Successfull');
        return redirect()->back();
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(Ads $ads)
    {
        //
    }
}
