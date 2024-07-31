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
    <form class="container mx-auto px-60 pb-10" method="post" action="{{ route('admin.booking_add_submit') }}">
        @csrf
        <div class="grid gap-6 mb-6 md:grid-cols-2">
            <div>
                <label for="user_id" class="block mb-2 text-sm font-medium text-gray-900 dark:text-white">
                    Mã người dùng
                </label>
                <input type="number" id="user_id" name="user_id" class="input" placeholder="Mã người dùng" required
                    value="{{ old('user_id') }}" />
            </div>
            <div>
                <label for="room_id" class="block mb-2 text-sm font-medium text-gray-900 dark:text-white">Mã phòng</label>
                <input type="number" id="room_id" name="room_id"
                    class="input"
                    placeholder="Mã phòng" required value="{{ old('room_id') }}" />
            </div>
            <div>
                <label for="checkin_date" class="block mb-2 text-sm font-medium text-gray-900 dark:text-white">Từ
                    ngày</label>
                <input type="date" id="checkin_date" name="checkin_date"
                    class="input"
                    placeholder="Ngày đặt phòng" required value="{{ old('checkin_date') }}"/>
            </div>
            <div>
                <label for="checkout_date" class="block mb-2 text-sm font-medium text-gray-900 dark:text-white">Đến
                    ngày</label>
                <input type="date" id="checkout_date" name="checkout_date"
                    class="input"
                    placeholder="Ngày trả phòng" required checkin_date value="{{ old('checkout_date') }}" />
            </div>
            <div>
                <label for="guest_count" class="block mb-2 text-sm font-medium text-gray-900 dark:text-white">Số khách
                </label>
                <input type="number" id="guest_count" name="guest_count"
                    class="input"
                    placeholder="Số khách" required value="{{ old('guest_count') }}"/>
            </div>
            <div>
                <label for="total_price" class="block mb-2 text-sm font-medium text-gray-900 dark:text-white">Tổng tiền
                </label>
                <input type="number" id="total_price" name="total_price"
                    class="input"
                    placeholder="Tổng tiền" required value="{{ old('total_price') }}"/>
            </div>

            <div>
                <label for="status" class="block mb-2 text-sm font-medium text-gray-900 dark:text-white">Trạng thái
                </label>
                <select id="status" name="status"
                    class="input"
                    placeholder="" required>
                    <option value="0">Chưa thanh toán</option>
                    <option value="1">Đã thanh toán</option>
                </select>
            </div>

            <div class="errors-message text-red-500">
                @error('user_id')
                    <p>{{ $message }}</p>
                @enderror
                @error('room_id')
                    <p>{{ $message }}</p>
                @enderror
                @error('checkin_date')
                    <p>{{ $message }}</p>
                @enderror
                @error('checkout_date')
                    <p>{{ $message }}</p>
                @enderror
                @error('guest_count')
                    <p>{{ $message }}</p>
                @enderror
                @error('total_price')
                    <p>{{ $message }}</p>
                @enderror
                @error('status')
                    <p>{{ $message }}</p>
                @enderror
            </div>


        </div>
        <button type="submit"
            class="text-white bg-blue-700 hover:bg-blue-800 focus:ring-4 focus:ring-blue-300 font-medium rounded-lg text-sm px-5 py-2.5 me-2 mb-2 dark:bg-blue-600 dark:hover:bg-blue-700 focus:outline-none dark:focus:ring-blue-800">Lưu
            chỉnh sửa</button>
    </form>
@endsection
