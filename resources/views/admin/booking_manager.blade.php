<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Document</title>
    <script src="https://cdn.tailwindcss.com"></script>
</head>

<body>
    <div class="relative overflow-x-auto shadow-md sm:rounded-lg">
        <table class="w-full text-sm text-left rtl:text-right text-gray-500 dark:text-gray-400">
            <thead class="text-xs text-gray-700 uppercase bg-gray-50 dark:bg-gray-700 dark:text-gray-400">
                <tr>
                    <th scope="col" class="py-3">
                        STT
                    </th>
                    <th scope="col" class="py-3">
                        Mã người dùng
                    </th>
                    <th scope="col" class="py-3">
                        Mã phòng
                    </th>
                    <th scope="col" class="py-3">
                        Từ ngày
                    </th>
                    <th scope="col" class="py-3">
                        Đến ngày
                    </th>
                    <th scope="col" class="py-3">
                        Số khách
                    </th>
                    <th scope="col" class="py-3">
                        Tổng tiền
                    </th>

                    <th scope="col" class="py-3">
                        Trạng thái
                    </th>
                    <th scope="col" class="py-3">
                        Ngày nhập hóa đơn
                    </th>
                    <th scope="col" class="py-3">
                        Chỉnh sửa gần nhất
                    </th>
                </tr>
            </thead>
            <tbody>
                @foreach ($bookings as $booking)
                    <tr
                        class="bg-white border-b dark:bg-gray-800 dark:border-gray-700 hover:bg-gray-50 dark:hover:bg-gray-600">
                        <td>{{ $booking['id'] }}</td>
                        <td>{{ $booking['user_id'] }}</td>
                        <td>{{ $booking['room_id'] }}</td>
                        <td>{{ $booking['checkin_date'] }}</td>
                        <td>{{ $booking['checkout_date'] }}</td>
                        <td>{{ $booking['guest_count'] }}</td>
                        <td>{{ $booking['total_price'] }}</td>
                        <td>{{ $booking['status'] }}</td>
                        <td>{{ $booking['created_at'] }}</td>
                        <td>{{ $booking['updated_at'] }}</td>
                        <td>
                            <form action="{{route('')}}" method="post">
                                <input type="hidden" name="booking_id" value="{{$booking['id']}}">
                                <button type="submit"
                                    class="focus:outline-none text-white bg-yellow-400 hover:bg-yellow-500 focus:ring-4 focus:ring-yellow-300 font-medium rounded-lg text-sm px-5 py-2.5 me-2 mb-2 dark:focus:ring-yellow-900">
                                    Chỉnh sửa
                                </button>
                            </form>
                        </td>
                    </tr>
                @endforeach
            </tbody>
        </table>
    </div>

</body>

</html>
