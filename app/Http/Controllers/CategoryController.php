<?php

namespace App\Http\Controllers;

use App\Models\Category;
use App\Models\Post;

class CategoryController extends Controller
{
    public function index()
    {
        $categories = Category::orderBy('name', 'asc')->get()->map(function ($cat) {
            $samplePost = Post::where('category_id', $cat->id)->first(['image']);
            $cat->displayImage = $samplePost->image ?? null;
            return $cat;
        });

        $trending = Post::latest('id')->take(5)->get(['id', 'title']);
        $headerCategories = Category::all();
        $allCategories = Category::all();
        $recentPosts = Post::latest('id')->take(5)->get(['id', 'title', 'image']);

        return view('categories', compact('categories', 'trending', 'headerCategories', 'allCategories', 'recentPosts'));
    }
    public function show($id)
    {
        $category = Category::find($id);

        if (!$category) {
            return redirect('/categories');
        }

        $posts = Post::with('category')
            ->where('category_id', $id)
            ->latest('id')
            ->get();

        $trending = Post::latest('id')->take(5)->get(['id', 'title']);
        $headerCategories = Category::all();
        $allCategories = Category::all();
        $recentPosts = Post::latest('id')->take(5)->get(['id', 'title', 'image']);

        return view('category', compact('category', 'posts', 'trending', 'headerCategories', 'allCategories', 'recentPosts'));
    }
}
