<?php

namespace Database\Seeders;

use App\Models\Booking;
use App\Models\User;
// use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

class DatabaseSeeder extends Seeder
{
    /**
     * Seed the application's database.
     */
    public function run(): void
    {
        $this->call([
            UserTableSeeder::class,
            HotelTableSeeder::class,
            RoomTypeTableSeeder::class,
            RoomTableSeeder::class,
            BookingTableSeeder::class,
        ]);

        Booking::factory()->count(40)->create();

    }
}
