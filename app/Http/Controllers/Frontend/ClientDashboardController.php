<?php

namespace App\Http\Controllers\Frontend;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use App\Models\Service; // Impor model Service
use App\Models\Payment; // Impor model Payment
use App\Models\User;

class ClientDashboardController extends Controller
{
    /**
     * Menampilkan halaman dashboard klien (riwayat booking).
     */
    public function index()
    {
        // Ambil data user yang sedang login
        $client = Auth::user();
        $bookings = $client->bookings()
                            ->with(['service', 'payment'])
                            ->latest()
                            ->paginate(10);

        return view('frontend.dashboard.index', compact('bookings'));
    }
}
