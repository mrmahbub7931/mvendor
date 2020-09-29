<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Hash;

class UserSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        DB::table('users')->insert([
            'name'  =>  'Mahbubar Rahman',
            'number'  =>  '01823456789',
            'email'  =>  'redhatmahbub@gmail.com',
            'password'  =>  Hash::make('123456'),
            'role'  =>  'admin'
        ]);
        
        DB::table('users')->insert([
            'name'  =>  'Manager Shaheb',
            'number'  =>  '0182098789',
            'email'  =>  'manager@gmail.com',
            'password'  =>  Hash::make('123456'),
            'role'  =>  'manager'
        ]);

        DB::table('users')->insert([
            'name'  =>  'Guest User',
            'number'  =>  '01827896789',
            'email'  =>  'user@gmail.com',
            'password'  =>  Hash::make('123456'),
            'role'  =>  'demo'
        ]);

    }
}
