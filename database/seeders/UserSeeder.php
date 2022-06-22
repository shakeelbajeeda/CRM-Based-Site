<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
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
        \DB::table('users')->insert([
            'name' => 'Shakeel Ahmad',
            'email' => 'shakeelahmad@gmail.com',
            'password' => Hash::make('12345678'),
            'phone' => '123123123',
            'address' => 'Lahore',
            'role' => 'admin'
        ]);
    }
}
