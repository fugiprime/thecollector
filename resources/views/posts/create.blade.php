@extends('layouts.app')

@section('title', 'Create Post')

@section('content')
<div class="container border rounded shadow-sm p-3" style="background-color: #2A2929; color: white;"">
    <h1>Create Post</h1>
    <form method="post" action="{{ route('posts.store') }}">
        @csrf

        <div class="mb-3">
            <label for="title" class="form-label">Title:</label>
            <input type="text" id="title" name="title" class="form-control" required>
        </div>

        <div class="row mb-3">
            <div class="col-md-4">
                <label for="host" class="form-label">Host:</label>
                <select id="host" name="host" class="form-select" required>
                    <option value="vidhide">VidHide</option>
                    <option value="streamtape">Streamtape</option>
                </select>
            </div>
            <div class="col-md-4">
                <label for="file_code" class="form-label">File Code:</label>
                <input type="text" id="file_code" name="file_code" class="form-control" required>
            </div>
            <div class="col-md-4">
                <label for="poster_url" class="form-label">Poster URL:</label>
                <input type="text" id="poster_url" name="poster_url" class="form-control" required>
            </div>
        </div>

        <div class="mb-3">
            <label for="description" class="form-label">Description:</label>
            <textarea id="description" name="description" class="form-control"></textarea>
        </div>
        
        <div class="row mb-3">
            <!-- Categories -->
            <div class="col-md-3">
                <label for="quality" class="form-label">Quality:</label>
                <select id="quality" name="quality" class="form-select">
                    <option value="">Select Quality</option>
                    <option value="SD">SD</option>
                    <option value="720p">720p</option>
                    <option value="1080p">1080p</option>
                    <option value="4K">4K</option>
                </select>
            </div>
            <!-- Content Star -->
            <div class="col-md-3">
                <label for="content_star" class="form-label">Content Star:</label>
                <select id="content_star" name="content_star" class="form-select">
                    @foreach ($contentStars as $contentStar)
                        <option value="{{ $contentStar->id }}">{{ $contentStar->name }}</option>
                    @endforeach
                </select>
            </div>
            <!-- Company -->
            <div class="col-md-3">
                <label for="company" class="form-label">Company:</label>
                <select id="company" name="company" class="form-select">
                    @foreach ($companies as $company)
                        <option value="{{ $company->id }}">{{ $company->name }}</option>
                    @endforeach
                </select>
            </div>
            <!-- Duration -->
            <div class="col-md-3">
                <label for="duration" class="form-label">Duration:</label>
                <input type="text" id="duration" name="duration" class="form-control">
            </div>
        </div>

        <!-- Quality row -->
        <div class="row mb-3">
            <div class="col-md-12">
                <label for="categories" class="form-label">Categories:</label>
                <select id="categories" name="categories[]" multiple class="form-select" required>
                    @foreach ($categories as $category)
                        <option value="{{ $category->id }}">{{ $category->name }}</option>
                    @endforeach
                </select>
            </div>
        </div>
        
        <button type="submit" class="btn btn-primary">Create Post</button>
    </form>
</div>
@endsection
