<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\Booking;
use Illuminate\Http\Request;
use Carbon\Carbon;
use Illuminate\Support\Facades\DB;

class DashboardController extends Controller
{
    /**
     * Menampilkan halaman dashboard admin dengan data dinamis.
     */
    public function index()
    {
        // --- DATA UNTUK KARTU STATISTIK ---

        // 1. Menghitung jumlah booking baru yang menunggu konfirmasi
        $newBookingsCount = Booking::where('status', 'menunggu_konfirmasi')->count();

        // 2. Menghitung jumlah booking yang menunggu pembayaran (DP atau verifikasi)
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


        // --- DATA UNTUK TABEL BOOKING TERBARU ---
        $recentBookings = Booking::with(['client', 'service'])
                                 ->latest()
                                 ->take(5)
                                 ->get();


        // --- DATA UNTUK GRAFIK PENDAPATAN ---
        $dailyRevenue = Booking::query()
            ->whereHas('payment', fn($q) => $q->whereNotNull('verified_at'))
            ->whereBetween('created_at', [Carbon::now()->subDays(6), Carbon::now()])
            ->select(DB::raw('DATE(created_at) as date'), DB::raw('sum(dp_amount) as total'))
            ->groupBy('date')
            ->orderBy('date', 'ASC')
            ->pluck('total', 'date');

        $chartLabels = [];
        $chartData = [];
        for ($i = 6; $i >= 0; $i--) {
            $date = Carbon::now()->subDays($i);
            $dateString = $date->format('Y-m-d');

            $chartLabels[] = $date->translatedFormat('D, d');
            $chartData[] = $dailyRevenue[$dateString] ?? 0;
        }


        // Mengirim semua data yang dibutuhkan ke view
        return view('admin.dashboard', compact(
            'newBookingsCount',
            'pendingPaymentsCount',
            'confirmedBookingsCount',
            'totalRevenueMonth',
            'recentBookings',
            'chartLabels',
            'chartData'
        ));
    }
}

