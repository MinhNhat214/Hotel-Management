<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

class RoomTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        //
        DB::table('rooms')->insert([
            'roomtype_id' => 1,
            'room_number' => 102,
        ]);
        DB::table('rooms')->insert([
            'roomtype_id' => 1,
            'room_number' => 103,
        ]);
    }
}
