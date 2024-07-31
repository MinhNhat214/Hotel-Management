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
    <div class="py-11">
        <div>
            <a href="{{ route('admin.booking_add') }}" class="btn-primary">Thêm hóa đơn</a>
        </div>
        <div class="relative overflow-x-auto shadow-md sm:rounded-lg mt-5">
            <table class="w-full text-sm text-left rtl:text-right text-gray-500 dark:text-gray-400">
                <thead class="text-xs text-gray-700 uppercase bg-gray-50 dark:bg-gray-700 dark:text-gray-400 text-center">
                    <tr>
                        <th scope="col" class="py-3">
                            Mã hóa đơn
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
                            <td class="table-value text-center">{{ $booking['id'] }}</td>
                            <td class="table-value text-center">{{ $booking['user_id'] }}</td>
                            <td class="table-value text-center">{{ $booking['room_id'] }}</td>
                            <td class="table-value text-center">{{ $booking['checkin_date'] }}</td>
                            <td class="table-value text-center">{{ $booking['checkout_date'] }}</td>
                            <td class="table-value text-center">{{ $booking['guest_count'] }}</td>
                            <td class="table-value text-center">{{ $booking['total_price'] }}</td>
                            <td class="table-value text-center">
                                @if ($booking['status'] == 'Đã thanh toán')
                                    <p style="color:rgb(52, 182, 26);"> {{ $booking['status'] }} </p>
                                @elseif ($booking['status'] == 'Chưa thanh toán')
                                    <p style="color:rgb(235, 42, 42);"> {{ $booking['status'] }} </p>
                                @endif
                            </td>
                            <td class="table-value text-center">{{ $booking['created_at'] }}</td>
                            <td class="table-value text-center">{{ $booking['updated_at'] }}</td>
                            <td>
                                <a href="{{ route('admin.booking_edit', $booking['id']) }}"
                                    style="background-color: rgb(86, 86, 252); color: white; padding:4px 10px; border-radius:5px">
                                    Chỉnh sửa
                                </a>
                            </td>
                            <td>
                                <form action="{{ route('admin.booking_delete_submit', $booking['id']) }}" method="post">
                                    @csrf
                                    <input type="hidden" name="booking_id" value="{{ $booking['id'] }}">
                                    <button type="submit" class="btn-delete">
                                        <i class="fa-solid fa-x"></i>
                                    </button>
                                </form>
                            </td>
                        </tr>
                    @endforeach
                </tbody>
            </table>
            <div class="py-5 px-5">
                {{ $bookings->links() }}
            </div>
        </div>
    </div>
@endsection
