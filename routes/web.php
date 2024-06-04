<?php

use App\Http\Controllers\AuthController;
use App\Http\Controllers\BlogController;
use App\Http\Controllers\CategoryController;
use App\Http\Controllers\DashboardController;
use App\Http\Controllers\HomeController;
use Illuminate\Support\Facades\Route;

Route::get('/', [HomeController::class, 'home'])->name('home');
Route::get('/blog/{id}', [HomeController::class, 'view'])->name('view.blog');
Route::post('/blog-search', [HomeController::class, 'search'])->name('search.blog');


Route::get('/login', [AuthController::class, 'login'])->name('login');
Route::post('/login', [AuthController::class, 'login_attempt'])->name('login.attempt');
Route::get('/register', [AuthController::class, 'register'])->name('register');

Route::post('register', [AuthController::class, 'store'])->name('store.user');

Route::get('/logout', [AuthController::class, 'logout'])->name('logout');


Route::middleware('auth')->group(function () {
    Route::get('/admin', [DashboardController::class, 'dashboard'])->name('dashboard');
    Route::get('admin/add-category', [CategoryController::class, 'add'])->name('add.category');
    Route::post('admin/add-category', [CategoryController::class, 'store'])->name('store.category');
    Route::get('admin/all-category', [CategoryController::class, 'all'])->name('all.category');

    // blogs
    Route::resource('admin/blogs', BlogController::class);
});
