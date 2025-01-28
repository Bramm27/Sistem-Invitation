<?php

use App\Http\Controllers\AuthController;
use App\Http\Controllers\GuestController;
use App\Http\Controllers\InvitationController;
use App\Http\Controllers\LinkedtController;
use App\Http\Controllers\CheckinController;
use App\Http\Controllers\RatingController;
use App\Models\Guest;
use Illuminate\Support\Facades\Route;

/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
| Here is where you can register web routes for your application. These
| routes are loaded by the RouteServiceProvider and all of them will
| be assigned to the "web" middleware group. Make something great!
|
*/

Route::get('/', function () {
    return view('welcome');
});
// Route::get('/dashboard', function () {
//     return view('admin.dashboard');
// });
// Route::get('/table', function () {
//     return view('admin.table');
// });
// Route::get('/create', function () {
//     return view('admin.create');
// });

// Route::get('/dashboard', [GuestController::class, 'dashboard'])->name('dashboard');
// Route::get('/table', [GuestController::class, 'table'])->name('table');
// Route::get('/admin/create', [GuestController::class, 'index']);
// Route::post('/store', [GuestController::class, 'store']);

Route::get('/login', [AuthController::class, 'login'])->name('login');
Route::post('/loginPost', [AuthController::class, 'loginPost'])->name('login.post');
Route::get('/logout', [AuthController::class, 'logout'])->name('logout');

Route::get('/register', [AuthController::class, 'register'])->name('register');
Route::post('/registerPost', [AuthController::class, 'registerPost'])->name('register.post');

Route::group(['middleware' => 'auth'], function () {
    Route::get('/dashboard', [GuestController::class, 'dashboard'])->name('dashboard');
    Route::get('/table', [GuestController::class, 'table'])->name('table');
    Route::get('/admin/create', [GuestController::class, 'index']);
    Route::post('/store', [GuestController::class, 'store']);
    Route::post('/check-in', [CheckInController::class, 'updateStatus'])->name('guest.checkin');
});



Route::post('/statusChange', [InvitationController::class, 'changeStatus']);
Route::get('/invited/{username}', [InvitationController::class, 'invited']);


Route::get('/rating', [RatingController::class, 'index']);
Route::post('/ratingPost', [RatingController::class, 'ratingPost']);