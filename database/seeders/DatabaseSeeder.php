<?php

namespace Database\Seeders;

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
        // Memanggil setiap seeder secara berurutan
        $this->call([
            UserSeeder::class,
            ServiceSeeder::class,
            // PortfolioSeeder::class,
            BookingSeeder::class, // Memanggil seeder untuk data booking
        ]);
    }
}

