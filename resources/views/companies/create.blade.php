<!-- resources/views/companies/create.blade.php -->

@extends('layouts.app')

@section('content')
    <div class="container">
        <div class="row">
            <div class="col-md-8">
                <div class="card">
                    <div class="card-header">Create Company</div>
                    <div class="card-body">
                        <form method="POST" action="{{ route('companies.store') }}">
                            @csrf
                            <div class="form-group">
                                <label for="name">Company Name</label>
                                <input type="text" name="name" id="name" class="form-control" required>
                            </div>
                            <button type="submit" class="btn btn-primary">Create Company</button>
                        </form>
                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection
