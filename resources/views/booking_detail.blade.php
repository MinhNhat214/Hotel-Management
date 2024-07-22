<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Booking-Detail</title>
</head>

<body>
    <div style="display:flex">
        <div>
            <form action="{{ route('qrpayment') }}" method="post">
                @csrf
                <div>
                    <label for="full_name">Họ và tên</label>
                    <input type="text" name="full_name" id="full_name" value="{{ Auth::user()->name }}">
                </div>
                <div>
                    <label for="email">Email nhận thông tin đơn hàng</label>
                    <input type="text" name="email" id="email" value="{{ Auth::user()->email }}">
                    {{-- <label for="phone_number">Điện thoại</label>
                    <input type="text" name="phone_number" id="phone_number"> --}}
                </div>
                {{-- <div><p>Vùng quốc gia</p></div> --}}
                <button type="submit">Thanh toán</button>
            </form>
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

                <p>Giá phòng/đêm</p>
                <p>{{ session('roomtype')['name'] }}</p>
                <br>

                <p>Số khách</p>
                <p>{{ session('guest_count') }}</p>
                <br>

                <p>Tổng cộng:</p>
                <p>{{ session('total_price') }}</p>
            </div>
        </div>
    </div>
</body>

</html>
