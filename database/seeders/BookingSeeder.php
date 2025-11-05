<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use App\Models\Booking;
use App\Models\User;
use App\Models\Service;
use App\Models\Payment;
use Carbon\Carbon;

class BookingSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        // Ambil atau buat user client
        $clients = User::where('role', 'client')->get();
        if ($clients->isEmpty()) {
            // Jika tidak ada klien, buat 5 klien baru sebagai contoh
            $clients = User::factory(5)->create(['role' => 'client']);
        }

        // Ambil services yang sudah ada
        $services = Service::all();
        if ($services->isEmpty()) {
            $this->command->error('Tidak ada data service. Jalankan ServiceSeeder terlebih dahulu.');
            return;
        }

        // Hapus data lama untuk menghindari duplikasi saat seeding ulang
        Booking::query()->delete();
        Payment::query()->delete();

        // Buat 100 data booking acak selama 100 hari terakhir
        for ($i = 0; $i < 100; $i++) {
            $service = $services->random();
            $client = $clients->random();
            // Tanggal acak dari hari ini hingga 100 hari ke belakang
            $bookingDate = Carbon::now()->subDays(rand(0, 100));

            $statusOptions = ['menunggu_konfirmasi', 'menunggu_pembayaran_dp', 'terkonfirmasi', 'selesai', 'dibatalkan'];
            $status = $statusOptions[array_rand($statusOptions)];

            $booking = Booking::create([
                'client_id' => $client->id,
                'service_id' => $service->id,
                'booking_date' => $bookingDate,
                'booking_time' => rand(8, 17) . ':00:00',
                'location_address' => 'Lokasi Acak No. ' . rand(1, 100),
                'status' => $status,
                'dp_amount' => $service->price * ($service->dp_percentage / 100),
                'created_at' => $bookingDate->copy()->subHours(rand(1, 24)),
                'updated_at' => $bookingDate,
            ]);

            // Jika statusnya membutuhkan pembayaran, buat data payment
            if (in_array($status, ['menunggu_verifikasi_pembayaran', 'terkonfirmasi', 'selesai'])) {
                Payment::create([
                    'booking_id' => $booking->id,
                    'amount' => $booking->dp_amount,
                    'proof_of_payment' => 'payments/placeholder.jpg', // Path gambar dummy
                    'payment_date' => $bookingDate,
                    // Tandai sebagai terverifikasi jika statusnya 'terkonfirmasi' atau 'selesai'
                    'verified_at' => in_array($status, ['terkonfirmasi', 'selesai']) ? $bookingDate->copy()->addHour() : null,
                ]);
            }
        }
    }
}

