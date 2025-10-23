<?php

namespace App\Http\Controllers;

use App\Models\Notice;
use Illuminate\Http\Request;
use Illuminate\Support\Str;
use RealRashid\SweetAlert\Facades\Alert;

class NoticeController extends Controller
{
    public $notices,$notice;
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $this->notices =Notice::orderBy('id','desc')->get();
        return view('admin.notice.index',['notices'=>$this->notices]);
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        return view('admin.notice.create');
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        $this->$notice=new  Notice();
        $this->$notice->title=$request->title;
        $this->$notice->slug=Str::slug($request->slug);
        $this->notice->save();
        Alert::success('Notice Create Successfull');
    }

    /**
     * Display the specified resource.
     */
    public function show(Notice $notice)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(Notice $notice)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, Notice $notice)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(Notice $notice)
    {
        //
    }
}
