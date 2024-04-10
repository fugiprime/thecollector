<?php

use Illuminate\Support\Facades\Route;
use Illuminate\Support\Facades\Auth;


Route::resource('content-stars', App\Http\Controllers\ContentStarController::class);
Route::resource('companies', App\Http\Controllers\CompanyController::class);
Route::resource('categories', App\Http\Controllers\CategoryController::class);
Route::resource('posts', App\Http\Controllers\PostsController::class);
Route::get('/', [App\Http\Controllers\IndexController::class, 'index'])->name('welcome');
Route::get('/allposts', [App\Http\Controllers\PostsController::class, 'showNewest'])->name('allposts');
Route::get('/popular', [App\Http\Controllers\PostsController::class, 'showByViews'])->name('popular');
Route::get('/star/{contentStar}', 'App\Http\Controllers\PostsController@showByContentStar')->name('posts.byContentStar');
Route::get('/company/{company}', 'App\Http\Controllers\PostsController@showByCompany')->name('posts.byCompany');
Route::get('/category/{category}', 'App\Http\Controllers\PostsController@showByCategory')->name('posts.byCategory');
Route::get('/stars', 'App\Http\Controllers\ContentStarController@allStars')->name('content-stars.all');


Auth::routes();

Route::get('/home', [App\Http\Controllers\HomeController::class, 'index'])->name('home');

Route::get('/admin/dashboard', function () {
    // Check if the authenticated user is an admin
    if (Auth::check() && Auth::user()->is_admin) {
        return view('admin.dashboard');
    } else {
        return redirect()->route('unauthorized'); // Redirect to unauthorized page
    }
})->name('admin.dashboard');

Route::get('/unauthorized', function () {
    return view('unauthorized'); // Unauthorized page
})->name('unauthorized');

