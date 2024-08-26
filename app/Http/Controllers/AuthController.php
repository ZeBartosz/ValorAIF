<?php

namespace App\Http\Controllers;

use App\Http\Controllers\Controller;
use App\Models\User;
use Illuminate\Http\RedirectResponse;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Storage;

class AuthController extends Controller
{
    public function register(Request $request){
        
        // validation
        $request->validate([
            'username' => ['required', 'max:32'],
            'email' => ['required', 'max:255', 'email', 'unique:users'],
            'password' => ['required', 'min:3', 'confirmed'],
            'avatar' => ['nullable', 'file', 'max:3000', 'mimes:png,jpg,webp'],
            'banner' => ['nullable', 'file', 'max:3000', 'mimes:png,jpg,webp']
        ]);

        // Store avatar if exists
        $pathAvatar = null;
        if ($request->hasFile('avatar')) {
            $pathAvatar = Storage::disk('public')->put('account_images/avatar', $request->avator);
        } else {
            $pathAvatar = 'account_images/avatar/default_avatar.png';
        }
        
        // Store avatar if exists
        $pathBanner = null;
        if ($request->hasFile('banner')) {
            $pathBanner = Storage::disk('public')->put('account_images/banner', $request->banner);
        } else {
            $pathBanner = 'account_images/banner/default_banner.jpg';
        }

        // Register
        $user = User::create([
            'username' => $request->username,
            'email' => $request->email,
            'password' => $request->password,
            'avatar' => $pathAvatar,
            'banner' => $pathBanner
        ]);

        // Login
        Auth::login($user);

        // Redirect
        return redirect()->route('posts.index');
    }

    // Login user
    public function login(Request $request) {
            
        $fields = $request->validate([
            'email' => ['required', 'max:255', 'email'],
            'password' => ['required'],
        ]);

        if(Auth::attempt($fields, $request->remember)) {
            return redirect()->intended();
        } else {
            return back()->withErrors([
                'failed' => 'The provided information do not match our records'
            ]);
        }
    }

    public function logout(Request $request) {
        
        // Logout the user
        Auth::logout();

        // Invalidate the session
        $request->session()->invalidate();

        // Regenerate the token 
        $request->session()->regenerateToken();

        // Redirect to home 
        return redirect('/');

    }
}
