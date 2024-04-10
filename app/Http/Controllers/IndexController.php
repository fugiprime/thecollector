<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Post;
use App\Models\PostView;
use App\Models\Category; 

class IndexController extends Controller
{
    public function index()
    {
        $latestPosts = Post::latest()->take(12)->get();

        // Retrieve popular posts (8 posts)
        $popularPosts = Post::withCount('postViews')->orderBy('post_views_count', 'desc')->take(8)->get();
        $categories = Category::all();

        return view('welcome', [
            'latestPosts' => $latestPosts,
            'popularPosts' => $popularPosts,
            'categories' => $categories,
        ]);
    }
}
