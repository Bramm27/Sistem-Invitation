<?php

namespace App\Http\Controllers;

use App\Models\Rating;
use Illuminate\Http\Request;

class RatingController extends Controller
{
    public function index() {
        return view('rating');
    }

    public function review()
    {
        $reviews = Rating::latest()->get(); // Ambil semua review dari database
        return view('admin.review', compact('reviews'));
    }

    public function ratingPost(Request $request) {
        $rating = new Rating();
        $rating->review = $request->review;
        $rating->rating = $request->rating;
        $rating->save();

        return back();
    }
}
