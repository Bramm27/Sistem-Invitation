<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Guest;

class CheckInController extends Controller
{
    public function updateStatus(Request $request)
    {
        // Validasi id tamu dan status hadir/tidak hadir
        $request->validate([
            'id' => 'required|exists:guests,id',
            'status' => 'required|in:hadir,tidak hadir', // Validasi status
        ]);

        // Mencari tamu berdasarkan ID
        $guest = Guest::findOrFail($request->id);

        // Menyimpan status check_in sesuai dengan nilai yang diterima
        $guest->check_in = $request->status == 'hadir' ? 'Tamu Hadir' : 'Tamu Tidak Hadir';
        $guest->save();

        // Mengirimkan respons dengan status terbaru
        return response()->json([
            'message' => 'Status Check-in berhasil diperbarui',
            'new_status' => $guest->check_in // Mengirimkan status terbaru yang disimpan
        ]);
    }
}
