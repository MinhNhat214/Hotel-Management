<?php

use App\Http\Controllers\Auth\AuthenticatedSessionController;
use App\Http\Controllers\Auth\RegisteredUserController;
use App\Http\Controllers\BookingController;
use App\Http\Controllers\RoomTypeController;
use Illuminate\Support\Facades\Route;



Route::get('/', [BookingController::class, 'index'])->name('index');

Route::post('/get-roomtypes',[BookingController::class,'getRoomtypes'])->name('get.roomtypes');

Route::get('/roomtypes',[RoomTypeController::class,'index'])->name('roomtype');

Route::post('/get-booking',[RoomTypeController::class,'getBooking'])->name('get.booking');


Route::get('/welcom', function () {
    return view('welcome');
})->name('booking.details');
// Route::view('dashboard', 'dashboard')
//     ->middleware(['auth', 'verified'])
//     ->name('dashboard');

// Route::view('profile', 'profile')
//     ->middleware(['auth'])
//     ->name('profile');

//breeze cơ bản
Route::get('/login', function () {
    return view('auth.login');
})->name('login');

Route::get('/register', function () {
    return view('auth.register');
})->name('register');


// Routes cho chức năng đăng ký và đăng nhập
// Route::get('register', [RegisteredUserController::class, 'create'])
//     ->middleware('guest')
//     ->name('register');

// Route::post('register', [RegisteredUserController::class, 'store'])
//     ->middleware('guest');

// Route::get('login', [AuthenticatedSessionController::class, 'create'])
//     ->middleware('guest')
//     ->name('login');

// Route::post('login', [AuthenticatedSessionController::class, 'store'])
//     ->middleware('guest');

// Route::post('logout', [AuthenticatedSessionController::class, 'destroy'])
//     ->middleware('auth')
//     ->name('logout');

// require __DIR__ . '/auth.php';
