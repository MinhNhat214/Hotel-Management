<?php

namespace App\Http\Controllers;

use App\Models\Room;
use App\Models\RoomType;
use Carbon\Carbon;
use Faker\Core\DateTime;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Session;
use PhpParser\Node\Stmt\TryCatch;

class RoomTypeController extends Controller
{
    //
    public function index()
    {
        if (empty(session('checkin_date')) || empty(session('checkout_date')) || empty(session('guest_count'))) {
            return route('index');
        }

        $roomtypes = RoomType::all();

        return view('roomtypes')->with([
            'roomtypes' => $roomtypes
        ]);
    }

    public function getBooking(Request $request)
    {
        try {
            if (!isset($request->roomtype_id)) {
                return redirect()->back()->withErrors('fail', 'Room type id khong ton tai!');
            }

            $roomtype_id = $request->roomtype_id;

            $roomtypes = RoomType::find($roomtype_id);

            if (!$roomtypes) {
                return redirect()->route('roomtype')->withErrors(['fail' => 'Không tìm thấy loại phòng']);
            }

            $request->session()->put('roomtype', $roomtypes->toArray());

            $room = $this->getTrueRoom($roomtype_id);

            if (!$room) {
                return redirect()->route('roomtype')->withErrors(['fail' => 'Số phòng hiện đã hết, vui lòng chọn loại phòng khác!']);
            }

            $this->storeBookingDetail($request, $room, $roomtypes);

            return redirect()->route('booking.details');
        } catch (\Throwable $th) {
            throw $th;
        }
    }

    private function getTrueRoom($roomtype_id)
    {
        return Room::where('roomtype_id', $roomtype_id)
            ->where('status', false)
            ->first();
    }

    private function storeBookingDetail(Request $request, $room, $roomtypes)
    {
        $request->session()->put('rooms', $room->toArray());

        // tinh total_price = count_date * price
        $checkin_date = session('checkin_date');
        $checkout_date = session('checkout_date');

        $start_date = Carbon::parse($checkin_date);
        $end_date = Carbon::parse($checkout_date);
        // dd(session('checkin_date'));

        $count_date = $start_date->diffInDays($end_date);

        $total_price = $roomtypes->price * $count_date;
        // dd($count_date, $total_price);

        $request->session()->put('room_type_id', $request->input('room_type_id'));
        $request->session()->put('count_date', $count_date);
        $request->session()->put('total_price', $total_price);

    }
}
