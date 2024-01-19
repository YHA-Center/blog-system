<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\HomeController;
use App\Http\Controllers\PostController;
use App\Http\Controllers\CategoryController;
use App\Http\Controllers\Auth\LoginController;

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

Auth::routes();

Route::get('/home', [HomeController::class, 'index'])->name('home');
Route::get('/admin/login', [LoginController::class, 'showLogin'])->name('ShowAdminLogin');
Route::post('admin/login',[LoginController::class, 'login'])->name('AdminLogin');
Route::get('admin/logout', [LoginController::class, 'logout'])->name('AdminLogout');