<?php

namespace App\Http\Controllers\Frontend;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request; // <-- Tambahkan Request
use Illuminate\Support\Facades\Auth;

class ClientDashboardController extends Controller
{
    /**
     * Menampilkan halaman dashboard klien (riwayat booking) dengan filter tab.
     */
    public function index(Request $request)
    {
        // 1. Tentukan tab yang aktif. Defaultnya 'upcoming' (Terkonfirmasi)
        $activeTab = $request->query('tab', 'upcoming');

        // 2. Ambil data user yang sedang login
        $client = Auth::user();

        // 3. Siapkan query dasar
        $query = $client->bookings()->with(['service', 'payment'])->latest();

        // 4. Terapkan filter berdasarkan tab yang aktif
        switch ($activeTab) {
            case 'pending':
                // Pending = Menunggu konfirmasi ATAU menunggu pembayaran/verifikasi
                $query->whereIn('status', [
                    'menunggu_konfirmasi', 
                    'menunggu_pembayaran_dp', 
                    'menunggu_verifikasi_pembayaran'
                ]);
                break;
            case 'history':
                // History = Yang sudah selesai ATAU dibatalkan
                $query->whereIn('status', ['selesai', 'dibatalkan']);
                break;
            case 'upcoming':
            default:
                // Upcoming = Yang sudah terkonfirmasi dan siap dijalankan
                $query->where('status', 'terkonfirmasi');
                break;
            case 'all':
                // Semua booking, tidak perlu filter tambahan
                break;  
        }

        // 5. Ambil data (10 per halaman)
        $bookings = $query->paginate(10)->withQueryString();

        // 6. Kirim data ke view
        return view('frontend.dashboard.index', compact('bookings', 'activeTab'));
    }
}