@extends('layouts.app')

@section('content')
    @if (session('success'))
        <div class="success">
            {{ session('success') }}
        </div>
    @elseif (session('fail'))
        <div class="fail">
            {{ session('fail') }}
        </div>
    @endif
    <div class="flex justify-around">
        <form action="{{ route('payment') }}" method="post" class="min-w-80">
            @csrf
            <div class="mb-5">
                <label for="email" class="block mb-2 text-sm font-medium text-gray-900">
                    Email người liên hệ</label>
                <input type="email" id="email" class="input" placeholder="nguyensa123@gmail.com" required
                    value="{{ Auth::user()->email }}" />
            </div>
            <div class="mb-5">
                <label for="fullname" class="block mb-2 text-sm font-medium text-gray-900">
                    Họ và tên người nhận phòng</label>
                <input type="text" id="fullname" class="input" required value="{{ Auth::user()->name }}" />
            </div>
            <button type="submit"
                class="text-white bg-blue-700 hover:bg-blue-800 focus:ring-4 focus:outline-none focus:ring-blue-300 font-medium rounded-lg text-sm w-full sm:w-auto px-5 py-2.5 text-center">
                Xác nhận thanh toán
            </button>
        </form>

        <div class="max-w-sm bg-white  border-gray-200 rounded-lg">
            <h5 class="mb-2 text-xl font-bold tracking-tight text-gray-900 py-5 text-center">
                Thông tin đặt phòng</h5>
            <img class="rounded-t-lg" src="{{ session('roomtype')['image_url'] }}" alt="" />
            <div class="p-5">
                <div class="flex">
                    <p class="mb-3 font-normal text-gray-700">
                        {{ session('checkin_date') }}
                    </p>
                    <p class="px-10 font-normal text-gray-700">
                        *
                    </p>
                    <p class="mb-3 font-normal text-gray-700">
                        {{ session('checkout_date') }}
                    </p>
                </div>
                <p class="mb-3 font-normal text-gray-700">
                    Số đêm: {{ session('count_date') }}
                </p>

                <a href="#">
                    <h5 class="mb-2 text-2xl font-bold tracking-tight text-gray-900">
                        {{ session('roomtype')['name'] }}
                    </h5>
                </a>
                <p class="mb-3 font-normal text-gray-700">
                    Số phòng: {{ session('rooms')['room_number'] }}
                </p>
                <p class="mb-3 font-normal text-gray-700">
                    {{ format_currency(session('roomtype')['price']) }} VND
                </p>
                <p class="mb-3 font-normal text-gray-700">
                    Số khách: {{ session('guest_count') }}
                </p>
                <p class="mb-3 text-xl text-green-600 float-right font-semibold">
                    {{ format_currency(session('total_price')) }} VND
                </p>
            </div>
        </div>
    </div>
@endsection
