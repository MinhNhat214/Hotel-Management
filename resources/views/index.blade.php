@extends('layouts.app')

@section('content')
    <section
        class="bg-center bg-no-repeat bg-[url('{{ asset('https://statics.vinpearl.com/styles/1920x860/public/2023_01/About%20Pearl%20Club_1673079019.jpg.webp?itok=f-G5FUpc') }}')] bg-gray-700 bg-blend-multiply">
        <div class="px-4 mx-auto max-w-screen-xl text-center py-24 lg:py-56">
            <h1 class="mb-4 text-4xl font-extrabold tracking-tight leading-none text-white md:text-5xl lg:text-6xl">
                CHÀO MỪNG ĐẾN VỚI SUNHOUSE
            </h1>
            <p class="mb-8 text-lg font-normal text-gray-300 lg:text-xl sm:px-16 lg:px-48">
                Trải nghiệm kỳ nghỉ tuyệt vời nhất dành cho bạn.
            </p>
            {{-- <div id="formbooknow" class="flex flex-col space-y-4 sm:flex-row sm:justify-center sm:space-y-0" > --}}
            <form method="post" action="{{ route('get.roomtypes') }}" id="formbooknow"
                class="flex flex-col space-y-4 sm:flex-row sm:justify-center sm:space-y-0 space-x-3 border-slate-300">
                @csrf

                <div class="flex flex-col space-y-4 sm:flex-row sm:justify-center sm:space-y-0 ">
                    <div id="date-range-picker" date-rangepicker class="">
                        <label for="checkin_date" class="block mb-2 text-sm font-medium text-slate-300">Ngày nhận
                            phòng</label>
                        <input type="date" name="checkin_date" id="checkin_date" value="{{ old('checkin_date') }}"
                            class="bg-gray-50 border border-gray-300 text-gray-900 text-sm rounded-lg focus:ring-blue-500 focus:border-blue-500 block w-full p-2.5">

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
            {{-- </div> --}}
        </div>
    </section>
    <div id="formbooknow" class="flex justify-between p-20">
        <img class="w-1/2 h-auto" src="{{ asset('image/gallery/gallery-1.jpg') }}" alt="" srcset="">

        {{-- <form method="post" action="{{ route('get.roomtypes') }}">
            @csrf
            <p class="text-center font-medium text-2xl pb-10">ĐẶT NGAY</p>

            <div class="py-3">
                <label for="checkin_date" class="block mb-2 text-sm font-medium text-gray-900">Chọn ngày</label>
                <div id="date-range-picker" date-rangepicker class="flex items-center">
                    <input type="date" name="checkin_date" id="checkin_date" value="{{ old('checkin_date') }}"
                        class="bg-gray-50 border border-gray-300 text-gray-900 text-sm rounded-lg focus:ring-blue-500 focus:border-blue-500 block w-full p-2.5">

                    <span class="mx-4 text-gray-500">Đến</span>

                    <input type="date" name="checkout_date" id="checkout_date" value="{{ old('checkout_date') }}"
                        class="bg-gray-50 border border-gray-300 text-gray-900 text-sm rounded-lg focus:ring-blue-500 focus:border-blue-500 block w-full p-2.5">
                </div>
                @error('checkin_date')
                    <p class="errors-message">{{ $message }}</p>
                @enderror
                @error('checkout_date')
                    <p class="errors-message">
                        {{ $message }}
                    </p>
                @enderror
            </div>

            <div class="py-3">
                <label for="guest_count" class="block mb-2 text-sm font-medium text-gray-900">Số khách</label>
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
        </form> --}}
    </div>
    <hr class="h-px my-8 bg-gray-200 border-0 dark:bg-gray-700">

    {{-- -----------------card------------------------------------------------------------------------ --}}
    <div id="cardroomtype" class="flex justify-center">
        <div class="max-w-sm bg-white border border-gray-200 rounded-lg shadow dark:bg-gray-800 dark:border-gray-700">
            <a href="#">
                <img class="rounded-t-lg"
                    src="https://cf.bstatic.com/xdata/images/hotel/max1024x768/184305239.jpg?k=2d22fe63ae1f8960e057238c98fb436f7bd9f65854e3a5e918607c5cfa1d0a52&o=&hp=1"
                    alt="" />
            </a>
            <div class="p-5">
                <a href="#">
                    <h5 class="mb-2 text-2xl font-bold tracking-tight text-gray-900 dark:text-white">Noteworthy technology
                        acquisitions 2021</h5>
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
    </div>
    <div class="h-96 bg-slate-500">

    </div>
@endsection
