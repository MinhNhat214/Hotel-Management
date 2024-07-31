<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Hash;

class UserTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        //
        DB::table('users')->insert([
            'name'=>'minh nhat',
            'email'=>'nhattran200411@gmail.com',
            'password'=> Hash::make('admin')
        ]);
        DB::table('users')->insert([
            'name'=>'admin',
            'email'=>'admin@gmail.com',
            'user_type'=>'admin',
            'password'=> Hash::make('admin')
        ]);
        DB::table('users')->insert([
            'name'=>'ukulele',
            'email'=>'ukulele@gmail.com',
            'user_type'=>'123456789',
            'password'=> Hash::make('123456789')
        ]);
        DB::table('users')->insert([
            'name'=>'ahshia',
            'email'=>'ahshia@gmail.com',
            'user_type'=>'123456789',
            'password'=> Hash::make('123456789')
        ]);
        DB::table('users')->insert([
            'name'=>'sks10113',
            'email'=>'sks10113@gmail.com',
            'user_type'=>'123456789',
            'password'=> Hash::make('123456789')
        ]);
        DB::table('users')->insert([
            'name'=>'mnhat11',
            'email'=>'mnhat11@gmail.com',
            'user_type'=>'123456789',
            'password'=> Hash::make('123456789')
        ]);
    }
}
