<?php

namespace App\Http\Controllers;

use App\Http\Controllers\Session;
use App\Models\Booking;
use Illuminate\Contracts\Session\Session as SessionSession;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class BookingController extends Controller
{
    //
    public function index()
    {
        return view('index');
    }

    public function getRoomtypes(Request $request)
    {
        $messages = [
            'checkin_date.required' => 'Hãy nhập ngày nhận phòng',
            'checkout_date.required' => 'Hãy nhập ngày trả phòng',
            'checkin_date.after' => 'Ngày nhận phòng không được trước ngày hôm nay',
            'checkout_date.after_or_equal'=> 'ngày trả phòng phải sau ngày đặt phòng',
        ];

        $request->validate([
            'checkin_date' => 'required|date|after:yesterday',
            'checkout_date' => 'required|date|after_or_equal:checkin_date',
            'guest_count' => 'required|integer|min:1'
        ], $messages);

        $request->session()->put('checkin_date', $request->checkin_date);
        $request->session()->put('checkout_date', $request->checkout_date);
        $request->session()->put('guest_count', $request->guest_count);

        return redirect()->route('roomtype');
    }
    public function bookingDetails()
    {
        return view('booking_detail');
    }

    public function payment(Request $request){
        $dataRoom = $request->session()->get('rooms');

        Booking::create([
            'user_id' => Auth::user()->id,
            'room_id' => $dataRoom['id'],
            'checkin_date' => session('checkin_date'),
            'checkout_date' => session('checkout_date'),
            'guest_count' => session('guest_count'),
            'total_price' => session('total_price'),
            'create_at' => now(),
            'update_at' => now(),
        ]);

        $request->session()->forget('roomtype');
        
        return redirect()->route('index')->with('success', 'Đặt phòng thành công');
    }
}
