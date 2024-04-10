@extends('layouts.app')

@section('title', 'Welcome')

@section('content')
    <div class="container border rounded shadow-sm p-3" style="background-color: #2A2929; color: white;">
        <div class="row">
            @foreach($categories as $category)
                <div class="col-md-1 mb-3">
                    <a href="{{ route('categories.show', $category->id) }}" class="text-decoration-none text-white">{{ $category->name }}</a>
                </div>
            @endforeach
        </div>        
        <hr style="border-color: white;">
        <!-- Latest Posts -->
        <h2>Latest Posts</h2>
        <hr style="border-color: white;">
        <div class="row">
            @foreach($latestPosts as $post)
                <div class="col-md-3">
                    <!-- Display post information -->
                    <a href="{{ route('posts.show', $post->id) }}" class="post-link" style="text-decoration: none; color: inherit;">
                        <div class="card">
                            <!-- Poster image -->
                            <img src="{{ $post->poster_url }}" class="card-img-top" alt="Poster Image" style="width: 100%; height: 100%; object-fit: cover;">
                            <p class="position-absolute bottom-0 end-0 m-2 p-2 bg-black-translucent text-white">{{ $post->duration }}</p> 
                        </div>
                    </a>
                        <div class="card-body bg-transparent" style="margin-top: 10px;">
                            <div class="row">
                                <div class="col-md-6">
                                    <p class="text-white" style="margin-bottom: 3px;"><a href="{{ route('posts.byContentStar', optional($post->contentStar)->id) }}" style="text-decoration: none; color: inherit;">{{ optional($post->contentStar)->name }}</a></p>
                                </div>
                                <div class="col-md-6 text-end">
                                    <p class="text-white" style="margin-bottom: 3px;"><a href="{{ route('posts.byCompany', optional($post->company)->id) }}" style="text-decoration: none; color: inherit;">{{ optional($post->company)->name }}</a></p>
                                </div>
                            </div>
                            <a href="{{ route('posts.show', $post->id) }}" class="post-link" style="text-decoration: none; color: inherit;">
                            <p class="card-title text-white" style="overflow: hidden; text-overflow: ellipsis; -webkit-line-clamp: 2; -webkit-box-orient: vertical; display: -webkit-box;">{{ $post->title }}</p>   
                        </a>
                        </div>
                    
                </div>
            @endforeach
        </div>
        <div style="margin-top: 20px;"></div>
        <!-- Popular Posts -->
        <h2>Popular Posts</h2>
        <hr style="border-color: white;">
        <div class="row">
            @foreach($popularPosts as $post)
                <div class="col-md-3">
                    <!-- Display post information -->
                    <a href="{{ route('posts.show', $post->id) }}" class="post-link" style="text-decoration: none; color: inherit;">
                        <div class="card">
                            <!-- Poster image -->
                            <img src="{{ $post->poster_url }}" class="card-img-top" alt="Poster Image" style="width: 100%; height: 100%; object-fit: cover;">
                            <p class="position-absolute bottom-0 end-0 m-2 p-2 bg-black-translucent text-white"> {{ $post->duration }}</p>
                            <!-- Card body with transparent background -->
                        </div> </a>
                        <div class="card-body bg-transparent" style="margin-top: 10px;">
                            <div class="row">
                                <div class="col-md-6">
                                    <p class="text-white" style="margin-bottom: 3px;">{{ optional($post->contentStar)->name }}</p>
                                </div>
                                <div class="col-md-6 text-end">
                                    <p class="text-white" style="margin-bottom: 3px;">{{ optional($post->company)->name }}</p>
                                </div>
                            </div>
                            <a href="{{ route('posts.show', $post->id) }}" class="post-link" style="text-decoration: none; color: inherit;">
                            <p class="card-title text-white" style="overflow: hidden; text-overflow: ellipsis; -webkit-line-clamp: 2; -webkit-box-orient: vertical; display: -webkit-box;">{{ $post->title }}</p> </a>
                        </div>
                    
                </div>
            @endforeach
        </div>
    </div>

<style>
.bg-black-translucent {
    background-color: rgba(0, 0, 0, 0.7); /* Black color with 50% opacity */
}

.post-link:hover {
    opacity: 0.7;
}

.card:hover {
    box-shadow: 0 0 20px rgba(0, 0, 255, 0.7); /* Blue glow effect on hover */
}
</style>
@endsection
