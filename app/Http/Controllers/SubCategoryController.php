<?php

namespace App\Http\Controllers;

use App\Models\Category;
use App\Models\SubCategory;
use Illuminate\Http\Request;
use RealRashid\SweetAlert\Facades\Alert;

class SubCategoryController extends Controller
{
    public $subcategories;
    public $subcategory;
    public $categories;
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $this->subcategories =SubCategory::orderBy('id','asc')->get();
        return view('admin.subcategory.index',['subcategories'=>$this->subcategories]);
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        $this->categories=Category::all();
        return view('admin.subcategory.create',['categories'=>$this->categories]);
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        SubCategory::storeSubCategory($request);
        Alert::Success('Subcategory Add Successfully');
        return redirect()->back();
    }

    /**
     * Display the specified resource.
     */
    public function show(string $id)
    {
        $this->subcategory =SubCategory::find($id);
        if ($this->subcategory->status==1)
        {
            $this->subcategory->status=2;
        }
        else
        {
            $this->subcategory->status=1;
        }
        $this->subcategory->save();
        return redirect('subcategory');

    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit($id)
    {
        $this->categories=Category::all();
        $this->subcategory = SubCategory::find($id);
        return view('admin.subcategory.edit',[
            'subcategory'=>$this->subcategory,
            'categories'=>$this->categories
            ]);
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request,$id)
    {
        SubCategory::updateSubCategory($request,$id);
        Alert::Success('SubCategory Update Successfully');
        return redirect('subcategory');
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy($id)
    {
       $this->subcategory=SubCategory::find($id);
        if (file_exists($this->subcategory->image))
        {
            unlink($this->subcategory->image);
        }
        $this->subcategory->delete();
        Alert::warning('SubCategory Delete Successfully');
        return redirect('subcategory');
    }
}
