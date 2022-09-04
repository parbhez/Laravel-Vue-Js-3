<?php

namespace App\Http\Controllers;

use App\Models\Post;
use Illuminate\Http\Request;

class PostController extends Controller
{

    public function post()
    {
       return view('post');

    }

    public function postList(Request $request)
    {


        $post = Post::query()->orderBy('id', 'asc');

        if ($request->keyword != '') {
            $post->where('title', 'LIKE', '%' . $request->keyword . '%');
        }

        $post = $post->paginate(10);

        return response()->json($post);

    }

    public function category()
    {
        $categories = Post::limit(5)->get();
        return view('category',compact('categories'));

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
