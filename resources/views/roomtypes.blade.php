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
    <form action="{{ route('get.booking') }}" method="post" class="flex justify-around">
        @csrf
        <div class="flex flex-col space-y-4">
            @foreach ($roomtypes as $roomtype)
                <label for="roomtype_{{ $roomtype->id }}" class="relative block cursor-pointer bg-white">
                    <input type="radio" name="roomtype_id" id="roomtype_{{ $roomtype->id }}" required
                        value="{{ $roomtype->id }}" class="peer sr-only">
                    <div
                        class="p-4 border-2 border-gray-300 peer-checked:border-blue-500 peer-checked:bg-blue-50 rounded-lg transition-colors">
                        <img class="w-32 h-32 object-cover py-3" src="{{ $roomtype->image_url }}" alt=""
                            srcset="">
                        <p class="text-lg font-semibold">{{ $roomtype->name }}</p>
                        <p class="">{{ $roomtype->description }}</p>
                    </div>
                </label>
            @endforeach
            @error('rooms')
                <p>{{ $message }}</p>
            @enderror
        </div>

        <div>
            <div class="max-w-sm bg-white border border-gray-200 rounded-lg shadow">

                <div class="p-5">
                    <p class="mb-2 text-2xl font-bold tracking-tight text-gray-900">
                        Chuyến đi đến SUNHOUSE</p>

                    <img style="border-radius: 5px;" class="py-3"
                        src="https://www.usatoday.com/gcdn/-mm-/05b227ad5b8ad4e9dcb53af4f31d7fbdb7fa901b/c=0-64-2119-1259/local/-/media/USATODAY/USATODAY/2014/08/13/1407953244000-177513283.jpg"
                        alt="" srcset="">

                    <p class="mb-3 font-normal text-gray-700">
                        Từ ngày: {{ session('checkin_date') }}
                    </p>
                    <p class="mb-3 font-normal text-gray-700">
                        Đến ngày: {{ session('checkout_date') }}
                    </p>
                    <p class="mb-3 font-normal text-gray-700">
                        Số khách: {{ session('guest_count') }}
                    </p>
                    <button type="submit"
                        class="focus:outline-none text-white bg-purple-700 hover:bg-purple-800 focus:ring-4 focus:ring-purple-300 font-medium rounded-lg text-sm px-5 py-2.5 mb-2 flex items-center">
                        Xác nhận đặt phòng

                        <svg class="rtl:rotate-180 w-3.5 h-3.5 ms-2" aria-hidden="true" xmlns="http://www.w3.org/2000/svg"
                            fill="none" viewBox="0 0 14 10">
                            <path stroke="currentColor" stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                                d="M1 5h12m0 0L9 1m4 4L9 9" />
                        </svg>
                    </button>
                </div>
            </div>

            {{-- <form action="{{ route('get.booking') }}" method="post"> --}}


            {{-- @foreach ($roomtypes as $roomtype)
                <div>
                    <input type="radio" name="roomtype_id" id="roomtype_{{ $roomtype->id }}" required
                        value="{{ $roomtype->id }}">
                    <label for="roomtype_{{ $roomtype->id }}">
                        {{ $roomtype->name }}
                    </label>
                </div>
            @endforeach --}}


            {{-- </div> --}}
        </div>
    </form>
@endsection
