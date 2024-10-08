<?php

use App\Http\Controllers\AdminController;
use App\Http\Controllers\AuthController;
use App\Http\Controllers\CommentsController;
use App\Http\Controllers\LikeController;
use App\Http\Controllers\PostsController;
use App\Http\Controllers\ProfileController;
use Illuminate\Support\Facades\Route;


// Routes to home page 
Route::redirect('/', 'posts');

Route::resource('posts', PostsController::class);
Route::resource('comments', CommentsController::class);
Route::resource('profile', ProfileController::class);
Route::resource('like', LikeController::class);
Route::get('/{user}/posts', [ProfileController::class, 'userPosts'])->name('posts.user');




Route::middleware('admin')->group(function () {
    
    Route::delete('admin/users/delete/{user}', [ProfileController::class, 
    'destroy'])->name('profileDestroy');
    
    Route::get('/adminDashboard', [AdminController::class, 'index'])->name('adminDashboard');
    Route::post('/promote/{user}', [AdminController::class, 'promote'])->name('adminPromote');
    Route::post('/demote/{user}', [AdminController::class, 'demote'])->name('adminDemote');
});

// Register
Route::middleware('auth')->group(function () {

    Route::get('/profile', [ProfileController::class, 'index'])->name('profile');
    
    Route::post('/logout', [AuthController::class, 'logout'])->name('logout');
    
    Route::Post('/addPost', [PostsController::class, 'store'])->name('postsStore');
    Route::Post('/addPost', [PostsController::class, 'store'])->name('postsStore');

    Route::Post('/posts/{posts}', [CommentsController::class, 'store'])->name('commentStore');
    Route::Post('/comments/{posts}/{comments}/store', [CommentsController::class, 'store']);
    Route::put('/comments/{comment}', [CommentsController::class, 'update'])->name('comments.update');

    Route::Post('/posts/{posts}/like', [LikeController::class, 'like'])->name('likes');
    Route::Post('/posts/{posts}/dislike', [LikeController::class, 'dislike'])->name('dislikes');

    Route::Post('/posts/{comment}/commentLike', [LikeController::class, 'commentLike'])->name('commentLikes');
    Route::Post('/posts/{comment}/commentDislike', [LikeController::class, 'commentDislike'])->name('commentDislikes');
});

Route::middleware('guest')->group(function () {

    Route::view('/register', 'auth.register')->name('register');
    Route::post('/register', [AuthController::class, 'register']);

    Route::view('/login', 'auth.login')->name('login');
    Route::post('/login', [AuthController::class, 'login']);
});
