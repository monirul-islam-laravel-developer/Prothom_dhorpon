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
        $request->validate([
            'title' => 'required|string|max:255',
        ]);
        $this->notice=new  Notice();
        $this->notice->title=$request->title;
        $this->notice->slug=Str::slug($request->slug);
        $this->notice->save();
        Alert::success('Notice Create Successfull');
        return redirect()->back();
    }

    /**
     * Display the specified resource.
     */
    public function show($id)
    {

        $this->notice=Notice::find($id);
        if ($this->notice->status==1)
        {
            $this->notice->status=2;
            Alert::warning('Notice Inactive');
        }
        else
        {
            $this->notice->status=1;
            Alert::Success('Notice Active');
        }
        $this->notice->save();

        return redirect('/notice');
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit($id)
    {
        $this->notice =Notice::find($id);
        return view('admin.notice.edit',['notice'=>$this->notice]);
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request,$id)
    {
        $request->validate([
            'title' => 'required|string|max:255',
        ]);
        $this->notice=Notice::find($id);
        $this->notice->title=$request->title;
        $this->notice->slug=Str::slug($request->slug);
        $this->notice->save();
        Alert::success('Notice Update Successfull');
        return redirect('notice');
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy($id)
    {
        $this->notice=Notice::find($id);
        $this->notice->delete();
        Alert::success('Notice Delete Successfull');
        return redirect('notice');
    }
}
