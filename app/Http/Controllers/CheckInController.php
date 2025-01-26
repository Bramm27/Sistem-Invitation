<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Guest;

class CheckinController extends Controller
{
    public function updateStatus(Request $request)
    {
        $guest = Guest::find($request->id);
        if ($guest) {
            $guest->status = $request->status;
            $guest->save();
            return response()->json(['message' => 'Status updated successfully']);
        }
        return response()->json(['message' => 'Data not found'], 404);
    }
}
