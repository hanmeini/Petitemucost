<?php

namespace App\Http\Controllers\Frontend;

use App\Http\Controllers\Controller;
use App\Models\Booking;
use App\Models\Payment;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class PaymentController extends Controller
{
    /**
     * Menampilkan halaman form untuk mengunggah bukti pembayaran DP.
     */
    public function create(Booking $booking)
    {
        // Pastikan booking ini milik user yang sedang login
        if ($booking->client_id !== Auth::id()) {
            abort(403);
        }

        // Pastikan statusnya benar
        if ($booking->status !== 'menunggu_pembayaran_dp') {
            return redirect()->route('dashboard')->with('error', 'Booking ini tidak sedang menunggu pembayaran.');
        }

        return view('frontend.payments.create', compact('booking'));
    }

    /**
     * Menyimpan data bukti pembayaran DP.
     */
    public function store(Request $request, Booking $booking)
    {
        // Pastikan booking ini milik user yang sedang login
        if ($booking->client_id !== Auth::id()) {
            abort(403);
        }

        // 1. Validasi input
        $request->validate([
            'proof_of_payment' => 'required|image|mimes:jpeg,png,jpg,gif|max:2048',
        ]);

        // 2. Simpan file bukti transfer
        $path = $request->file('proof_of_payment')->store('payments/proofs', 'public');

        // 3. Buat record baru di tabel 'payments'
        Payment::create([
            'booking_id' => $booking->id,
            'amount' => $booking->dp_amount,
            'proof_of_payment' => $path,
            'payment_date' => now(),
        ]);

        // 4. Ubah status booking menjadi 'menunggu_verifikasi_pembayaran'
        $booking->status = 'menunggu_verifikasi_pembayaran';
        $booking->save();

        // 5. Arahkan kembali ke dashboard dengan pesan sukses
        return redirect()->route('dashboard')->with('success', 'Bukti pembayaran berhasil diunggah! Mohon tunggu verifikasi dari Admin.');
    }
}
