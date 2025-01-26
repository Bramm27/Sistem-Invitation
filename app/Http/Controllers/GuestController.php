<?php

namespace App\Http\Controllers;

use App\Models\Guest;
use Illuminate\Http\Request;
use PHPUnit\Framework\Constraint\Count;

class GuestController extends Controller
{
    public function dashboard()
    {
        $guests = Guest::whereIn('respons', ['Hadir', 'Tidak Hadir'])->get();
        $totalGuest = count(Guest::all());
        $totalRespons = count($guests);
        $totalPresent = Guest::where('respons', 'Hadir')->count();
        $totalCheck = Guest::where('check_in', 'Hadir')->count();
        return view('admin.dashboard', compact('guests', 'totalGuest', 'totalRespons', 'totalPresent', 'totalCheck'));
    }

    public function index()
    {
        return view('admin.create');
    }

    public function table()
    {
        $guests = Guest::all();
        return view('admin.table', compact('guests'));
    }

    public function store(Request $request)
    {
        $guess = new Guest;
        $guess->name = $request->name;
        $guess->number_phone = $request->number_phone;
        $guess->company_name = $request->company_name;
        $guess->respons = "Belum ada respon";
        $guess->check_in = "Belum Check-In";
        $guess->save();

        return redirect()->route('table');
    }
}
