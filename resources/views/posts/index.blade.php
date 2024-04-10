@extends('layouts.app')

@section('title', 'Posts')

@section('content')
    <div class="container border rounded shadow-sm p-3" style="background-color: #2A2929; color: white;">
        <h1>Posts</h1>
        
        <a href="{{ route('posts.create') }}" class="btn btn-primary mb-3">Create New Post</a>
        
        <div class="table-responsive">
            <table class="table table-striped">
                <thead>
                    <tr>
                        <th>Title</th>
                        <th>Host</th>
                        <th>File Code</th>
                        <th>Description</th>
                        <th>Categories</th>
                        <th>Content Star</th>
                        <th>Company</th>
                        <th>Action</th>
                    </tr>
                </thead>
                <tbody>
                    @foreach ($posts as $post)
                    <tr>
                        <td><a href="{{ route('posts.show', $post->id) }}">{{ $post->title }}</a></td>
                        <td>{{ $post->host }}</td>
                        <td>{{ $post->file_code }}</td>
                        <td>{{ $post->description }}</td>
                        <td>
                            @foreach ($post->categories as $category)
                                {{ $category->name }}@if (!$loop->last), @endif
                            @endforeach
                        </td>
                        <td>{{ optional($post->contentStar)->name }}</td>
                        <td>{{ optional($post->company)->name }}</td>
                        <td>
                            <a href="{{ route('posts.edit', $post->id) }}" class="btn btn-primary btn-sm">Edit</a>
                            <form action="{{ route('posts.destroy', $post->id) }}" method="post" class="d-inline">
                                @csrf
                                @method('DELETE')
                                <button type="submit" class="btn btn-danger btn-sm">Delete</button>
                            </form>
                        </td>
                    </tr>
                    @endforeach
                </tbody>
            </table>
        </div>
    </div>
<style>
    .poster-url {
        word-wrap: break-word; /* This will allow the text to wrap within the cell */
        max-width: 150px; /* Optionally, you can limit the maximum width of the cell */
    }
</style>

@endsection
