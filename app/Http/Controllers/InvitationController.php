<?php

namespace App\Http\Controllers;

use App\Models\Guest;
use Illuminate\Contracts\Session\Session;
use Illuminate\Http\Request;
use SimpleSoftwareIO\QrCode\Facades\QrCode;

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

    public function changeStatus(Request $request)
{
    // Validasi input
    $request->validate([
        'username' => 'required|string|exists:guests,username', // Username harus ada di tabel
        'status' => 'required|in:hadir,tidak hadir', // Status hanya boleh hadir atau tidak hadir
    ]);

    // Cari user berdasarkan username
    $user = Guest::where('username', $request->username)->first();

    // Update kolom 'respon' sesuai dengan tombol yang diklik
    $user->respons = $request->status;

    // Jika status adalah 'hadir', buat QR Code dan simpan ke database
    if ($request->status == 'hadir') {
        $qrCode = QrCode::size(200)->generate($user->username); // Ganti dengan data yang ingin ditampilkan di QR Code
        $user->qr_code = $qrCode; // Simpan QR Code ke kolom qr_code di database
    } else {
        $user->qr_code = null; // Jika tidak hadir, hapus QR Code
    }

    $user->save(); // Simpan perubahan ke database

    // Redirect dengan pesan sukses
    return redirect()->back()->with('success', 'Status berhasil diubah.');
}


public function generateQrCode($user)
{
    // Menyusun data tamu dalam format teks
    $data = "Nama: {$user->name}\nPerusahaan: {$user->company}\nNomor: {$user->phone}";

    // Menghasilkan QR Code dari data tersebut
    $qrCode = QrCode::size(300)->generate($data);

    // Menyimpan QR Code ke session atau langsung mengirimkannya ke view
    return view('invitation', compact('qrCode'));
}

public function storeQrCode(Request $request)
{
    // Misalnya generate QR code menggunakan library seperti 'simple-qrcode'
    $qrCode = QrCode::generate($request->data);

    // Simpan QR Code ke session
    session(['qrCode' => $qrCode]);

    // Redirect kembali ke halaman
    return redirect()->route('your_route');
}


}
