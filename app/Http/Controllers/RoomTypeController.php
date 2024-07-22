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
    public function index()
    {
        // Lấy dữ liệu từ session
        // $sessionData = Session::all();
        // $checkin_date = $request->session()->get('checkin_date');
        // $checkout_date = $request->session()->get('checkout_date');
        // $guest_count = $request->session()->get('guest_count');

        // $data = [
        //     'checkin_date' => $checkin_date,
        //     'checkout_date' => $checkout_date,
        //     'guest_count' => $guest_count
        // ];

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
            if (isset($request->room_type_id)) {
                $room_type_id = $request->room_type_id;
                $roomtypes = RoomType::where('id', $room_type_id)->first();

                // dd($roomtypes->name);
                if ($roomtypes) {
                    $request->session()->put('roomtype', $roomtypes->toArray());
                }
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

                //Luu thong tin user vao session


                // $request->session()->put('name', $request->input('name'));

                // $data = [
                //     'checkin_date' => $request->checkin_date,
                //     'checkout_date' => $request->checkout_date,
                //     'guest_count' => $request->guest_count,
                //     'room_type_id' => $request->room_type_id,
                //     'count_date' => $count_date,
                //     'total_price' => $total_price,
                // ];

                // dd($data);

                // $roomtypes = [
                //     'id'=>$roomtypes->id,
                //     'name' => $roomtypes->name,
                //     'description' => $roomtypes->description,
                //     'price' => $roomtypes->price,
                //     'image_url' =>$roomtypes->image_url
                // ];

                // dd($roomtypes);
                // $data = [
                //     'id'=> $roomtypes->id,
                //     'name'=> $roomtypes->name,
                // ];
                // $data = array_merge($data,['roomtypes' => $roomtypesArray]);
                // dd($data);
                // dd($data);
                return redirect()->route('booking.details')
                    // 'data'=>$data,
                    // 'roomtypes'=>$roomtypes
                ;
            } else {
                return redirect()->back()->with('error', 'Room type ID is not set');
            }
        } catch (\Throwable $th) {
            //throw $th;
            dd($th->getMessage());
        }
    }
}
