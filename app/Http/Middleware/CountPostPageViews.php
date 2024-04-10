<?php

namespace App\Http\Middleware;

use Closure;
use Illuminate\Http\Request;
use Symfony\Component\HttpFoundation\Response;
use App\Models\Post;

class CountPostPageViews
{
    /**
     * Handle an incoming request.
     *
     * @param  \Closure(\Illuminate\Http\Request): (\Symfony\Component\HttpFoundation\Response)  $next
     */
    public function handle(Request $request, Closure $next): Response
    {
        // Get the post ID from the route parameters
        $postId = $request->route('post')->id;

        // Increment the page view count for the corresponding post
        Post::where('id', $postId)->increment('page_views');

        return $next($request);
    }
}
