<?php

namespace App\Http\Controllers;

use App\Models\Editoral;
use Illuminate\Http\Request;
use RealRashid\SweetAlert\Facades\Alert;

class EditoralController extends Controller
{
    public $editoral;
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $this->editorial = Editoral::latest()->first();
        return view('admin.editoral.index',['editoral'=>$this->editorial]);
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
        $request->validate([
            'publisher_and_editor' => 'required|string|max:255|',
        ]);
        $this->editoral=new Editoral();
        $this->editoral->publisher_and_editor=$request->publisher_and_editor;
        $this->editoral->executive_editor=$request->executive_editor;
        $this->editoral->message_editor=$request->message_editor;
        $this->editoral->legal_advisor=$request->legal_advisor;
        $this->editoral->advisor=$request->advisor;
        $this->editoral->office=$request->office;
        $this->editoral->save();
        Alert::success('তথ্য আপডেট হয়েছে');
        return redirect()->back();

    }

    /**
     * Display the specified resource.
     */
    public function show(Editoral $editoral)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(Editoral $editoral)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request,$id)
    {
        $this->editoral=Editoral::find($id);
        $this->editoral->publisher_and_editor=$request->publisher_and_editor;
        $this->editoral->executive_editor=$request->executive_editor;
        $this->editoral->message_editor=$request->message_editor;
        $this->editoral->legal_advisor=$request->legal_advisor;
        $this->editoral->advisor=$request->advisor;
        $this->editoral->office=$request->office;
        $this->editoral->save();
        Alert::success('তথ্য আপডেট হয়েছে');
        return redirect()->back();

    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(Editoral $editoral)
    {
        //
    }
}
