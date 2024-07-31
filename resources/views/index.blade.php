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
    <section
        class="bg-center bg-no-repeat bg-[url('{{ asset('https://statics.vinpearl.com/styles/1920x860/public/2023_01/About%20Pearl%20Club_1673079019.jpg.webp?itok=f-G5FUpc') }}')] bg-gray-700 bg-blend-multiply">
        <div class="px-4 mx-auto max-w-screen-xl text-center py-24 lg:py-56">
            <h1 class="mb-4 text-4xl font-extrabold tracking-tight leading-none text-white md:text-5xl lg:text-6xl">
                CHÀO MỪNG ĐẾN VỚI SUNHOUSE
            </h1>
            <p class="text">
                Trải nghiệm kỳ nghỉ tuyệt vời nhất dành cho bạn.
            </p>
            <form method="post" action="{{ route('get.roomtypes') }}" id="formbooknow"
                class="flex flex-col space-y-4 sm:flex-row sm:justify-center sm:space-y-0 space-x-3 border-slate-300">
                @csrf

                <div class="flex flex-col space-y-4 sm:flex-row sm:justify-center sm:space-y-0 ">
                    <div id="date-range-picker" date-rangepicker class="">
                        <label for="checkin_date" class="block mb-2 text-sm font-medium text-slate-300">Ngày nhận
                            phòng</label>
                        <input type="date" name="checkin_date" id="checkin_date" value="{{ old('checkin_date') }}"
                            class="input">
                    </div>
                </div>
                <div id="date-range-picker" date-rangepicker class="">
                    <label for="checkin_date" class="block mb-2 text-sm font-medium text-slate-300">Ngày trả phòng</label>
                    <input type="date" name="checkout_date" id="checkout_date" value="{{ old('checkout_date') }}"
                        class="bg-gray-50 border border-gray-300 text-gray-900 text-sm rounded-lg focus:ring-blue-500 focus:border-blue-500 block w-full p-2.5">
                </div>


                <div class="">
                    <label for="guest_count" class="block mb-2 text-sm font-medium text-slate-300">Số khách</label>
                    <select name="guest_count" id="guest_count" aria-label="Default select"
                        class="bg-gray-50 border border-gray-300 text-gray-900 text-sm rounded-lg focus:ring-blue-500 focus:border-blue-500 block w-full p-2.5">
                        <option value="1">1</option>
                        <option value="2">2</option>
                        <option value="3">3</option>
                        <option value="4">4+</option>
                    </select>
                </div>

                <button type="submit"
                    class=" mt-8 text-white bg-blue-700 hover:bg-blue-800 focus:ring-4 focus:outline-none focus:ring-blue-300 font-medium rounded-lg text-sm w-full sm:w-auto px-5 py-2.5 text-center">
                    Đặt phòng
                </button>
            </form>
            @error('checkin_date')
                <p class="errors-message text-slate-100">{{ $message }}</p>
            @enderror
            @error('checkout_date')
                <p class="errors-message text-slate-100">{{ $message }}</p>
            @enderror
        </div>
    </section>
@endsection
