<?php

namespace App\Http\Controllers;

use App\Models\Category;
use App\Models\Post;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Storage;

class PostController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {

        $posts = Post::latest()->get();
        $categories = Category::all();
        return view('admin.post.index', compact('posts', 'categories'));
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        //
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {

//        dd($request->image);
        $request->validate([
            'name' => 'required|string',
            'desc' => 'required|string',
            'thumbnail' => 'required|file'
        ]);
        if ($request->hasFile('thumbnail')) {
            $name = $request->file('thumbnail')->getClientOriginalName();
            $path = $request->file('thumbnail')->storeAs('photo', $name);
        }

        $post = Post::create([
//            dd($request),
            'name' => $request->name,
            'desc' => $request->desc,
//            'category_id' => $request->category_id,
            'image' => $path
        ]);


        return redirect()->route('post.index')->with('success', 'created');

    }

    /**
     * Display the specified resource.
     */
    public function show(Post $post)
    {
        $post->view++ ;
        $post->save();
//        dd($post);
        return view('post_show',compact('post') );
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(Post $post)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, Post $post)
    {

//        dd($request);

        $request->validate([
            'name' => 'required|string',
            'desc' => 'required|string',
        ]);

        if ($request->hasFile('thumbnail')) {
            Storage::delete($post->image);


            $name = $request->file('thumbnail')->getClientOriginalName();
            $path = $request->file('thumbnail')->storeAs('photo', $name);

        }



        $post->update([
            'name'=>$request->name,
            'desc'=>$request->desc,
//            'category_id'=>$request->category_id,
            'image'=>$path ?? $post->image,
        ]);


        return redirect()->route('post.index')->with('success', 'Edited');
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(Post $post)
    {
        if (isset($post->image)){
            Storage::delete(($post->image));
        }

        $post->delete();
        return redirect()->back()->with('success','deleted');
    }
}
