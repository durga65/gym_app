<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Validator;
use App\Models\Post;
use Illuminate\View\View;
use Illuminate\Http\JsonResponse;

class PostController extends Controller
{
    public function index(): View
    {
        $posts = Post::get();
    
        return view('posts', compact('posts'));
    }


    public function edit($id): JsonResponse    
    {
        $posts = Post::find($id);
    
        return response()->json([
            'status' => 200,
            'message' => 'data fetched',
            'posts' => $posts
        ]);
    }

    public function update(Request $request)
    {
        $post_id = $request->input('id');
        $post = Post::find($post_id);

        if (!$post) {
            return response()->json(['error' => 'Post not found.'], 404);
        }

        $request->validate([
            'title' => 'required',
            'body' => 'required',
        ]);

        $post->title = $request->input('title');
        $post->body = $request->input('body');
        $post->save(); // Use save() to persist the changes to the database

        return redirect()->back()->with('success', 'Post updated successfully.');
    }


    public function store(Request $request): JsonResponse
    {
        $request->validate([
            'title' => 'required',
            'body' => 'required',
        ]);
         
        Post::create([
            'title' => $request->title,
            'body' => $request->body,
        ]);
    
        return response()->json(['success' => 'Post created successfully.']);
    }

    
    public function delete($post_id)
    {        
        if (Post::destroy($post_id)) {
            return response()->json(['message' => 'Post deleted successfully'], 200);
        } else {
            return response()->json(['message' => 'Failed to delete post'], 500);
        }
    }
}