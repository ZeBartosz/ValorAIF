<?php

namespace App\Http\Controllers;

use App\Http\Controllers\Controller;
use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class ProfileController extends Controller
{
    public function index()
    {

        $posts = Auth::user()->posts()->latest()->paginate(6);

        return view('user.profile', ['posts' => $posts]);
    }

    public function userPosts(User $user)
    {

        $userPosts = $user->posts()->latest()->paginate(6);

        return view('user.postsUser', ['posts' => $userPosts, 'user' => $user]);
    }
}
