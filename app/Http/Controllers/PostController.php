<?php

namespace App\Http\Controllers;

use App\Models\Post;
use Illuminate\Http\Request;

class PostController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $posts = Post::get();

        return response()->json([
           'message'=>'List of posts',
            'Posts'=> $posts
        ], 200);
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        $post = new Post;
        $post->name = $request->name;
        $post->title = $request->title;
        $post->content = $request->content;
        $post->save();

        return response()->json([
           'message'=>'New post created!',
            'Post'=> $post
        ], 200);

    }

    /**
     * Display the specified resource.
     */
    public function show($id)
    {
        $post = Post::find($id);

        return response()->json([
           'message'=>'single post',
            'Post'=> $post
        ], 200); 
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, $id)
    {
        $post = Post::find($id);

        $post->name = $request->name;
        $post->title = $request->title;
        $post->content = $request->content;
        $post->save();

        return response()->json([
           'message'=>'post updated',
            'Post'=> $post
        ], 200);
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy($id)
    {
        $post = Post::find($id);

         return response()->json([
           'message'=>'post deleted',
            'Post'=> $post->delete()
        ], 200);
    }

    /**
     * Edit the specified resource from storage.
     */
     public function edit($id)
    {
        $post = Post::find($id);

        return response()->json([
           'message'=>'post edit',
            'Post'=> $post
        ], 200);
    }


}
