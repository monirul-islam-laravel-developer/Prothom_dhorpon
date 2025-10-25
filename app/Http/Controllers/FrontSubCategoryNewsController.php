<?php

namespace App\Http\Controllers;

use App\Models\Post;
use App\Models\SubCategory;
use Illuminate\Http\Request;

class FrontSubCategoryNewsController extends Controller
{
    public $subcategory,$subcat_newses;
    public function index($id)
    {
        $this->subcategory =SubCategory::find($id);
        $this->subcat_newses = Post::where('status', 1)->where('subcategory_id',$this->subcategory->id)->get();
        return view('front.sub-cat-news.index',[
            'subcategory'=>$this->subcategory,
            'subcat_newses'=>$this->subcat_newses
        ]);
    }
}
