<?php

namespace Database\Seeders;

use App\Models\User;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\Hash;

class UserTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        User::create([

            'fname' => 'admin',
            'lname' => 'admin',
            'email' => 'admin@gmail.com',
            'password' => Hash::make('admin123'),
            'user_role' => 'admin',
            'phone' => '03122545987',
            'address' => 'abc',
            'status' => 'active',
        ]);
        User::create([
            'fname' => 'user',
            'lname' => 'user',
            'email' => 'user@gmail.com',
            'password' => Hash::make('user123'),
            'user_role' => 'user',
            'phone' => '03122545977',
            'address' => 'abc',
            'status' => 'active',
        ]);
       

    }
}
