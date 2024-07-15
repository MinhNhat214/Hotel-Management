<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

class HotelTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        //
        DB::table('hotels')->insert([
            'name' => 'SUNHOUSE',
            'address' => '32 Nguyễn Bỉnh Khiêm, Phường 01, Gò Vấp, Hồ Chí Minh 70000, Việt Nam',
            'image_url' => 'https://lh5.googleusercontent.com/p/AF1QipOnqTX9uZjFj-Cwuz2ZetllFKzqDRmSGCXS_72c=w408-h306-k-no'
        ]);
    }
}
