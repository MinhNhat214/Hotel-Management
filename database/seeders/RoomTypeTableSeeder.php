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
                'image_url' => 'https://assets.graydientcreative.com/files/outlets/platinum/images/Solitaire%20Suite%20Double%20Beds.jpg',
                'created_at' => now(),
                'updated_at' => now(),
            ],
        );
    }
}
