<?php

namespace App\Http\Controllers;

use App\Models\SubCategory;
use App\Models\SubsubCategory;
use Illuminate\Http\Request;
use Illuminate\Support\Str;
use RealRashid\SweetAlert\Facades\Alert;

class SubsubCategoryController extends Controller
{
    public $subsubcategories,$subsubcategory,$subcategories;
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $this->subsubcategories =SubsubCategory::orderBy('id','asc')->get();
        return view('admin.subsubcategory.index',['subsubcategories'=>$this->subsubcategories]);
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        $this->subcategories = SubCategory::whereBetween('id', [9, 16])->orderBy('id', 'asc')->get();
        return view('admin.subsubcategory.create',['subcategories9'=>$this->subcategories]);
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        $request->validate([
            'name' => 'required|unique:subsub_categories,name',
            'subcategory_id' => 'required',
        ]);

       $this->subsubcategory = new SubsubCategory();
       $this->subsubcategory->name=$request->name;
       $this->subsubcategory->slug=Str::slug($request->name);
       $this->subsubcategory->description=$request->description;
       $this->subsubcategory->seo_tag=$request->seo_tag;
       $this->subsubcategory->subcategory_id=$request->subcategory_id;
       $this->subsubcategory->save();
       Alert::success('Dristrict Add Successfull ');
       return redirect()->back();

    }

    /**
     * Display the specified resource.
     */
    public function show($id)
    {
        $this->subsubcategory=SubsubCategory::find($id);
        if ($this->subsubcategory->status==1)
        {
            $this->subsubcategory->status=2;
            Alert::warning('This Slider Inactive');
        }
        else
        {
            $this->subsubcategory->status=1;
            Alert::Success('This Slider Active');
        }
        $this->subsubcategory->save();

        return redirect('/subsubcategory');
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit($id)
    {
        $this->subsubcategory=SubsubCategory::find($id);
        $this->subcategories = SubCategory::whereBetween('id', [9, 16])->orderBy('id', 'asc')->get();

        return view('admin.subsubcategory.edit',[
            'subsubcategory'=>$this->subsubcategory,
            'subcategories9'=> $this->subcategories
        ]);

    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request,$id)
    {
        $this->subsubcategory=SubsubCategory::find($id);
        $this->subsubcategory->name=$request->name;
        $this->subsubcategory->slug=Str::slug($request->name);
        $this->subsubcategory->description=$request->description;
        $this->subsubcategory->subcategory_id=$request->subcategory_id;
        $this->subsubcategory->seo_tag=$request->seo_tag;
        $this->subsubcategory->save();
        Alert::success('Dristrict Update Successfully');
        return redirect('/subsubcategory');
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy($id)
    {
        $this->subsubcategory=SubsubCategory::find($id);
        $this->subsubcategory->delete();
        Alert::success('Dristrict Delete Successfully');
        return redirect('/subsubcategory');
    }

}
