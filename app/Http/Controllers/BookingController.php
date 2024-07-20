<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

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
        ];

        $data = $request->validate([
            'checkin_date' => 'required|date|after:yesterday',
            'checkout_date' => 'required|date|after_or_equal:checkin_date',
            'guest_count' => 'required|integer|min:1'
        ], $messages);
        // return dd($data);

        return redirect()->route('roomtype')->with($data);
    }
    public function bookingDetails(Request $request)
    {
        // $sessionData = Session::all();
        $data = $request->session()->get('data');
        $roomtypes = $request->session()->get('roomtypes');

        // $data = session('data');
        // $roomtypes = $request->session()->get('roomtypes');


        // Hiển thị giá trị và loại dữ liệu
        // return dd($data, gettype($data),$roomtypesArray, gettype($roomtypesArray));
        return view('booking_detail', compact('data','roomtypes'));
    }
    public function getGuestInfor(Request $request){
        
    }
}
