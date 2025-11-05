<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\Booking;
use Illuminate\Http\Request;
use Carbon\Carbon;
use Illuminate\Support\Facades\DB;

class DashboardController extends Controller
{
    public function index(Request $request)
    {
        // --- DATA UNTUK KARTU STATISTIK (Tetap sama) ---
        $newBookingsCount = Booking::where('status', 'menunggu_konfirmasi')->count();
        $pendingPaymentsCount = Booking::whereIn('status', ['menunggu_pembayaran_dp', 'menunggu_verifikasi_pembayaran'])->count();
        $confirmedBookingsCount = Booking::where('status', 'terkonfirmasi')->whereMonth('booking_date', Carbon::now()->month)->count();
        $totalRevenueMonth = Booking::whereHas('payment', fn($q) => $q->whereNotNull('verified_at'))->whereMonth('booking_date', Carbon::now()->month)->sum('dp_amount');
        $recentBookings = Booking::with(['client', 'service'])->latest()->take(5)->get();

        // --- LOGIKA DINAMIS UNTUK GRAFIK ---
        $range = $request->query('range', '7'); // Default 7 hari jika tidak ada parameter
        $chartLabels = [];
        $chartData = [];

        $query = Booking::query()
            ->whereHas('payment', fn($q) => $q->whereNotNull('verified_at'))
            ->select(DB::raw('DATE(created_at) as date'), DB::raw('sum(dp_amount) as total'))
            ->groupBy('date')
            ->orderBy('date', 'ASC');

        switch ($range) {
            case '30':
                $startDate = Carbon::now()->subDays(29);
                $endDate = Carbon::now();
                $query->whereBetween('created_at', [$startDate, $endDate]);
                $dailyRevenue = $query->pluck('total', 'date');
                for ($date = $startDate; $date->lte($endDate); $date->addDay()) {
                    $chartLabels[] = $date->translatedFormat('d M');
                    $chartData[] = $dailyRevenue[$date->format('Y-m-d')] ?? 0;
                }
                break;

            case '90': // Mengganti 'month' menjadi '90'
                $startDate = Carbon::now()->subDays(89);
                $endDate = Carbon::now();
                $query->whereBetween('created_at', [$startDate, $endDate]);
                $dailyRevenue = $query->pluck('total', 'date');
                for ($date = $startDate; $date->lte($endDate); $date->addDay()) {
                    $chartLabels[] = $date->translatedFormat('d M');
                    $chartData[] = $dailyRevenue[$date->format('Y-m-d')] ?? 0;
                }
                break;

            default: // Case '7'
                $startDate = Carbon::now()->subDays(6);
                $endDate = Carbon::now();
                $query->whereBetween('created_at', [$startDate, $endDate]);
                $dailyRevenue = $query->pluck('total', 'date');
                for ($date = $startDate; $date->lte($endDate); $date->addDay()) {
                    $chartLabels[] = $date->translatedFormat('D, d');
                    $chartData[] = $dailyRevenue[$date->format('Y-m-d')] ?? 0;
                }
                break;
        }

        return view('admin.dashboard', compact(
            'newBookingsCount', 'pendingPaymentsCount', 'confirmedBookingsCount', 'totalRevenueMonth', 'recentBookings',
            'chartLabels', 'chartData', 'range'
        ));
    }
}
