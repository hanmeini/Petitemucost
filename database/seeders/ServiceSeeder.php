<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use App\Models\Service;

class ServiceSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        $services = [
            [
                'name' => 'Makeup Wedding',
                'slug' => 'makeup-wedding',
                'description' => 'Paket makeup lengkap untuk pengantin dengan hasil yang memukau dan tahan lama sepanjang hari.',
                'price' => 2500000,
                'dp_percentage' => 50,
                'duration_minutes' => 180,
            ],
            [
                'name' => 'Makeup Prewedding',
                'slug' => 'makeup-prewedding',
                'description' => 'Makeup untuk sesi foto prewedding dengan hasil natural dan elegan.',
                'price' => 1500000,
                'dp_percentage' => 50,
                'duration_minutes' => 120,
            ],
            [
                'name' => 'Makeup Party',
                'slug' => 'makeup-party',
                'description' => 'Makeup untuk acara pesta dengan gaya yang trendy dan glamour.',
                'price' => 800000,
                'dp_percentage' => 50,
                'duration_minutes' => 90,
            ],
            [
                'name' => 'Makeup Daily',
                'slug' => 'makeup-daily',
                'description' => 'Makeup sehari-hari dengan hasil natural dan fresh.',
                'price' => 500000,
                'dp_percentage' => 50,
                'duration_minutes' => 60,
            ],
        ];

        foreach ($services as $service) {
            Service::create($service);
        }
    }
}
