<?php

namespace App\Http\Controllers;

use App\Models\Post;
use App\Models\Upazila;
use Illuminate\Http\Request;

class FrontUpazelasNewsController extends Controller
{
    public $upazela,$upazelasnewses;
    public function index($id)
    {
        $this->upazela =Upazila::find($id);
        $this->upazelasnewses = Post::where('status', 1)->where('upazela_id', $this->upazela->id)
            ->orderBy('id', 'desc')
            ->paginate(9); // shows 9 posts per page
        return view('front.upazila.index',[
            'upazela'=>$this->upazela,
            'upazelasnewses'=>$this->upazelasnewses
        ]);
    }
}
