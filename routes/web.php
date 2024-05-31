<?php

use App\Http\Controllers\AuthController;
use App\Http\Controllers\CategoryController;
use App\Http\Controllers\DashboardController;
use Illuminate\Support\Facades\Route;

Route::get('/', function () {
    return view('welcome');
});


Route::get('/login', [AuthController::class, 'login'])->name('login');
Route::post('/login', [AuthController::class, 'login_attempt'])->name('login.attempt');
Route::get('/register', [AuthController::class, 'register'])->name('register');

Route::post('register', [AuthController::class, 'store'])->name('store.user');

Route::get('/logout', [AuthController::class, 'logout'])->name('logout');

Route::get('/admin', [DashboardController::class, 'dashboard'])->middleware('auth')->name('dashboard');

Route::get('add-category', [CategoryController::class, 'add'])->middleware('auth')->name('add.category');

Route::post('add-category', [CategoryController::class, 'store'])->name('store.category');

Route::get('all-category', [CategoryController::class, 'all'])->name('all.category');
