<?php

namespace App\Http\Controllers;

use App\Models\SubCategory;
use App\Models\SubsubCategory;
use App\Models\Upazila;
use Illuminate\Http\Request;
use Illuminate\Support\Str;
use RealRashid\SweetAlert\Facades\Alert;

class UpazilaController extends Controller
{
    public $upazilas,$upazila,$subcategories9,$subsubcategories,$divisions;
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $this->upazilas=Upazila::orderBy('id','asc')->get();
        return view('admin.upazila.index',['upazilas'=>$this->upazilas]);
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        $this->subsubcategories=SubsubCategory::orderBy('id','asc')->get();
        $this->divisions = SubCategory::whereBetween('id',[9, 16])->orderBy('id', 'asc')->get();
        return view('admin.upazila.create',[
            'divisions'=>$this->divisions,
            'subsubcategories'=>$this->subsubcategories
            ]);
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        $request->validate([
            'sub_categories_id' => 'required',          // Division
            'subsub_categories_id' => 'required',       // District
            'name' => 'required|unique:upazilas,name', // Upazila name
        ]);
        $this->upazila = new Upazila();
        $this->upazila->sub_categories_id =$request->sub_categories_id;
        $this->upazila->subsub_categories_id =$request->subsub_categories_id;
        $this->upazila->name =$request->name;
        $this->upazila->slug =Str::slug($request->name);
        $this->upazila->description =$request->description;
        $this->upazila->seo_tag=$request->seo_tag;
        $this->upazila->save();
        Alert::success('Upazila Add Successfully');
        return redirect()->back();
    }

    /**
     * Display the specified resource.
     */
    public function show($id)
    {
        $this->upazila=Upazila::find($id);
        if ($this->upazila->status==1)
        {
            $this->upazila->status=2;
            Alert::warning('This Upazila Inactive');
        }
        else
        {
            $this->upazila->status=1;
            Alert::Success('This Upazila Active');
        }
        $this->upazila->save();

        return redirect('/upazila');
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit($id)
    {
        $this->subsubcategories=SubsubCategory::orderBy('id','asc')->get();
        $this->divisions =SubCategory::whereBetween('id', [9, 16])->orderBy('id', 'asc')->get();
        $this->upazila =Upazila::find($id);
        return view('admin.upazila.edit',[
            'upazila'=>$this->upazila,
            'subsubcategories'=>$this->subsubcategories,
            'divisions'=>$this->divisions
            ]);
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request,$id)
    {
        $this->upazila =Upazila::find($id);
        $this->upazila->sub_categories_id =$request->sub_categories_id;
        $this->upazila->subsub_categories_id =$request->subsub_categories_id;
        $this->upazila->name =$request->name;
        $this->upazila->slug =Str::slug($request->name);
        $this->upazila->description =$request->description;
        $this->upazila->seo_tag=$request->seo_tag;
        $this->upazila->save();
        Alert::success('Upazila Update Successfully');
        return redirect('/upazila');
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy($id)
    {
        $this->upazila =Upazila::find($id);
        $this->upazila->delete();
        Alert::success('Upazila Delete Successfully');
        return redirect('/upazila');

    }
    public function getDistricts($division_id)
    {
        $districts = SubsubCategory::where('subcategory_id', $division_id)->get(['id', 'name']);
        return response()->json($districts);
    }


}
