<?php

namespace App\Http\Controllers;

use App\Models\Category;
use App\Models\Post;
use App\Models\Reporter;
use App\Models\SubCategory;
use App\Models\SubsubCategory;
use App\Models\Upazila;
use Illuminate\Http\Request;
use RealRashid\SweetAlert\Facades\Alert;


class PostController extends Controller
{
    public $categories,$subcategories,$subsubcategories,$upzelas,$posts,$post;
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $this->posts=Post::orderBy('id','desc')->get();
        return view('admin.post.index',['posts'=>$this->posts]);
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
//        $this->categories=Category::where('status','1')->orderBy('id','asc')->get();
//        $this->subcategories=SubCategory::where('status','1')->orderBy('id','asc')->get();
//        $this->subsubcategories=SubsubCategory::where('status','1')->orderBy('id','asc')->get();
//        $this->upzelas=Upazila::where('status','1')->orderBy('id','asc')->get();
//
//        return view('admin.post.create',
//            ['categories'=>$this->categories,
//                'subcategories'=>$this->subcategories,
//                'subsubcategories'=>$this->subsubcategories,
//                'upzelas'=>$this->upzelas
//
//                ]);
        $categories = Category::all();
        $reporters=Reporter::orderBy('id','asc')->get();
        return view('admin.post.create', compact('categories', 'reporters'));
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        Post::storePost($request);
        Alert::success('Post Add Successwfully');
        return redirect()->back();
    }

    /**
     * Display the specified resource.
     */
    public function show($id)
    {
        $this->post=Post::find($id);
        if ($this->post->status==1)
        {
            $this->post->status=2;
            Alert::warning('This Post Inactive');
        }
        else
        {
            $this->post->status=1;
            Alert::Success('This Post Active');
        }
        $this->post->save();

        return redirect('/post');
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit($id)
    {
        $categories = Category::all();
        $reporters=Reporter::orderBy('id','asc')->get();
        $post=Post::find($id);
        return view('admin.post.edit',compact('categories', 'reporters','post'));
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request,$id)
    {
        Post::updatePost($request,$id);
        Alert::success('Post Update Successfull');
        return redirect('/post');

    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy($id)
    {
        $this->post= Post::find($id);
        if (file_exists($this->post->image))
        {
            unlink($this->post->image);
        }
        $this->post->delete();
        Alert::success('Post Delete Successfull');
        return redirect('/post');
    }
    public function getSubcategories($category_id)
    {
        return response()->json(SubCategory::where('category_id', $category_id)->get());
    }

    public function getSubSubCategories($subcategory_id)
    {
        return response()->json(SubsubCategory::where('subcategory_id', $subcategory_id)->get());
    }

    public function getUpzelas($subsub_category_id)
    {
        return response()->json(Upazila::where('subsub_categories_id', $subsub_category_id)->get());
    }
    public function searchReporters(Request $request)
    {
        $search = $request->get('q');

        $query = Reporter::query();

        if ($search) {
            $query->where('name', 'like', "%{$search}%")
                ->orWhere('designation', 'like', "%{$search}%");
        }

        $reporters = $query->get();

        return response()->json(
            $reporters->map(function ($rep) {
                return [
                    'id' => $rep->id,
                    'text' => $rep->name . ' (' . $rep->designation . ')'
                ];
            })
        );
    }



}
