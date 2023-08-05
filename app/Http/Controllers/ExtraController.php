<?php

namespace App\Http\Controllers;

use App\Models\Category;
use App\Models\Post;
use Illuminate\Http\Request;

class ExtraController extends Controller
{
    public function index(){
        $categories=Category::all();
        $posts=Post::all();
        return view('welcome',compact('posts','categories'));
    }
}
