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
        DB::insert('insert into room_types (hotel_id, name, description, price, image_url) values (?, ?, ?, ?, ?)', [
            1, 'Luxury', 'Description Test', 300, 'https://www.tripsavvy.com/thmb/PBXPKYgTWnbYh6IBZ6FBu0RCi7c=/1500x0/filters:no_upscale():max_bytes(150000):strip_icc()/PMC_3922re2-7a204d0f28cc4d2abacf951df89d19d5.jpg']);

        DB::table('room_types')->insert([
            'hotel_id'=>1,
            'name'=>'Premium King Room',
            'description'=> 'Description Test',
            'price'=> 400,
            'image_url'=> 'https://booking-static.vinpearl.com/room_types/216b0990ea2a44079494e7a994a24d61_Hinh-anh-VinHolidays-1-Phu-Quoc-Phong-Standard-Twin-3x2-so-2.png'
        ]);
    }
}
