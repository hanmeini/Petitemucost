<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use App\Models\Booking;
use App\Models\User;
use App\Models\Service;
use Carbon\Carbon;

class BookingSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        // Buat atau ambil user client untuk testing
        $client1 = User::firstOrCreate(
            ['email' => 'sarah@example.com'],
            [
                'name' => 'Sarah Johnson',
                'password' => bcrypt('password'),
                'role' => 'client',
            ]
        );

        $client2 = User::firstOrCreate(
            ['email' => 'maria@example.com'],
            [
                'name' => 'Maria Garcia',
                'password' => bcrypt('password'),
                'role' => 'client',
            ]
        );

        $client3 = User::firstOrCreate(
            ['email' => 'lisa@example.com'],
            [
                'name' => 'Lisa Chen',
                'password' => bcrypt('password'),
                'role' => 'client',
            ]
        );

        // Ambil services yang sudah ada
        $services = Service::all();

        if ($services->count() < 4) {
            $this->command->info('Tidak cukup services untuk membuat booking. Jalankan ServiceSeeder terlebih dahulu.');
            return;
        }

        // Buat booking dengan status berbeda
        $bookings = [
            [
                'client_id' => $client1->id,
                'service_id' => $services[0]->id, // Makeup Wedding
                'booking_date' => Carbon::now()->addDays(7),
                'booking_time' => '09:00:00',
                'location_address' => 'Hotel Grand Ballroom, Jl. Sudirman No. 123, Jakarta',
                'notes' => 'Makeup untuk pengantin dengan tema vintage',
                'status' => 'menunggu konfirmasi',
                'dp_amount' => $services[0]->price * 0.5,
            ],
            [
                'client_id' => $client2->id,
                'service_id' => $services[1]->id, // Makeup Prewedding
                'booking_date' => Carbon::now()->addDays(3),
                'booking_time' => '14:00:00',
                'location_address' => 'Studio Foto Elegant, Jl. Kemang Raya No. 45, Jakarta',
                'notes' => 'Sesi foto prewedding outdoor',
                'status' => 'menunggu pembayaran dp',
                'dp_amount' => $services[1]->price * 0.5,
            ],
            [
                'client_id' => $client3->id,
                'service_id' => $services[2]->id, // Makeup Party
                'booking_date' => Carbon::now()->addDays(1),
                'booking_time' => '19:00:00',
                'location_address' => 'Rumah Klien, Jl. Pondok Indah No. 78, Jakarta',
                'notes' => 'Makeup untuk acara birthday party',
                'status' => 'terkonfirmasi',
                'dp_amount' => $services[2]->price * 0.5,
            ],
            [
                'client_id' => $client1->id,
                'service_id' => $services[3]->id, // Makeup Daily
                'booking_date' => Carbon::now()->subDays(2),
                'booking_time' => '10:00:00',
                'location_address' => 'Kantor Klien, Jl. Thamrin No. 12, Jakarta',
                'notes' => 'Makeup untuk meeting penting',
                'status' => 'selesai',
                'dp_amount' => $services[3]->price * 0.5,
            ],
        ];

        foreach ($bookings as $booking) {
            Booking::create($booking);
        }
    }
}
