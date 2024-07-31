<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\Booking;
use Carbon\Carbon;
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
        $booking = Booking::find($id);

        return view('admin.booking_edit')->with('booking', $booking);
    }

    public function bookingAdd()
    {
        return view('admin.booking_add');
    }


    public function bookingEditSubmit(Request $request)
    {
        $messages = [
            'user_id.required' => 'Vui lòng nhập Mã người dùng.',
            'user_id.integer' => 'Mã người dùng phải là một số nguyên.',
            'user_id.exists' => 'Mã người dùng không tồn tại trong hệ thống.',
            'room_id.required' => 'Vui lòng nhập Mã phòng.',
            'room_id.exists' => 'Mã phòng không tồn tại trong hệ thống.',
            'room_id.integer' => 'Mã phòng phải là một số nguyên.',
            'checkin_date.required' => 'Vui lòng nhập ngày đặt phòng.',
            'checkin_date.date' => 'Ngày Mã phòng phải là một ngày hợp lệ.',
            'checkout_date.required' => 'Vui lòng nhập ngày Trả phòng.',
            'checkout_date.date' => 'Ngày Trả phòng phải là một ngày hợp lệ.',
            'checkout_date.after' => 'Ngày Trả phòng phải sau ngày Đặt phòng.',
            'guest_count.required' => 'Vui lòng nhập số lượng khách.',
            'guest_count.integer' => 'Số lượng khách phải là một số nguyên.',
            'total_price.required' => 'Vui lòng nhập tổng giá.',
            'total_price.numeric' => 'Tổng giá phải là một số.',
            'status.required' => 'Vui lòng nhập trạng thái.',
            'status.integer' => 'Trạng thái phải là một số nguyên.',
        ];

        $request->validate([
            'user_id' => 'required|integer|exists:users,id',
            'room_id' => 'required|integer|exists:rooms,id',
            'checkin_date' => 'required|date',
            'checkout_date' => 'required|date|after:checkin_date',
            'guest_count' => 'required|integer',
            'total_price' => 'required|numeric',
            'status' => 'required|integer|in:0,1',
        ], $messages);

        $booking = Booking::find($request->booking_id);

        if ($booking) {
            $booking->user_id = $request->user_id;
            $booking->room_id = $request->room_id;
            $booking->checkin_date = $request->checkin_date;
            $booking->checkout_date = $request->checkout_date;
            $booking->guest_count = $request->guest_count;
            $booking->total_price = $request->total_price;
            $booking->status = $request->status;
            $booking->updated_at = Carbon::now();
            $booking->save();

            return redirect()->route('admin.bookingmanager')->with('success', 'Cập nhật thành công');
        }
        return redirect()->route('admin.bookingmanager')->with('fail', 'Cập nhật không thành công');
    }

    public function bookingAddSubmit(Request $request)
    {
        $messages = [
            'user_id.required' => 'Vui lòng nhập Mã người dùng.',
            'user_id.integer' => 'Mã người dùng phải là một số nguyên.',
            'user_id.exists' => 'Mã người dùng không tồn tại trong hệ thống.',
            'room_id.required' => 'Vui lòng nhập Mã phòng.',
            'room_id.exists' => 'Mã phòng không tồn tại trong hệ thống.',
            'room_id.integer' => 'Mã phòng phải là một số nguyên.',
            'checkin_date.required' => 'Vui lòng nhập ngày đặt phòng.',
            'checkin_date.date' => 'Ngày Mã phòng phải là một ngày hợp lệ.',
            'checkout_date.required' => 'Vui lòng nhập ngày Trả phòng.',
            'checkout_date.date' => 'Ngày Trả phòng phải là một ngày hợp lệ.',
            'checkout_date.after' => 'Ngày Trả phòng phải sau ngày Đặt phòng.',
            'guest_count.required' => 'Vui lòng nhập số lượng khách.',
            'guest_count.integer' => 'Số lượng khách phải là một số nguyên.',
            'total_price.required' => 'Vui lòng nhập tổng giá.',
            'total_price.numeric' => 'Tổng giá phải là một số.',
            'status.required' => 'Vui lòng nhập trạng thái.',
            'status.integer' => 'Trạng thái phải là một số nguyên.',
        ];

        $request->validate([
            'user_id' => 'required|integer|exists:users,id',
            'room_id' => 'required|integer|exists:rooms,id',
            'checkin_date' => 'required|date',
            'checkout_date' => 'required|date|after:checkin_date',
            'guest_count' => 'required|integer',
            'total_price' => 'required|numeric',
        ], $messages);

        $booking = new Booking();
        $booking->user_id = $request->user_id;
        $booking->room_id = $request->room_id;
        $booking->checkin_date = $request->checkin_date;
        $booking->checkout_date = $request->checkout_date;
        $booking->guest_count = $request->guest_count;
        $booking->total_price = $request->total_price;
        $booking->status = $request->status;
        $booking->updated_at = Carbon::now();

        $booking->save();
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
