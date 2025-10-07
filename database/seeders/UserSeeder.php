<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use App\Models\User;
use Illuminate\Support\Facades\Hash;

class UserSeeder extends Seeder
{
    public function run(): void
    {
        User::create([
            'name' => 'Admin MUA',
            'email' => 'admin@mua.com',
            'password' => Hash::make('password'),
            'role' => 'admin',
            'phone_number' => '081234567890'
        ]);

        User::create([
            'name' => 'Klien Satu',
            'email' => 'klien@gmail.com',
            'password' => Hash::make('password'),
            'role' => 'client',
            'phone_number' => '089876543210'
        ]);
    }
}
