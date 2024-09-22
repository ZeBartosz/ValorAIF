<?php

namespace App\Http\Controllers;

use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\DB;


class AdminController extends Controller {
    
    
    public function index()
    {
        // $users = User::all();
        $users = DB::table('users')->get();
        // $posts = Posts::all();
        $posts = DB::table('posts')->get();

        return view('auth.adminDashboard', ['users' => $users, 'posts' => $posts]);
    }

}