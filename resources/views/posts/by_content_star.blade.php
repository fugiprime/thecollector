@extends('layouts.app')

@section('title', 'Posts by Content Star')

@section('content')
    <div class="container border rounded shadow-sm p-3" style="background-color: #2A2929; color: white;">
        <h2>Posts by Content Star</h2>
        <hr style="border-color: white;">
        <div class="row">
            @foreach($posts as $post)
                <div class="col-md-3 mb-4">
                    <!-- Display post information -->
                    <a href="{{ route('posts.show', $post->id) }}" class="post-link" style="text-decoration: none; color: inherit;">
                        <div class="card">
                            <!-- Poster image -->
                            <img src="{{ $post->poster_url }}" class="card-img-top" alt="Poster Image" style="width: 100%; height: 200px; object-fit: cover;">
                            <p class="position-absolute bottom-0 end-0 m-2 p-2 bg-black-translucent text-white">{{ $post->duration }}</p> 
                        </div>
                    </a>
                    <div class="card-body bg-transparent mt-2">
                        <div class="row">
                            <div class="col-md-6">
                                <p class="text-white mb-0">{{ optional($post->contentStar)->name }}</p>
                            </div>
                            <div class="col-md-6 text-end">
                                <p class="text-white mb-0">{{ optional($post->company)->name }}</p>
                            </div>
                        </div>
                        <a href="{{ route('posts.show', $post->id) }}" class="post-link" style="text-decoration: none; color: inherit;">
                            <p class="card-title text-white mt-2 mb-0" style="overflow: hidden; text-overflow: ellipsis; -webkit-line-clamp: 2; -webkit-box-orient: vertical; display: -webkit-box;">{{ $post->title }}</p>   
                        </a>
                    </div>
                </div>
            @endforeach
        </div>
        <div class="d-flex justify-content-center mt-4">
            {{ $posts->links('pagination::bootstrap-4') }}
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
