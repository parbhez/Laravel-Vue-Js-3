<?php

namespace App\Http\Controllers;

use App\Models\Post;
use App\Models\Category;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;

class PostController extends Controller
{
    public function post()
    {

        // $categories = Category::active()
        // ->get(['id', 'category_name']); //locally scope

        $categories = Category::get(['id', 'category_name']); //Globally Scope

        // foreach ($categories as $category) {
        //     echo $category->id.'====>'.$category->category_name.'<br>';
        // }
        // return;
        return view('post', compact('categories'));

    }

    public function postList(Request $request)
    {


        $post = Post::query()->orderBy('id', 'asc');

        if ($request->keyword != '') {
            $post->where('title', 'LIKE', '%' . $request->keyword . '%');
        }

        $post = $post->paginate(20);

        return response()->json($post);

    }

    public function category()
    {
        $categories = Post::limit(5)->get();
        return view('category',compact('categories'));

    }

    public function store(Request $request)
    {
        return $request->all();
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
