<?php

use App\Http\Controllers\Admin\AdminController;
use App\Http\Controllers\BookingController;
use App\Http\Controllers\Payment\QRController;
use App\Http\Controllers\RoomTypeController;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\ProfileController;
use App\Models\Booking;

// trang chu mac dinh -> post ngaynhan, ngaytra, sokhach đến roomtype
Route::get('/', [BookingController::class, 'index'])->name('index');

//nhan form tu trang chu -> xử xý validate -> điều hướng đến route roomtype
Route::post('/get-roomtypes', [BookingController::class, 'getRoomtypes'])->name('get.roomtypes');

// nhận form từ trang chủ, trang get roomtype
// -> lưu dữ liệu từ index + gọi dữ liệu từ roomtype để làm input radio -> trả về giao diện roomtype radio
Route::get('/roomtypes', [RoomTypeController::class, 'index'])->name('roomtype');

// nhận form từ trang roomtype radio gộp 2 (roomtype + hóa đơn) mảng lại -> điều hướng đến view hóa đơn
Route::post('/get-booking', [RoomTypeController::class, 'getBooking'])->name('get.booking');

Route::post('/pay',[BookingController::class,'payment'])->name('payment');


// Route booking-detail
Route::get('/booking-detail', [BookingController::class, 'bookingDetails'])
    ->middleware(['auth', 'verified']) // Không sử dụng middleware 'verified' ở đây
    ->name('booking.details');

// Route::get('/', function () {
//     return view('index');
// })->middleware(['auth', 'verified'])->name('index');


//Route admin
Route::get('/admin', [AdminController::class, 'index'])
    ->middleware('admin')->name('admin.home');

Route::get('booking-manager', [AdminController::class, 'bookingManager'])
    ->middleware('admin')->name('admin.bookingmanager');

Route::get('booking-edit/{id}', [AdminController::class, 'bookingEdit'])
    ->middleware('admin')->name('admin.booking_edit');

Route::get('booking-add', [AdminController::class, 'bookingAdd'])
    ->middleware('admin')->name('admin.booking_add');


//Xu ly Update
Route::put('booking-edit-submit', [AdminController::class, 'bookingEditSubmit'])
    ->middleware('admin')->name('admin.booking_edit_submit');
    
Route::post('booking-add-submit', [AdminController::class, 'bookingAddSubmit'])
    ->middleware('admin')->name('admin.booking_add_submit');
Route::post('booking-delete/{id}', [AdminController::class, 'bookingDeleteSubmit'])
    ->middleware('admin')->name('admin.booking_delete_submit');

require __DIR__.'/auth.php';
