<?php

namespace App\Http\Controllers;

use App\Models\Post;
use Illuminate\Http\Request;

class PostController extends Controller
{

    public function post()
    {
        $posts = Post::limit(10)->get();

       return view('post',compact('posts'));

    }


    public function category()
    {
        return view('category');

    }


    public function store(Request $request)
    {
        //
    }


    public function show(Post $post)
    {
        //
    }

    public function edit(Post $post)
    {
        //
    }


    public function update(Request $request, Post $post)
    {
        //
    }


    public function destroy(Post $post)
    {
        //
    }
}
