<?php

namespace App\Http\Controllers;

use App\Models\Post;
use App\Models\SubsubCategory;
use Illuminate\Http\Request;

class FrontSubSubCategoryController extends Controller
{
    public $dristrict,$dristrictnewses;
    public function index($id)
    {
        $this->dristrict =SubsubCategory::find($id);
        $this->dristrictnewses = Post::where('status', 1)->where('dristrict_id', $this->dristrict->id)
            ->orderBy('id', 'desc')
            ->paginate(9); // shows 9 posts per page
        return view('front.district.index',[
            'dristrict'=>$this->dristrict,
            'dristrictnewses'=>$this->dristrictnewses
        ]);
    }
}
