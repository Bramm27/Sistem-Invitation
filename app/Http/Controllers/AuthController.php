<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use App\Models\User;
use Illuminate\Support\Facades\Hash;

class AuthController extends Controller
{
    public function login() {
        if (Auth::check()) {
            return redirect()->route('dashboard'); // Redirect to dashboard if already logged in
        }
    
        return view('login');
    }

    public function loginPost(Request $request)
    {
        $request->validate([
            'email' => 'required|email',
            'password' => 'required|min:6',
        ]);

        if (Auth::attempt(['email' => $request->email, 'password' => $request->password])) {
            // If successful, redirect to the dashboard or another page
            return redirect()->route('dashboard')->with('success', 'You are successfully logged in!');
        }

        // If unsuccessful, redirect back with an error message
        return back()->withErrors(['email' => 'Invalid email or password.'])->withInput();
    }

    public function register() {
        if (Auth::check()) {
            return redirect()->route('dashboard'); // Redirect to dashboard if already logged in
        }
    
        return view('register');
    }

    public function registerPost(Request $request){

        $user = new User();

        $user->name = $request->name;
        $user->email = $request->email;
        $user->password = Hash::make($request->password);
        $user->role_id  = 2;

        $user->save();

        // Redirect to the dashboard or another page after successful registration
        return redirect()->route('dashboard')->with('success', 'You have successfully registered and logged in!');

    }

    public function logout(){
        Auth::logout();
        return redirect()->route('login');
    }

    
}
