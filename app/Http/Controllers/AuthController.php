<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class AuthController extends Controller
{
    public function login() {
        return view('login');
    }

    public function loginPost(Request $request)
    {
        $request->validate([
            'email' => 'required|email',
            'password' => 'required|min:6',
        ]);
    
        $credentials = $request->only('email', 'password');
    
        // Debug kredensial
        // dd($credentials);
    
        if (Auth::attempt($credentials)) {
            $request->session()->regenerate();
            dd('Login berhasil');
        }
    
        dd('Login gagal');
    }
}
