<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Post;
use App\Models\Category;
use App\Models\ContentStar;
use App\Models\Company;
use App\Models\User;

class HomeController extends Controller
{
    /**
     * Create a new controller instance.
     *
     * @return void
     */
    public function __construct()
    {
        $this->middleware('auth');
    }

    /**
     * Show the application dashboard.
     *
     * @return \Illuminate\Contracts\Support\Renderable
     */
    public function index()
    {
        $postCount = Post::count();
        $starCount = ContentStar::count();
        $categoryCount = Category::count();
        $companyCount = Company::count();
        $userCount = User::count();

        return view('home', compact('postCount', 'starCount', 'categoryCount', 'companyCount', 'userCount'));
    }
}
