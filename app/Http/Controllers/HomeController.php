<?php

namespace App\Http\Controllers;

use App\Models\Post;
use App\Models\Category;
use Illuminate\Support\Str;

class HomeController extends Controller
{
    public function index()
    {
        $trending = Post::latest('id')->take(5)->get(['id', 'title']);
        $topSlider = Post::latest('id')->take(5)->get(['id', 'title', 'image']);
        $headerCategories = Category::all();
        $mainSlider = Post::with('category')->latest('id')->take(3)->get();
        $sidebarCategories = Category::take(4)->get();
        $featured = Post::with('category')->latest('id')->skip(3)->take(8)->get();
        $catRowCategories = Category::take(4)->get();

        $popularMain = Post::with('category')->oldest('id')->skip(6)->take(2)->get();
        foreach ($popularMain as $main) {
            $main->smallPosts = Post::with('category')
                ->where('id', '!=', $main->id)
                ->inRandomOrder()
                ->take(2)
                ->get();
        }

        $latestToday = Post::with('category')
            ->whereDate('created_at', today())
            ->latest('id')
            ->take(4)
            ->get();
        $allCategories = Category::all();
        $recentPosts = Post::latest('id')->take(5)->get(['id', 'title', 'image']);

        return view('home', compact(
            'trending', 'topSlider', 'headerCategories', 'mainSlider',
            'sidebarCategories', 'featured', 'catRowCategories',
            'popularMain', 'latestToday', 'allCategories', 'recentPosts'
        ));
    }
    
}