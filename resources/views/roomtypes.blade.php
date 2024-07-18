<!DOCTYPE html>
<html>
<head>
    <title>Chọn loại phòng - Sunhouse Hotel</title>
</head>
<body>
    <h2>Thông tin đặt phòng</h2>
    <p>Từ ngày: {{ session('checkin_date') }}</p>
    <p>Đến ngày: {{ session('checkout_date') }}</p>
    <p>Số khách: {{ session('guest_count') }}</p>

    <h2>Chọn loại phòng</h2>
    <form action="" method="POST">
        @csrf
        <input type="hidden" name="checkin_date" value="{{ session('checkin_date') }}">
        <input type="hidden" name="checkout_date" value="{{ session('checkout_date') }}">
        <input type="hidden" name="guest_count" value="{{ session('guest_count') }}">

        {{-- @foreach ($roomtypes as $roomtype)
            <div>
                <input type="radio" id="room_type_{{ $roomtype->id }}" name="room_type" value="{{ $roomtype->id }}" required>
                <label for="room_type_{{ $roomtype->id }}">{{ $roomtype->name }}</label>
            </div>
        @endforeach --}}

        <button type="submit">Xác nhận đặt phòng</button>
    </form>
</body>
</html>
