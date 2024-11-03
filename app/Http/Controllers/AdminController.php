<?php

namespace App\Http\Controllers;

use App\Http\Controllers\Controller;
use App\Models\User;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\DB;


class AdminController extends Controller
{


    public function index()
    {
        $users = User::all();
        $posts = DB::table('posts')->get();

        return view('auth.adminDashboard', ['users' => $users, 'posts' => $posts]);
    }

    public function promote(User $user)
    {

        $user->assignRole('admin');

        return back()->with('success', $user->username . " is promoted to admin");
    }

    public function demote(User $user)
    {
        if ($user->id === Auth::user()->id) {
            return back()->with('success', "Sadly you cant demote yourself");
        }

        $user->removeRole('admin');

        return back()->with('success', $user->username . " is demoted from being an admin");
    }
}
