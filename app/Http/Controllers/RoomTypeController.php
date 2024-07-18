<?php

namespace App\Http\Controllers;

use App\Models\RoomType;
use Illuminate\Http\Request;

class RoomTypeController extends Controller
{
    //
    public function index(Request $request){
        $data = $request->only(['checkin_date', 'checkout_date', 'guest_count']);

        // if(empty($data)){
            // return 'khong lay duoc data';
            // return redirect()->route('index');
        // }

        $roomtypes = RoomType::all();

        return view('roomtypes')->with(['data'=>$data,'roomtypes'=>$roomtypes]);
    }

    public function getBooking(Request $request){
        $data = $request->validate([
            'checkin_date' => 'required|date',
            'checkout_date' => 'required|date|after_or_equal:checkin_date',
            'guest_count' => 'required|min:1',
            'roomtype' => 'required|exists:room_types,id'
        ]);

        return redirect()->route('booking.details')->with($data);
    }




}
