@extends('layouts.app')

@section('content')

    <body>
        <div class="flex justify-around">

            <form action="{{ route('qrpayment') }}" method="post" class="min-w-80">
                <div class="mb-5">
                    <label for="email" class="block mb-2 text-sm font-medium text-gray-900 dark:text-white">
                        Email nhận thông tin đơn hàng</label>
                    <input type="email" id="email"
                        class="bg-gray-50 border border-gray-300 text-gray-900 text-sm rounded-lg focus:ring-blue-500 focus:border-blue-500 block w-full p-2.5 dark:bg-gray-700 dark:border-gray-600 dark:placeholder-gray-400 dark:text-white dark:focus:ring-blue-500 dark:focus:border-blue-500"
                        placeholder="nguyensa123@gmail.com" required value="{{ Auth::user()->email }}" />
                </div>
                <div class="mb-5">
                    <label for="password" class="block mb-2 text-sm font-medium text-gray-900 dark:text-white">
                        Họ và tên người nhận phòng</label>
                    <input type="password" id="password"
                        class="bg-gray-50 border border-gray-300 text-gray-900 text-sm rounded-lg focus:ring-blue-500 focus:border-blue-500 block w-full p-2.5 dark:bg-gray-700 dark:border-gray-600 dark:placeholder-gray-400 dark:text-white dark:focus:ring-blue-500 dark:focus:border-blue-500"
                        required value="{{ Auth::user()->name }}" />
                </div>
                <button type="submit"
                    class="text-white bg-blue-700 hover:bg-blue-800 focus:ring-4 focus:outline-none focus:ring-blue-300 font-medium rounded-lg text-sm w-full sm:w-auto px-5 py-2.5 text-center dark:bg-blue-600 dark:hover:bg-blue-700 dark:focus:ring-blue-800">
                    Xác nhận thanh toán
                </button>
            </form>

            <div class="max-w-sm bg-white  border-gray-200 rounded-lg dark:bg-gray-800 dark:border-gray-700">
                <h5 class="mb-2 text-xl font-bold tracking-tight text-gray-900 dark:text-white py-5 text-center">
                    Thông tin đặt phòng</h5>

                <img class="rounded-t-lg" src="{{ session('roomtype')['image_url'] }}" alt="" />

                <div class="p-5">
                    <div class="flex justify-around">
                        <p class="mb-3 font-normal text-gray-700 dark:text-gray-400">
                            Từ ngày: {{ session('checkin_date') }}
                        </p>
                        <p>
                            ->
                        </p>
                        <p class="mb-3 font-normal text-gray-700 dark:text-gray-400">
                            Đến ngày: {{ session('checkout_date') }}
                        </p>
                    </div>
                    <p class="mb-3 font-normal text-gray-700 dark:text-gray-400">
                        Số đêm: 
                    </p>

                    <a href="#">
                        <h5 class="mb-2 text-2xl font-bold tracking-tight text-gray-900 dark:text-white">Noteworthy
                            technology acquisitions 2021</h5>
                    </a>
                    <p class="mb-3 font-normal text-gray-700 dark:text-gray-400">Here are the biggest enterprise technology
                        acquisitions of 2021 so far, in reverse chronological order.</p>
                    <a href="#"
                        class="inline-flex items-center px-3 py-2 text-sm font-medium text-center text-white bg-blue-700 rounded-lg hover:bg-blue-800 focus:ring-4 focus:outline-none focus:ring-blue-300 dark:bg-blue-600 dark:hover:bg-blue-700 dark:focus:ring-blue-800">
                        Read more
                        <svg class="rtl:rotate-180 w-3.5 h-3.5 ms-2" aria-hidden="true" xmlns="http://www.w3.org/2000/svg"
                            fill="none" viewBox="0 0 14 10">
                            <path stroke="currentColor" stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                                d="M1 5h12m0 0L9 1m4 4L9 9" />
                        </svg>
                    </a>
                </div>
            </div>



            <div>
                <p>Thông tin thanh toán</p>

                <div>
                    <p>Từ ngày</p>
                    <p>{{ session('checkin_date') }}</p>
                    <br>

                    <p>Đến ngày</p>
                    <p>{{ session('checkout_date') }}</p>
                    <br>

                    <p>Số ngày ở lại</p>
                    <p>{{ session('count_date') }}</p>
                    {{-- {{dd(session('total_price'));}} --}}
                    <br>

                    <p>Dạng phòng</p>
                    <p>{{ session('roomtype')['name'] }}</p>
                    <br>

                    <p>Số phòng</p>
                    <p>{{ session('rooms')['room_number'] }}</p>
                    <br>

                    <p>Giá phòng/đêm</p>
                    <p>{{ format_currency(session('roomtype')['price']) }} VND</p>
                    <br>

                    <p>Số khách</p>
                    <p>{{ session('guest_count') }}</p>
                    <br>

                    <p>Tổng cộng:</p>
                    <p>{{ format_currency(session('total_price')) }} VND</p>
                </div>
            </div>
        </div>
    @endsection
