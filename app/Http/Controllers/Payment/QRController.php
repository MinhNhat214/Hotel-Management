<?php

namespace App\Http\Controllers\Payment;

use App\Http\Controllers\Controller;
use App\Models\Booking;
use App\Models\RoomType;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class QRController extends Controller
{
    //
    public function index(Request $request)
    {
        // Lấy dữ liệu từ session

        // $data['email']
        $dataRoomtype = $request->session()->get('roomtype');

        $dataRoom = $request->session()->get('rooms');

        // dd(session('total_price'));

        // if ($request->session()->get('roomtype')) {
        $storeRoomtype = Booking::create([
            'user_id' => Auth::user()->id,
            'room_id' => $dataRoom['id'],
            'checkin_date' => session('checkin_date'),
            'checkout_date' => session('checkout_date'),
            'guest_count' => session('guest_count'),
            'total_price' => session('total_price'),
            'create_at' => now(),
            'update_at' => now(),
        ]);
        // }
        // dd($storeRoomtype);
        $request->session()->forget('roomtype');

        return view('payment.qrpayment');
    }
}
