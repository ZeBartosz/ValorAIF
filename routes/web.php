<?php

use App\Http\Controllers\AdminController;
use App\Http\Controllers\AuthController;
use App\Http\Controllers\CommentsController;
use App\Http\Controllers\PostsController;
use App\Http\Controllers\ProfileController;
use App\Models\posts;
use Illuminate\Support\Facades\Route;
use Pest\Plugins\Profile;

// Routes to home page 
Route::redirect('/', 'posts');
Route::resource('posts', PostsController::class);
Route::resource('comments', CommentsController::class);
Route::resource('profile', ProfileController::class);
Route::get('/{user}/posts', [ProfileController::class, 'userPosts'])->name('posts.user');
Route::delete('admin/users/delete/{user}', [ProfileController::class, 'destroy'])->name('profileDestroy');




Route::middleware('admin')->group(function () {

    Route::get('/adminDashboard', [AdminController::class, 'index'])->name('adminDashboard');
    Route::post('/promote/{user}', [AdminController::class, 'promote'])->name('adminPromote');
});

// Register
Route::middleware('auth')->group(function () {
    Route::Post('/addPost', [PostsController::class, 'store'])->name('postsStore');
    Route::Post('/posts/{posts}', [CommentsController::class, 'store'])->name('commentStore');
    Route::post('/logout', [AuthController::class, 'logout'])->name('logout');
    Route::get('/profile', [ProfileController::class, 'index'])->name('profile');
    Route::Post('/addPost', [PostsController::class, 'store'])->name('postsStore');
});

Route::middleware('guest')->group(function () {

    Route::view('/register', 'auth.register')->name('register');
    Route::post('/register', [AuthController::class, 'register']);

    Route::view('/login', 'auth.login')->name('login');
    Route::post('/login', [AuthController::class, 'login']);
});
