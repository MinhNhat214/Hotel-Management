<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class BookingController extends Controller
{
    //
    public function index(){
        return view('index');
    }

    public function getRoomtypes(Request $request){
        $data = $request->validate([
            'checkin_date' => 'required|date',
            'checkout_date' => 'required|date|after_or_equal:checkin_date',
            'guest_count' => 'required|integer|min:1'
        ]);
        // print_r($data);
        // return 'data';
        return redirect()->route('roomtype')->with($data);
    }
}
