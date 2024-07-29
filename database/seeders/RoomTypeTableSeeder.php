<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

class RoomTypeTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        //
        // DB::insert('insert into room_types (hotel_id, name, description, price, image_url) values (?, ?, ?, ?, ?)', [
        //     1, 'Luxury', 'Description Test', 300, 'https://www.tripsavvy.com/thmb/PBXPKYgTWnbYh6IBZ6FBu0RCi7c=/1500x0/filters:no_upscale():max_bytes(150000):strip_icc()/PMC_3922re2-7a204d0f28cc4d2abacf951df89d19d5.jpg'
        // ]);

        DB::table('room_types')->insert(
            [
                'hotel_id' => 1,
                'name' => 'Phòng Deluxe',
                'description' => 'Phòng deluxe với tiện nghi hiện đại và thoải mái.',
                'price' => 240,
                'image_url' => 'https://booking-static.vinpearl.com/room_types/216b0990ea2a44079494e7a994a24d61_Hinh-anh-VinHolidays-1-Phu-Quoc-Phong-Standard-Twin-3x2-so-2.png',
                'area' => 30.00,
                'beds' => '1 Giường King',
                'amenities' => 'Wi-Fi miễn phí, Điều hòa không khí, Minibar, TV màn hình phẳng',
                'created_at' => now(),
                'updated_at' => now(),
            ],
        );
        DB::table('room_types')->insert(
            [
                'hotel_id' => 1,
                'name' => 'Phòng Suite',
                'description' => 'Phòng suite sang trọng với không gian sống rộng rãi và tiện nghi cao cấp.',
                'price' => 500,
                'area' => 50.00,
                'beds' => '1 Giường King, 1 Sofa Bed',
                'amenities' => 'Wi-Fi miễn phí, Điều hòa không khí, Minibar, TV màn hình phẳng, Bếp nhỏ',
                'image_url' => 'https://booking-static.vinpearl.com/room_types/216b0990ea2a44079494e7a994a24d61_Hinh-anh-VinHolidays-1-Phu-Quoc-Phong-Standard-Twin-3x2-so-2.png',
                'created_at' => now(),
                'updated_at' => now(),
            ],
        );
        DB::table('room_types')->insert(
            [
                'hotel_id' => 1,
                'name' => 'Phòng Tiêu Chuẩn',
                'description' => 'Phòng tiêu chuẩn thoải mái với tiện nghi cơ bản.',
                'price' => 160,
                'area' => 20.00,
                'beds' => '1 Giường Queen',
                'amenities' => 'Wi-Fi miễn phí, Điều hòa không khí, TV màn hình phẳng',
                'image_url' => null,
                'created_at' => now(),
                'updated_at' => now(),
            ],
        );
        // DB::table('room_types')->insert(
        //     [
        //         'hotel_id' => 1,
        //         'name' => 'Phòng Gia Đình',
        //         'description' => 'Phòng gia đình rộng rãi, phù hợp cho kỳ nghỉ gia đình.',
        //         'price' => 300,
        //         'area' => 40.00,
        //         'beds' => '2 Giường Queen',
        //         'amenities' => 'Wi-Fi miễn phí, Điều hòa không khí, Minibar, TV màn hình phẳng, Giường phụ có sẵn',
        //         'image_url' => null,
        //         'created_at' => now(),
        //         'updated_at' => now(),
        //     ],
        // );
    }
}
