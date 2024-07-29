<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\Booking;
use Illuminate\Http\Request;

class AdminController extends Controller
{
    //
    public function index()
    {
        return view('admin.home');
    }
    public function bookingManager()
    {
        $bookings = Booking::paginate(15);

        foreach ($bookings as $booking) {
            if ($booking['status'] == 0) {
                $booking['status'] = 'Chưa thanh toán';
            } else {
                $booking['status'] = 'Đã thanh toán';
            }
        }

        return view('admin.booking_manager')->with('bookings', $bookings);
    }

    public function bookingEdit($id)
    {
        // dd($request->booking_id);
        $booking = Booking::find($id);

        return view('admin.booking_edit')->with('booking', $booking);
    }

    public function bookingAdd()
    {
        return view('admin.booking_add');
    }

    public function bookingEditSubmit(Request $request)
    {
        $request->validate([
            'user_id' => 'required|integer',
            'room_id' => 'required|integer',
            'checkin_date' => 'required|date',
            'checkout_date' => 'required|date',
            'guest_count' => 'required|integer',
            'total_price' => 'required|numeric',
            'status' => 'required|integer',
        ]);

        // dd($request->id);
        $booking = Booking::find($request->id);

        if ($booking) {
            $booking->update([
                'user_id' => $request->user_id,
                'room_id' => $request->room_id,
                'checkin_date' => $request->checkin_date,
                'checkout_date' => $request->checkout_date,
                'guest_count' => $request->guest_count,
                'total_price' => $request->total_price,
                'status' => $request->status,
            ]);
            return redirect()->route('admin.bookingmanager')->with('success', 'Cập nhật thành công');
        }
        return ('khong truy van duoc booking');
    }

    public function bookingAddSubmit(Request $request)
    {
        // $messages=[

        // ];
        // $request->validate([
        //     ''=>''
        // ],$messages);

        Booking::create([
            'user_id' => $request->user_id,
            'room_id' => $request->room_id,
            'checkin_date' => $request->checkin_date,
            'checkout_date' => $request->checkout_date,
            'guest_count' => $request->guest_count,
            'total_price' => $request->total_price,
            'status' => $request->status,
        ]);
        return redirect()->route('admin.bookingmanager')->with('success', 'Thêm hóa đơn thành công');
    }

    public function bookingDeleteSubmit($id)
    {
        $booking = Booking::find($id);
        if ($booking) {
            $booking->delete();
            return redirect()->route('admin.bookingmanager')->with('success', 'Xóa đơn thành công');
        }
        return redirect()->route('admin.bookingmanager')->with('fail', 'Xóa đơn không thành công');
    }
}
