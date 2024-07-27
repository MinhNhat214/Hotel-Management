<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\Booking;
use Illuminate\Http\Request;

class AdminController extends Controller
{
    //
    public function index(){
        return view('admin.home');
    }
    public function bookingManager(){
        
        $bookings = Booking::all();

        foreach ($bookings as $booking) {
            if ($booking['status'] == 0) {
                $booking['status'] = 'Trống';
            }
            else{
                $booking['status'] = 'Bận';
            }
        }

        return view('admin.booking_manager')->with('bookings',$bookings);
    }
}
