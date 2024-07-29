@extends('layouts.app')

@section('content')

    <p class="text-center m-5">Chưa validate các input</p>
    <form class="container mx-auto px-60 pb-10" method="post" action="{{route('admin.booking_add_submit')}}">
        @csrf
        <div class="grid gap-6 mb-6 md:grid-cols-2">
            <div>
                <label for="user_id" class="block mb-2 text-sm font-medium text-gray-900 dark:text-white">
                    Mã người dùng
                </label>
                <input type="number" id="user_id" name="user_id"
                    class="input"
                    value="{{$booking->id}}" required />
            </div>
            <div>
                <label for="room_id" class="block mb-2 text-sm font-medium text-gray-900 dark:text-white">Mã phòng</label>
                <input type="number" id="room_id" name="room_id"
                    class="bg-white border border-gray-300 text-gray-900 text-sm rounded-lg focus:ring-blue-500 focus:border-blue-500 block w-full p-2.5 dark:bg-gray-700 dark:border-gray-600 dark:placeholder-gray-400 dark:text-white dark:focus:ring-blue-500 dark:focus:border-blue-500"
                    value="{{$booking->room_id}}" required/>
            </div>
            <div>
                <label for="checkin_date"
                    class="block mb-2 text-sm font-medium text-gray-900 dark:text-white">Từ ngày</label>
                <input type="date" id="checkin_date" name="checkin_date"
                    class="bg-gray-50 border border-gray-300 text-gray-900 text-sm rounded-lg focus:ring-blue-500 focus:border-blue-500 block w-full p-2.5 dark:bg-gray-700 dark:border-gray-600 dark:placeholder-gray-400 dark:text-white dark:focus:ring-blue-500 dark:focus:border-blue-500"
                    value="{{$booking->checkin_date}}" required/>
            </div>
            <div>
                <label for="checkout_date"
                    class="block mb-2 text-sm font-medium text-gray-900 dark:text-white">Đến ngày</label>
                <input type="date" id="checkout_date" name="checkout_date"
                    class="bg-gray-50 border border-gray-300 text-gray-900 text-sm rounded-lg focus:ring-blue-500 focus:border-blue-500 block w-full p-2.5 dark:bg-gray-700 dark:border-gray-600 dark:placeholder-gray-400 dark:text-white dark:focus:ring-blue-500 dark:focus:border-blue-500"
                    value="{{$booking->checkout_date}}" required />
            </div>
            <div>
                <label for="guest_count" class="block mb-2 text-sm font-medium text-gray-900 dark:text-white">Số khách
                    </label>
                <input type="number" id="guest_count" name="guest_count"
                    class="bg-gray-50 border border-gray-300 text-gray-900 text-sm rounded-lg focus:ring-blue-500 focus:border-blue-500 block w-full p-2.5 dark:bg-gray-700 dark:border-gray-600 dark:placeholder-gray-400 dark:text-white dark:focus:ring-blue-500 dark:focus:border-blue-500"
                    value="{{$booking->guest_count}}" required />
            </div>
            <div>
                <label for="total_price" class="block mb-2 text-sm font-medium text-gray-900 dark:text-white">Tổng tiền
                    </label>
                <input type="number" id="total_price" name="total_price"
                    class="bg-gray-50 border border-gray-300 text-gray-900 text-sm rounded-lg focus:ring-blue-500 focus:border-blue-500 block w-full p-2.5 dark:bg-gray-700 dark:border-gray-600 dark:placeholder-gray-400 dark:text-white dark:focus:ring-blue-500 dark:focus:border-blue-500"
                    value="{{$booking->total_price}}" required />
            </div>

            <div>
                <label for="status" class="block mb-2 text-sm font-medium text-gray-900 dark:text-white">Trạng thái
                    </label>
                <select id="status" name="status"
                    class="bg-gray-50 border border-gray-300 text-gray-900 text-sm rounded-lg focus:ring-blue-500 focus:border-blue-500 block w-full p-2.5 dark:bg-gray-700 dark:border-gray-600 dark:placeholder-gray-400 dark:text-white dark:focus:ring-blue-500 dark:focus:border-blue-500"
                    placeholder="" required>
                    <option value="0">Trống</option>
                    <option value="1">Bận</option>
                </select>
            </div>

        </div>
        <button type="submit" class="text-white bg-blue-700 hover:bg-blue-800 focus:ring-4 focus:ring-blue-300 font-medium rounded-lg text-sm px-5 py-2.5 me-2 mb-2 dark:bg-blue-600 dark:hover:bg-blue-700 focus:outline-none dark:focus:ring-blue-800">Lưu chỉnh sửa</button>
    </form>

@endsection
