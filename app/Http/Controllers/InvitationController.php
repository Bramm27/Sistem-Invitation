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

    public function changeStatus(Request $request) {
        // Validasi input
        $request->validate([
            'username' => 'required|string|exists:guests,username', // Username harus ada di tabel
            'status' => 'required|in:hadir,tidak hadir', // Status hanya boleh hadir atau tidak_hadir
        ]);
    
        // Cari user berdasarkan username
        $user = Guest::where('username', $request->username)->first();
    
        // Update kolom 'respon' sesuai dengan tombol yang diklik
        $user->respons = $request->status;
        $user->save();
    
        // Redirect dengan pesan sukses
        return redirect()->back()->with('success', 'Status berhasil diubah.');        
    }

    
}
