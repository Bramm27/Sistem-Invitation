<?php

namespace App\Http\Controllers;

use App\Models\Guest;
use Illuminate\Contracts\Session\Session;
use Illuminate\Http\Request;

class InvitationController extends Controller
{
    public function index() {
        return view('user.index');
    }

    public function invited(Request $request, $username) {

        $user = Guest::where('username', $username)->first();
        if (!$user) {
            abort(404, 'User not found');
        }

        return view('user.index', [
            'user' => $user,
        ]);
    }
}
