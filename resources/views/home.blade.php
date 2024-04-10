@extends('layouts.app')

@section('content')
<div class="container">
    <div class="row justify-content-center">
        <div class="col-md-10">
            <div class="card">
                <div class="card-header">{{ __('Dashboard') }}</div>

                <div class="card-body">
                    @if (session('status'))
                        <div class="alert alert-success" role="alert">
                            {{ session('status') }}
                        </div>
                    @endif

                    @if (Auth::user()->is_admin)
                        {{-- Display admin dashboard --}}
                        <h3>Welcome, Admin!</h3>
                        <div class="row">
                            <div class="col-md-2 mb-4">
                                <a href="{{ route('posts.index') }}" class="text-decoration-none text-dark">
                                    <div class="card text-center">
                                        <div class="card-body">
                                            <i class="fas fa-file-alt fa-3x mb-3"></i>
                                            <p class="card-text">Posts</p>
                                            <span class="badge bg-primary">{{ $postCount }}</span>
                                        </div>
                                    </div>
                                </a>
                            </div>
                            <div class="col-md-2 mb-4">
                                <a href="{{ route('content-stars.index') }}" class="text-decoration-none text-dark">
                                    <div class="card text-center">
                                        <div class="card-body">
                                            <i class="fas fa-star fa-3x mb-3"></i>
                                            <p class="card-text">Stars</p>
                                            <span class="badge bg-primary">{{ $starCount }}</span>
                                        </div>
                                    </div>
                                </a>
                            </div>
                            <div class="col-md-2 mb-4">
                                <a href="{{ route('categories.index') }}" class="text-decoration-none text-dark">
                                    <div class="card text-center">
                                        <div class="card-body">
                                            <i class="fas fa-folder fa-3x mb-3"></i>
                                            <p class="card-text">Categories</p>
                                            <span class="badge bg-primary">{{ $categoryCount }}</span>
                                        </div>
                                    </div>
                                </a>
                            </div>
                            <div class="col-md-2 mb-4">
                                <a href="{{ route('companies.index') }}" class="text-decoration-none text-dark">
                                    <div class="card text-center">
                                        <div class="card-body">
                                            <i class="fas fa-building fa-3x mb-3"></i>
                                            <p class="card-text">Companies</p>
                                            <span class="badge bg-primary">{{ $companyCount }}</span>
                                        </div>
                                    </div>
                                </a>
                            </div>
                            <div class="col-md-2 mb-4">
                                <a href="" class="text-decoration-none text-dark">
                                    <div class="card text-center">
                                        <div class="card-body">
                                            <i class="fas fa-users fa-3x mb-3"></i>
                                            <p class="card-text">Users</p>
                                            <span class="badge bg-primary">{{ $userCount }}</span>
                                        </div>
                                    </div>
                                </a>
                            </div>
                        </div>
                    @else
                        {{-- Display regular user dashboard --}}
                        <p>{{ __('You are logged in!') }}</p>
                    @endif
                </div>
            </div>
        </div>
    </div>
</div>
@endsection
