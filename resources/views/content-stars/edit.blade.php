@extends('layouts.app')

@section('content')
    <h1>Edit Content Star</h1>
    <form action="{{ route('content-stars.update', $contentStar->id) }}" method="POST">
        @csrf
        @method('PUT')
        <div class="form-group">
            <label for="name">Name</label>
            <input type="text" name="name" class="form-control" id="name" value="{{ $contentStar->name }}" required>
        </div>
        <div class="form-group">
            <label for="gender">Gender</label>
            <input type="text" name="gender" class="form-control" id="gender" value="{{ $contentStar->gender }}" required>
        </div>
        <div class="form-group">
            <label for="description">Description</label>
            <textarea name="description" class="form-control" id="description" required>{{ $contentStar->description }}</textarea>
        </div>
        <div class="form-group">
            <label for="date_of_birth">Date of Birth</label>
            <input type="date" name="date_of_birth" class="form-control" id="date_of_birth" value="{{ $contentStar->date_of_birth }}" required>
        </div>
        <div class="form-group">
            <label for="poster_url">Poster URL</label>
            <input type="url" name="poster_url" class="form-control" id="poster_url" value="{{ $contentStar->poster_url }}" required>
        </div>
        <button type="submit" class="btn btn-primary">Submit</button>
    </form>
@endsection
