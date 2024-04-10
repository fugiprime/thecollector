<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use App\Models\Post;
use App\Models\Category;
use App\Models\ContentStar;
use App\Models\Company;
use App\Models\PostView;

class PostsController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $posts = Post::all();
        return view('posts.index', compact('posts'));
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        $categories = Category::all();
        $contentStars = ContentStar::all();
        $companies = Company::all();
        return view('posts.create', compact('categories', 'contentStars', 'companies'));
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
                // Validate the incoming request data
                $request->validate([
                    'title' => 'required|string|max:255',
                    'host' => 'required|string|in:vidhide,streamtape',
                    'file_code' => 'required|string|max:255',
                    'poster_url' => 'required|url',
                    'description' => 'nullable|string',
                    'duration' => 'nullable|string',
                    'quality' => 'nullable|string|in:SD,720p,1080p,4K',
                    'categories' => 'nullable|array',
                    'categories.*' => 'exists:categories,id',
                    'content_star' => 'nullable|exists:content_stars,id',
                    'company' => 'nullable|exists:companies,id',
                ]);
        
                // Create a new post instance
                $post = new Post();
        
                // Assign authenticated user's ID to the post
                $post->user_id = Auth::id();
        
                // Assign other post attributes from the request
                $post->title = $request->title;
                $post->host = $request->host;
                $post->file_code = $request->file_code;
                $post->poster_url = $request->poster_url;
                $post->description = $request->description;
                $post->duration = $request->duration;
                $post->quality = $request->quality;
                $post->content_star_id = $request->content_star;
                $post->company_id = $request->company;
        
                // Save the post
                $post->save();
        
                // Attach categories to the post
                if ($request->has('categories')) {
                    $post->categories()->attach($request->categories);
                }
        
                // Redirect to the posts index page
                return redirect()->route('posts.index')->with('success', 'Post created successfully!');
            }
    /**
     * Display the specified resource.
     */
    public function show(string $id)
    {
        $post = Post::findOrFail($id);
        
        $relatedPosts = Post::whereHas('categories', function ($query) use ($post) {
            $query->whereIn('categories.id', $post->categories->pluck('id'));
        })->where('posts.id', '!=', $post->id)->take(16)->get();
        
        $postView = new PostView();
        $postView->post_id = $post->id;
        $postView->save();

        $totalPageViews = PostView::where('post_id', $id)->count();
        return view('posts.show', compact('post', 'totalPageViews', 'relatedPosts'));
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(string $id)
    {
        $post = Post::findOrFail($id);
    $categories = Category::all();
    $contentStars = ContentStar::all();
    $companies = Company::all();
    return view('posts.edit', compact('post', 'categories', 'contentStars', 'companies'));
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, string $id)
    {
        $validatedData = $request->validate([
            'title' => 'required|string',
            'host' => 'required|string',
            'file_code' => 'required|string',
            'poster_url' => 'required|string',
            'description' => 'nullable|string',
            'duration' => 'nullable|string',
            'quality' => 'nullable|string',
            'category_id' => 'required|array',
            'content_star_id' => 'required|exists:content_stars,id',
            'company_id' => 'required|exists:companies,id',
        ]);
    
        $post = Post::findOrFail($id);
        $post->title = $validatedData['title'];
        $post->host = $validatedData['host'];
        $post->file_code = $validatedData['file_code'];
        $post->poster_url = $validatedData['poster_url'];
        $post->description = $validatedData['description'];
        $post->duration = $validatedData['duration'];
        $post->quality = $validatedData['quality'];
        $post->content_star_id = $validatedData['content_star_id'];
        $post->company_id = $validatedData['company_id'];
        $post->save();
        $post->categories()->sync($validatedData['category_id']);
    
        return redirect()->route('posts.index')->with('success', 'Post updated successfully!');
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(string $id)
    {
        $post = Post::findOrFail($id);
    $post->categories()->detach();
    $post->delete();
    return redirect()->route('posts.index')->with('success', 'Post deleted successfully!');

    }

    public function showNewest()
    {
        $posts = Post::latest()->paginate(32); // Change paginate() value as needed
        return view('posts.all', compact('posts'));
    }

    // Method to show posts according to views
    public function showByViews()
    {
        $posts = Post::withCount('postViews')->orderBy('post_views_count', 'desc')->paginate(32);
        return view('posts.popular', compact('posts'));
    }

    public function showByContentStar(ContentStar $contentStar)
    {
        $posts = $contentStar->posts()->paginate(12); // Assuming each content star has a posts relationship
        return view('posts.by_content_star', compact('posts', 'contentStar'));
    }

    public function showByCompany(Company $company)
    {
        $posts = $company->posts()->paginate(12); // Assuming each company has a posts relationship
        return view('posts.by_company', compact('posts', 'company'));
    }

    public function showByCategory(Category $category)
    {
        $posts = $category->posts()->paginate(12); // Assuming each category has a posts relationship
        return view('posts.by_category', compact('posts', 'category'));
    }

}
