<?php

namespace App\Http\Controllers;

use App\Http\Controllers\Session;
use Illuminate\Contracts\Session\Session as SessionSession;
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

        $request->validate([
            'checkin_date' => 'required|date|after:yesterday',
            'checkout_date' => 'required|date|after_or_equal:checkin_date',
            'guest_count' => 'required|integer|min:1'
        ], $messages);

        // session([
        //     'checkin_date' => $request->input('checkin_date'),
        //     'checkout_date' => $request->input('checkout_date'),
        //     'guest_count' => $request->input('guest_count')
        // ]);

        // $product = collect([1, 2, 3, 4]);
        // Sess::push('cart', $product);
        $request->session()->put('checkin_date', $request->checkin_date);
        $request->session()->put('checkout_date', $request->checkout_date);
        $request->session()->put('guest_count', $request->guest_count);

        // $data = [
        //     'checkin_date' => $request->input('checkin_date'),
        //     'checkout_date' => $request->input('checkout_date'),
        //     'guest_count' => $request->input('guest_count')
        // ];
        // dd($date);
        // Lưu mảng vào session với khóa 'data'
        // $data = session('data', $data); // Lấy dữ liệu hiện tại hoặc mảng rỗng
        // $data[] = $data; // Thêm mảng mới vào dữ liệu hiện tại
        // $request->session()->put('data', $data);

        // dd($request->session()->get('data'));

        // $data = $request->validate([
        //     'checkin_date' => 'required|date|after:yesterday',
        //     'checkout_date' => 'required|date|after_or_equal:checkin_date',
        //     'guest_count' => 'required|integer|min:1'
        // ], $messages);
        // return dd($data);

        return redirect()->route('roomtype');
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
        return view('booking_detail', compact('data', 'roomtypes'));
    }
    public function getGuestInfor(Request $request)
    {
        // $data['email']
    }
}
