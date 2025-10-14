<?php

namespace App\Http\Controllers;

use App\Models\Video;
use Illuminate\Http\Request;
use RealRashid\SweetAlert\Facades\Alert;

class VideoController extends Controller
{
    public $videos,$video;
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $this->videos=Video::orderBy('id','desc')->get();
        return view('admin.video.index',['videos'=>$this->videos]);
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        return view('admin.video.create');
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        Video::storeVideo($request);
        Alert::success('Video Add Successfully');
        return redirect()->back();
    }

    /**
     * Display the specified resource.
     */
    public function show($id)
    {
        $this->video=Video::find($id);
        if ($this->video->status==1)
        {
            $this->video->status=2;
            Alert::warning('Video Inactive');
        }
        else
        {
            $this->video->status=1;
            Alert::Success('Video Active');
        }
        $this->video->save();

        return redirect('/video');
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit($id)
    {
        $this->video =Video::find($id);
        return view('admin.video.edit',['video'=>$this->video]);
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request,$id)
    {
        Video::updateVideo($request,$id);
        Alert::success('Video Update Successfully');
        return redirect('/video');
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy($id)
    {
        $this->video =Video::find($id);
        if (file_exists($this->video->image))
        {
            unlink($this->video->image);
        }
        $this->video->delete();
        Alert::success('Video Delete Successfully');
        return redirect('/video');
    }
}
