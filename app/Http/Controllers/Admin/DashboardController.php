<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\Booking;
use App\Models\User;
use Illuminate\Http\Request;
use Carbon\Carbon;
use Illuminate\Support\Facades\DB;

class DashboardController extends Controller
{
    public function index(Request $request)
    {
        // --- 1. DATA KARTU STATISTIK (Global) ---
        $totalBooking = Booking::count();
        $confirmedCount = Booking::where('status', 'terkonfirmasi')->count();
        $clientCount = User::where('role', 'client')->count();

        // Total Pendapatan (Semua waktu)
        $totalRevenue = Booking::whereHas('payment', fn($q) => $q->whereNotNull('verified_at'))
                                ->sum('dp_amount');

        // --- 2. DATA GRAFIK STATUS (Donut Chart) ---
        $pending = Booking::whereIn('status', ['menunggu_konfirmasi', 'menunggu_pembayaran_dp', 'menunggu_verifikasi_pembayaran'])->count();
        $active = Booking::where('status', 'terkonfirmasi')->count();
        $rejected = Booking::where('status', 'dibatalkan')->count();
        $finished = Booking::where('status', 'selesai')->count();

        $dataStatus = [$pending, $active, $rejected, $finished];
        $labelStatus = ['Pending', 'Terkonfirmasi', 'Dibatalkan', 'Selesai'];

        // --- 3. DATA GRAFIK PENDAPATAN (Line Chart dengan Filter) ---

        // Ambil range dari URL, default ke '7' hari
        $range = $request->query('range', '7');

        $days = match($range) {
            '30' => 30,
            '90' => 90,
            default => 7,
        };

        // Hitung tanggal mulai (H-Sekian hari)
        $startDate = Carbon::now()->subDays($days - 1)->startOfDay();
        $endDate = Carbon::now()->endOfDay();

        // Ambil data pendapatan per hari dari database
        $dailyRevenue = Booking::query()
            ->whereHas('payment', fn($q) => $q->whereNotNull('verified_at'))
            ->whereBetween('created_at', [$startDate, $endDate])
            ->select(
                DB::raw('DATE(created_at) as date'),
                DB::raw('sum(dp_amount) as total')
            )
            ->groupBy('date')
            ->pluck('total', 'date');

        // Siapkan array untuk Chart.js
        $chartPendapatanValues = [];
        $chartLabels = [];

        // Loop dari tanggal mulai sampai hari ini (agar tanggal yang 0 tetap muncul)
        for ($i = $days - 1; $i >= 0; $i--) {
            $date = Carbon::now()->subDays($i);
            $dateString = $date->format('Y-m-d');

            // Format Label: "12 Nov"
            $chartLabels[] = $date->translatedFormat('d M');

            // Isi Data: Ambil dari query, kalau tidak ada isi 0
            $chartPendapatanValues[] = $dailyRevenue[$dateString] ?? 0;
        }

        return view('admin.dashboard', compact(
            'totalBooking',
            'confirmedCount',
            'clientCount',
            'totalRevenue',
            'chartPendapatanValues',
            'chartLabels',
            'dataStatus',
            'labelStatus',
            'range'
        ));
    }
}
