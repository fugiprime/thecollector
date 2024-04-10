@extends('layouts.app')

@section('content')
<div class="container border rounded shadow-sm p-3" style="background-color: #2A2929; color: white;">
    <h1>Create Content Star</h1>

    <form action="{{ route('content-stars.store') }}" method="POST">
        @csrf
        <div class="row">
            <div class="col-md-6">
                <div class="form-group">
                    <label for="name">Name</label>
                    <input type="text" name="name" class="form-control" id="name" required>
                </div>
            </div>
            <div class="col-md-6">
                <div class="form-group">
                    <label for="gender">Gender</label>
                    <select name="gender" id="gender" class="form-control" required>
                        <option value="Male">Male</option>
                        <option value="Female">Female</option>
                        <option value="Other">Other</option>
                    </select>
                </div>
            </div>
        </div>
        <div class="row">
            <div class="col-md-6">
                <div class="form-group">
                    <label for="date_of_birth">Date of Birth</label>
                    <input type="date" name="date_of_birth" class="form-control" id="date_of_birth" required>
                </div>
            </div>
            <div class="col-md-6">
                <div class="form-group">
                    <label for="poster_url">Poster URL</label>
                    <input type="url" name="poster_url" class="form-control" id="poster_url" required>
                </div>
            </div>
        </div>
        <div class="form-group">
            <label for="description">Description</label>
            <textarea name="description" class="form-control" id="description" required></textarea>
        </div>
        <div class="mt-4"></div>
        <button type="submit" class="btn btn-primary">Submit</button>
    </form>
</div>
@endsection
