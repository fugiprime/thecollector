@extends('layouts.app')

@section('content')
    <div class="container border rounded shadow-sm p-3" style="background-color: #2A2929; color: white;">
        <div class="row">
            <div class="col-md-6">
                <!-- Left side: Poster -->
                <img src="{{ $contentStar->poster_url }}" alt="Poster Image" class="img-fluid">
            </div>
            <div class="col-md-6">
                <!-- Right side: Other information -->
                <h1>{{ $contentStar->name }}</h1>
                <p>Gender: {{ $contentStar->gender }}</p>
                <p>Date of Birth: {{ $contentStar->date_of_birth }}</p>
                <p>Description: {{ $contentStar->description }}</p>
                <a href="{{ route('content-stars.all') }}" class="btn btn-secondary">Back</a>
            </div>
        </div>
    </div>
@endsection
