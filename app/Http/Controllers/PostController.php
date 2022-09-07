<?php

namespace App\Http\Controllers;

use App\Models\Post;
use App\Models\Category;
use Illuminate\Http\Request;
use Image;

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

        $post = Post::query();

        // $post = Post::query()->orderBy('id', 'asc');

        if ($request->limit != '') {
            $post = $post->paginate($request->limit);
        }

        return response()->json($post);
    }

    public function category()
    {
        $categories = Post::limit(5)->get();
        return view('category', compact('categories'));
    }

    public function store(Request $request)
    {
        // $request->validate([
        //     'name' => 'required|unique:categories,category_name',
        //     'image' => 'nullable|image64:jpeg,jpg,png,gif',
        // ], [
        //     'image.image64' => 'File must be an image of jpeg,png,gif',
        // ]);

        try {

            $post = new Post;
            $post->title = $request->title;
            $post->category_id = $request->category_id;
            $post->content = $request->content;
            $post->tag = $request->tag;
            $post->status = $request->status;

            $imageData = $request->get('image');

            if ($imageData) {

                $fileName = uniqid() . '.' . explode('/', explode(':', substr($imageData, 0, strpos($imageData, ';')))[1])[1];
                $path = public_path('images/post')."/".$fileName;
                Image::make($request->get('image'))->save($path);

                $post->thumbnail = $fileName;
            }


            $post->save();

            // //  clear home page category cache
            // Cache::forget('all-category');

            return response()->json(['status' => 'success', 'message' => 'Post Created Successfully !']);
        } catch (\Exception $e) {
            return $e;
            return response()->json(['status' => 'error', 'message' => 'Opps Something Went Wrong!']);
        }
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
