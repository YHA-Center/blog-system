<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\HomeController;
use App\Http\Controllers\PostController;
use App\Http\Controllers\CategoryController;

// backend
Route::get('/backend', function () {
    return view('backend.index');
});
Route::resource('backend/category', CategoryController::class);

// post section
Route::get('posts/list', [PostController::class, 'index'])->name('PostList');

// frontend
// home sectoin
Route::get('/', [HomeController::class, 'home'])->name('HomePage');
