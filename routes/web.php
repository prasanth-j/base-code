<?php

use App\Http\Controllers\BlogController;
use App\Http\Controllers\HomeController;
use App\Http\Controllers\UserController;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Route;

Route::redirect('/', 'login');

Auth::routes();

Route::middleware('auth')->group(function () {
    Route::get('home', [HomeController::class, 'index'])->name('home');
    
    // User CRUD routes
    Route::resource('users', UserController::class)->except('show');
    
    // Blog CRUD routes
    Route::resource('blogs', BlogController::class)->except('show');
});
