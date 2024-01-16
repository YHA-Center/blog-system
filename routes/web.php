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
Route::get('posts/detail/{id}', [PostController::class, 'detail'])->name('PostDetail');
Route::get('posts/create', [PostController::class, 'create'])->name('PostCreate');
Route::post('posts/store', [PostController::class, 'post'])->name('PostStore');

// frontend
// home sectoin
Route::get('/', [HomeController::class, 'home'])->name('HomePage');
