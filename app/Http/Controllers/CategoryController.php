<?php

namespace App\Http\Controllers;

use App\Models\Category;
use Illuminate\Http\Request;
use phpDocumentor\Reflection\Types\String_;
use RealRashid\SweetAlert\Facades\Alert;

class CategoryController extends Controller
{
    public $categories;
    public $category;
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $this->categories=Category::orderBy('id','asc')->get();
        return view('admin.category.index', ['categories' => $this->categories]);
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        return view('admin.category.create');
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        Category::storeCategory($request);
        Alert::success('Category Add Successfully');
        return redirect()->back();
    }

    /**
     * Display the specified resource.
     */
    public function show(string $id)
    {
        $this->category=Category::find($id);
        if ($this->category->status==1)
        {
            $this->category->status=2;
            Alert::warning('Category Inactive');
        }
        else
        {
            $this->category->status=1;
            Alert::Success('Category Active');
        }
        $this->category->save();

        return redirect('/category');
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(string $id)
    {
        return view('admin.category.edit',['category' => Category::find($id)]);

    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request,string $id)
    {
        Category::updateCategory($request,$id);
        Alert::Success('Category Update Successfully');
        return redirect('/category');
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(string $id)
    {
        $this->category=Category::find($id);
        if (file_exists($this->category->iamge))
        {
            unlink($this->category->image);
        }
        $this->category->delete();
        Alert::Success('Category Delete Successfully');
        return redirect('/category');
    }
}
