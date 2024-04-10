@extends('layouts.app')

@section('content')
    <div class="container border rounded shadow-sm p-3" style="background-color: #2A2929; color: white;">
        <h1>All Stars</h1>
        <div class="row">
            @foreach($contentStars as $contentStar)
                <div class="col-md-3 mb-4">
                    <div class="card bg-transparent">
                        <a href="{{ route('content-stars.show', $contentStar->id) }}">
                            <!-- Poster image -->
                            <img src="{{ $contentStar->poster_url }}" class="card-img-top" alt="Content Star Poster">
                        </a>
                        <!-- Card body -->
                        <div class="card-body">
                            <!-- Content star name with link to view content star details -->
                            <h5 class="card-title text-white"><a href="{{ route('content-stars.show', $contentStar->id) }}" style="text-decoration: none; color: inherit;">{{ $contentStar->name }}</a></h5>
                        </div>
                    </div>
                </div>
            @endforeach
        </div>
        <div class="d-flex justify-content-center">
            {{ $contentStars->links('pagination::bootstrap-4') }}
        </div>
    </div>

    <style>
        /* Apply blue glow effect on image hover */
        .card-img-top:hover {
            box-shadow: 0 0 20px rgba(255, 255, 255, 0.7);
        }
    </style>
@endsection
