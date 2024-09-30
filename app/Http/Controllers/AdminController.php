<?php

namespace App\Http\Controllers;

use App\Http\Controllers\Controller;
use App\Models\User;
use Illuminate\Support\Facades\DB;


class AdminController extends Controller
{


    public function index()
    {
        // $users = User::all();
        $users = DB::table('users')->get();
        // $posts = Posts::all();
        $posts = DB::table('posts')->get();

        return view('auth.adminDashboard', ['users' => $users, 'posts' => $posts]);
    }

    public function promote(User $user)
    {

        $user->update([
            'isAdmin' => 1
        ]);

        return back()->with('success', $user->username . " is promoted to admin");
    }

    public function demote(User $user)
    {

        $user->update([
            'isAdmin' => 0
        ]);

        return back()->with('success', $user->username . " is demoted from being an admin");
    }
}
