<?php

use App\Http\Controllers\Auth\AuthenticatedSessionController;
use App\Http\Controllers\Auth\EmailVerificationNotificationController;
use App\Http\Controllers\Auth\EmailVerificationPromptController;
use App\Http\Controllers\Auth\RegisteredUserController;
use App\Http\Controllers\Auth\VerifyEmailController;
use App\Http\Controllers\BookingController;
use App\Http\Controllers\Payment\QRController;
use App\Http\Controllers\RoomTypeController;
use App\Models\Booking;
use Illuminate\Foundation\Auth\EmailVerificationRequest;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Route;
use Illuminate\Support\Facades\Session;
use Illuminate\Support\Facades\Mail;


//trang chu mac dinh -> post ngaynhan,ngaytra,sokhach đến roomtype
Route::get('/', [BookingController::class, 'index'])->name('index');

//nhan form tu trang chu -> xử xý validate -> điều hướng đến route roomtype
Route::post('/get-roomtypes', [BookingController::class, 'getRoomtypes'])->name('get.roomtypes');

//nhận form từ trang chủ, trang get roomtype
// -> lưu dữ liệu từ index + gọi dữ liệu từ roomtype để làm input radio -> trả về giao diện roomtype radio
Route::get('/roomtypes', [RoomTypeController::class, 'index'])->name('roomtype');

//nhận form từ trang roomtype radio gộp 2 (roomtype + hóa đơn) mảng lại -> điều hướng đến view hóa đơn
Route::post('/get-booking', [RoomTypeController::class, 'getBooking'])->name('get.booking');

// Route::get('/booking-detail',[BookingController::class,'bookingDetails'])->name('booking.details');


Route::get('/booking-detail', [BookingController::class, 'bookingDetails'])
    ->middleware(['auth', 'verified'])
    ->name('booking.details');


//brezee
// Route::view('dashboard', 'dashboard')
//     ->middleware(['auth', 'verified'])
//     ->name('dashboard');

// Route::view('profile', 'profile')
//     ->middleware(['auth'])
//     ->name('profile');

//breeze cơ bản
// Route::get('/login', function () {
//     return view('auth.login');
// })->name('login');

// Route::get('/register', function () {
//     return view('auth.register');
// })->name('register');


// Routes cho chức năng đăng ký và đăng nhập
Route::middleware('guest')->group(function () {
    Route::get('register', [RegisteredUserController::class, 'create'])->name('register');
    Route::post('register', [RegisteredUserController::class, 'store']);

    Route::get('login', [AuthenticatedSessionController::class, 'create'])->name('login');
    Route::post('login', [AuthenticatedSessionController::class, 'store']);
});

// Đăng xuất
Route::post('logout', [AuthenticatedSessionController::class, 'destroy'])
    ->middleware('auth')
    ->name('logout');



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


//email verify
Route::middleware('auth')->group(function () {
    Route::get('verify-email', [EmailVerificationPromptController::class, '__invoke'])
        ->name('verification.notice');

    Route::get('verify-email/{id}/{hash}', [VerifyEmailController::class, '__invoke'])
        ->middleware(['signed', 'throttle:6,1'])
        ->name('verification.verify');

    Route::post('email/verification-notification', [EmailVerificationNotificationController::class, 'store'])
        ->middleware('throttle:6,1')
        ->name('verification.send');
});
// require __DIR__ . '/auth.php';

//payment
Route::post('/qrpayment', [QRController::class, 'index'])->name('qrpayment');


Route::get('/send-test-email', function () {
    Mail::raw('This is a test email using Mailtrap.', function ($message) {
        $message->to('test@example.com')
                ->subject('Test Email');
    });

    return 'Test email sent.';
});
