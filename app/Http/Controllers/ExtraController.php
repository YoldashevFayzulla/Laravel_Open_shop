<?php

namespace App\Http\Controllers;

use App\Models\Category;
use App\Models\Post;
use Illuminate\Http\Request;

class ExtraController extends Controller
{
    public function index(){
        $categories=Category::all();
        $posts=Post::latest()->paginate(6);
        return view('welcome',compact('posts','categories'));
    }
    public function catalog(){
        $posts=Post::latest()->paginate(5);
        return view('catalog',compact('posts'));

    }
    public function like($id){
        $post=Post::find($id);
        $post->like++;
        $post->save();
        return redirect()->back();
    }
}
