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

        return view('user.posts', ['posts' => $userPosts, 'user' => $user]);
    }


    public function destroy(User $user)
    {
        // Delete post
        $user->delete();

        // Redirect to daashboard
        return back()->with('delete', 'The user has been deleted!');
    }

}
