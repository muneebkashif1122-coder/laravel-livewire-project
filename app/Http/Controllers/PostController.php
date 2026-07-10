<?php

namespace App\Http\Controllers;

use App\Models\Post;
use App\Models\Category;

class PostController extends Controller
{
    public function show($id)
    {
        $post = Post::with(['category', 'author'])->find($id);

        if (!$post) {
            return redirect('/');
        }

        $trending = Post::latest('id')->take(5)->get(['id', 'title']);
        $headerCategories = Category::all();
        $allCategories = Category::all();
        $recentPosts = Post::latest('id')->take(5)->get(['id', 'title', 'image']);

        return view('post', compact('post', 'trending', 'headerCategories', 'allCategories', 'recentPosts'));
    }
}