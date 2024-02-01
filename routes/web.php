<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\HomeController;
use App\Http\Controllers\PostController;
use App\Http\Controllers\UserController;
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
Route::get('posts/edit/{id}', [PostController::class, 'edit'])->name('PostEdit');
Route::post('posts/update/{id}', [PostController::class, 'update'])->name('PostUpdate');
Route::delete('posts/delete/{id}', [PostController::class, 'destory'])->name('PostDelete');

// frontend
// home sectoin
Route::get('/', [HomeController::class, 'home'])->name('HomePage');
Route::get('detail/{id}', [HomeController::class, 'detail'])->name('DetailPage');

Auth::routes();

// login and register section (admin)
Route::get('/home', [HomeController::class, 'index'])->name('home');
Route::get('/admin/login', [LoginController::class, 'showLogin'])->name('ShowAdminLogin');
Route::post('admin/login',[LoginController::class, 'login'])->name('AdminLogin');
Route::get('admin/logout', [LoginController::class, 'logout'])->name('AdminLogout');

// profile
Route::get('admin/profile', [UserController::class, 'showAdminProfile'])->name('AdminProfile');
Route::post('admin/profile/update', [UserController::class, 'updateAdminProfile'])->name('UpdateAdminProfile');

// user login and register page
Route::get('user/login', [LoginController::class, 'showUserLogin'])->name('ShowUserLogin');
Route::get('user/register', [LoginController::class, 'showUserRegister'])->name('ShowUserRegister');
