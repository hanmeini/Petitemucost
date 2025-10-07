<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\Booking;
use Illuminate\Http\Request;
use Carbon\Carbon;

class DashboardController extends Controller
{
    /**
     * Menampilkan halaman dashboard admin dengan data dinamis.
     */
    public function index()
    {
        // 1. Menghitung jumlah booking baru yang menunggu konfirmasi
        $newBookingsCount = Booking::where('status', 'menunggu_konfirmasi')->count();

        // 2. Menghitung jumlah booking yang menunggu pembayaran
        $pendingPaymentsCount = Booking::whereIn('status', ['menunggu_pembayaran_dp', 'menunggu_verifikasi_pembayaran'])->count();

        // 3. Menghitung jumlah jadwal terkonfirmasi bulan ini
        $confirmedBookingsCount = Booking::where('status', 'terkonfirmasi')
                                       ->whereMonth('booking_date', Carbon::now()->month)
                                       ->whereYear('booking_date', Carbon::now()->year)
                                       ->count();

        // 4. Menghitung total pendapatan DP bulan ini yang sudah terverifikasi
        $totalRevenueMonth = Booking::whereHas('payment', function ($query) {
                                            $query->whereNotNull('verified_at');
                                        })
                                       ->whereMonth('booking_date', Carbon::now()->month)
                                       ->whereYear('booking_date', Carbon::now()->year)
                                       ->sum('dp_amount');


        // 5. Mengambil 5 booking terbaru untuk ditampilkan di tabel
        $recentBookings = Booking::with(['client', 'service'])
                                 ->latest()
                                 ->take(5)
                                 ->get();

        // Mengirim semua data yang dibutuhkan ke view
        return view('admin.dashboard', compact(
            'newBookingsCount',
            'pendingPaymentsCount',
            'confirmedBookingsCount',
            'totalRevenueMonth',
            'recentBookings'
        ));
    }
}

