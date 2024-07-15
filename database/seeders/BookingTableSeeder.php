<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;
class BookingTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        //
        DB::table('bookings')->insert([
            'user_id' => 1,
            'room_id' => 1,
            'checkin_date' => '2024-7-20',
            'checkout_date' => '2024-7-25',
            'total_price' => 1500
        ]);
    }
}
