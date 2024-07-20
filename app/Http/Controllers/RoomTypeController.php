<?php

namespace App\Http\Controllers;

use App\Models\RoomType;
use Carbon\Carbon;
use Faker\Core\DateTime;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Session;
use PhpParser\Node\Stmt\TryCatch;

class RoomTypeController extends Controller
{
    //
    public function index(Request $request)
    {
        // Lấy dữ liệu từ session
        // $sessionData = Session::all();
        $checkin_date = $request->session()->get('checkin_date');
        $checkout_date = $request->session()->get('checkout_date');
        $guest_count = $request->session()->get('guest_count');

        $data = [
            'checkin_date' => $checkin_date,
            'checkout_date' => $checkout_date,
            'guest_count' => $guest_count
        ];

        if (empty($checkin_date) || empty($checkout_date) || empty($guest_count)) {
            return route('index');
        }

        $roomtypes = RoomType::all();

        return view('roomtypes')->with([
            'data' => $data,
            'roomtypes' => $roomtypes
        ]);
    }

    public function getBooking(Request $request)
    {
        try {
            if (isset($request->room_type_id)) {
                $room_type_id = $request->room_type_id;
                $roomtypes = RoomType::where('id', $room_type_id)->first();

                // $roomtypesArray = $roomtypes->toArray();
                // dd($roomtypes->name);

                // $data = $request->validate([
                //     'checkin_date' => 'required|date|after:yesterday',
                //     'checkout_date' => 'required|date|after_or_equal:checkin_date',
                //     'guest_count' => 'required|integer|min:1',
                //     // 'roomtype' => 'required|exists:room_types,id',
                //     'room_type_id' => 'required|exists:room_types,id',
                //     // 'id'=>$roomtypes->id,
                // ]);
                // tinh total_price = count_date * price
                $checkin_date = $request->checkin_date;
                $checkout_date = $request->checkout_date;

                $start_date = Carbon::parse($checkin_date);
                $end_date = Carbon::parse($checkout_date);

                $count_date = $start_date->diffInDays($end_date);

                $total_price = $roomtypes->price * $count_date;
                // dd($count_date, $total_price);

                $data = [
                    'checkin_date' => $request->checkin_date,
                    'checkout_date' => $request->checkout_date,
                    'guest_count' => $request->guest_count,
                    'room_type_id' => $request->room_type_id,
                    'count_date' => $count_date,
                    'total_price' => $total_price,
                ];

                $roomtypes = [
                    'id'=>$roomtypes->id,
                    'name' => $roomtypes->name,
                    'description' => $roomtypes->description,
                    'price' => $roomtypes->price,
                    'image_url' =>$roomtypes->image_url
                ];
                // dd($roomtypes);
                // $data = [
                //     'id'=> $roomtypes->id,
                //     'name'=> $roomtypes->name,
                // ];
                // $data = array_merge($data,['roomtypes' => $roomtypesArray]);
                // dd($data);
                // dd($data);
                return redirect()->route('booking.details')->with([
                    'data'=>$data,
                    'roomtypes'=>$roomtypes
                ]);
            } else {
                return redirect()->back()->with('error', 'Room type ID is not set');
            }
        } catch (\Throwable $th) {
            //throw $th;
            dd($th->getMessage());
        }
    }
}
