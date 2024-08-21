<?php

use App\Http\Controllers\AuthController;
use Illuminate\Support\Facades\Route;

// Routes to home page 
Route::view('/', 'posts.index')->name('home');

// Register
Route::view('/register', 'auth.register')->name('register');
Route::post('/register', [AuthController::class, 'register']);
