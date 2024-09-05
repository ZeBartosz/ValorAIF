<?php

use App\Http\Controllers\AuthController;
use App\Http\Controllers\PostsController;
use App\Http\Controllers\ProfileController;
use App\Models\posts;
use Illuminate\Support\Facades\Route;

// Routes to home page 
Route::redirect('/', 'posts');
Route::resource('posts', PostsController::class);
Route::Post('/addPost', [PostsController::class, 'store'])->name('postsStore');
Route::get('/{user}/posts', [ProfileController::class, 'userPosts'])->name('posts.user');

// Register
Route::middleware('auth')->group(function() {
    Route::post('/logout', [AuthController::class, 'logout'])->name('logout');
    Route::get('/profile', [ProfileController::class, 'index'])->name('profile');
    Route::Post('/addPost', [PostsController::class, 'store'])->name('postsStore');
});

Route::middleware('guest')->group(function() {
    
    Route::view('/register', 'auth.register')->name('register');
    Route::post('/register', [AuthController::class, 'register']);
    
    Route::view('/login', 'auth.login')->name('login');
    Route::post('/login', [AuthController::class, 'login']);
});

