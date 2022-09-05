<?php

namespace App\Http\Controllers;

use App\Models\Post;
use Illuminate\Http\Request;
use DB;
class PostController extends Controller
{

    public function post()
    {
        $category = DB::table('categories')
            ->select('id', 'category_name')
            ->where('status', '=', 1)
            ->orderBy('id')
            ->get();

       return view('post',['categories' => $category]);

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
