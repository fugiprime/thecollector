@extends('layouts.app')

@section('content')
<div class="container border rounded shadow-sm p-3" style="background-color: #2A2929; color: white;">
    <h1>Content Stars</h1>

    <a href="{{ route('content-stars.create') }}" class="btn btn-primary mb-3">Create Content Star</a>

    <table class="table">
        <thead>
            <tr>
                <th>Name</th>
                <th>Gender</th>
                <th>Date of Birth</th>
                <th>Action</th>
            </tr>
        </thead>
        <tbody>
            @foreach ($contentStars as $contentStar)
                <tr>
                    <td>{{ $contentStar->name }}</td>
                    <td>{{ $contentStar->gender }}</td>
                    <td>{{ $contentStar->date_of_birth }}</td>
                    <td>
                        <a href="{{ route('content-stars.show', $contentStar->id) }}" class="btn btn-primary">View</a>
                        <a href="{{ route('content-stars.edit', $contentStar->id) }}" class="btn btn-secondary">Edit</a>
                    </td>
                </tr>
            @endforeach
        </tbody>
    </table>
</div>
@endsection
