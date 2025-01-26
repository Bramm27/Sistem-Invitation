<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class LinkedtController extends Controller
{
    public function dashboard() {
        return view('admin.dashboard');
    }
    public function table() {
        return view('admin.table');
    }
    public function form() {
        return view('admin.create');
    }
}
