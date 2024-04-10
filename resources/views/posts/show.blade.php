@extends('layouts.app')

@section('title', $post->title)

@section('content')
    <div class="container border rounded shadow-sm p-3" style="background-color: #2A2929; color: white;">
        <h1>{{ $post->title }}</h1>
        
        <div class="row">
            <!-- Left column for the player -->
            <div class="col-md-9">
                @php
                    $embedUrl = '';
                    if ($post->host == 'vidhide') {
                        $embedUrl = 'https://vidhidevip.com/embed/' . $post->file_code;
                    } elseif ($post->host == 'streamtape') {
                        $embedUrl = 'https://streamtape.com/e/' . $post->file_code;
                    }
                @endphp

                @if (!empty($embedUrl))
                    <iframe src="{{ $embedUrl }}" width="100%" height="400" allowfullscreen allowtransparency allow="autoplay" scrolling="no" frameborder="0"></iframe>
                @endif
            </div>
            
            <!-- Right column for other information -->
            <div class="col-md-3">
                <p><strong>Host:</strong> {{ $post->host }}</p>
                <p><strong>Categories:</strong> 
                    @foreach ($post->categories as $category)
                    <a href="{{ route('posts.byCategory', $category->id) }}" style="text-decoration: none; color: inherit;">{{ $category->name }}</a>@if (!$loop->last), @endif
                    @endforeach
                </p>
                <p><strong>Content Star:</strong> <a href="{{ route('posts.byContentStar', optional($post->contentStar)->id) }}" style="text-decoration: none; color: inherit;">{{ optional($post->contentStar)->name }}</a></p>
                <p><strong>Company:</strong> <a href="{{ route('posts.byCompany', optional($post->company)->id) }}" style="text-decoration: none; color: inherit;">{{ optional($post->company)->name }}</a></p>
                <p><strong>Page Views:</strong> {{ $totalPageViews }}</p>
                <p><strong>Quality:</strong> {{ $post->quality }}</p>
                <p><strong>Duration:</strong> {{ $post->duration }}</p>
            </div>
        </div>

        <!-- Description -->
        <div class="row mt-4">
            <div class="col-md-3">
                @if (!empty($post->poster_url))
                    <img src="{{ $post->poster_url }}" class="img-thumbnail" alt="Poster Image">
                @endif
            </div>
            <div class="col-md-9">
                <p><strong>Username:</strong> {{ $post->user->name }}</p>
                <p><strong>Description:</strong></p>
                <p>{{ $post->description }}</p>
            </div>
        </div>

        <div style="margin-top: 20px;"></div>

        <h2>Related Posts</h2>
        <hr style="border-color: white;">
        <div class="row">
            @foreach($relatedPosts as $relatedPost)
                <div class="col-md-3 mb-4">
                    <a href="{{ route('posts.show', $relatedPost->id) }}" style="text-decoration: none"><div class="card bg-transparent">
                        <!-- Poster image -->
                        <img src="{{ $relatedPost->poster_url }}" class="card-img-top" alt="Poster Image">
                        <!-- Card body -->
                        <div class="card-body">
                            <!-- Title with link to related post -->
                            <p class="card-title text-white" > {{ $relatedPost->title }}</p>
                        </div></a>
                    </div>
                </div>
            @endforeach
        </div>
    </div>
@endsection
