<?php

namespace App\Http\Controllers;

use App\Models\Logo;
use App\Models\Slider;
use Illuminate\Http\Request;
use RealRashid\SweetAlert\Facades\Alert;
use function Illuminate\Broadcasting\via;

class SliderController extends Controller
{
    public $sliders,$slider;
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $this->sliders=Slider::orderBy('id','desc')->get();
        return view('admin.slider.index',['sliders'=>$this->sliders]);
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        return view('admin.slider.create');
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        Slider::storeSlider($request);
        Alert::success('Slider Add Successfully');
        return redirect()->back();
    }

    /**
     * Display the specified resource.
     */
    public function show($id)
    {
        $this->slider=Slider::find($id);
        if ($this->slider->status==1)
        {
            $this->slider->status=2;
            Alert::warning('This Slider Inactive');
        }
        else
        {
            $this->slider->status=1;
            Alert::Success('This Slider Active');
        }
        $this->slider->save();

        return redirect('/slider');
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit($id)
    {
        $this->slider =Slider::find($id);
        return view('admin.slider.edit',['slider'=>$this->slider]);
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request,$id)
    {
        Slider::updateSlider($request,$id);
        Alert::success('Slider Update Successfully');
        return redirect('/slider');
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy($id)
    {
        $this->slider =Slider::find($id);
        if (file_exists($this->slider->image))
        {
            unlink($this->slider->image);
        }
        $this->slider->delete();
        Alert::success('Slider Delete Successfully');
        return redirect('/slider');
    }
}
