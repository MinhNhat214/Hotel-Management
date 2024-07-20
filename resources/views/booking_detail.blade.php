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
            <form action="" method="post">
                @csrf
                <div>
                    <label for="first_name">Họ</label>
                    <input type="text" name="first_name" id="first_name">
                    <label for="last_name">Tên đệm và tên</label>
                    <input type="text" name="last_name" id="last_name">
                </div>
                <div>
                    <label for="email">Email nhận thông tin đơn hàng</label>
                    <input type="text" name="email" id="email">
                    <label for="phone_number">Điện thoại</label>
                    <input type="text" name="phone_number" id="phone_number">
                </div>
                {{-- <div><p>Vùng quốc gia</p></div> --}}
                <button type="submit">Thanh toán</button>
            </form>
        </div>
        <div>
            <p>Thông tin thanh toán</p>
            <div>
                <p>Từ ngày</p>
                <p>{{ $data['checkin_date'] }}</p>
                <br>

                <p>Đến ngày</p>
                <p>{{$data['checkout_date']}}</p>
                <br>

                <p>Số ngày ở lại</p>
                <p>{{$data['count_date']}}</p>
                <br>

                <p>Dạng phòng</p>
                <p>{{$roomtypes['name']}}</p>
                <br>

                <p>Giá phòng/đêm</p>
                <p>{{$roomtypes['price']}}</p>
                <br>

                <p>Số khách</p>
                <p>{{$data['guest_count']}}</p>
                <br>

                <p>Tổng cộng:</p>
                <p>{{$data['total_price']}}</p>
            </div>
        </div>
    </div>
</body>

</html>
