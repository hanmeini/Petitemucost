<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\Booking;
use App\Models\Payment;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Storage;
use App\Models\Notification;

class BookingController extends Controller
{
    /**
     * Menampilkan daftar semua booking, dengan filter dan sortir.
     */
    public function index(Request $request)
    {
        $query = Booking::with(['client', 'service', 'payment']);

        // 1. Terapkan filter status jika ada
        if ($request->has('status') && $request->status != '') {
            $query->where('status', $request->status);
        }

        // 2. Terapkan sortir default:
        $query->orderByRaw("
            CASE
                WHEN status = 'menunggu_konfirmasi' THEN 1
                WHEN status = 'menunggu_verifikasi_pembayaran' THEN 2
                ELSE 3
            END ASC
        ")
        ->latest();
        $bookings = $query->paginate(20)->withQueryString();

        return view('admin.bookings.index', [
            'bookings' => $bookings,
            'currentStatus' => $request->status
        ]);
    }

    /**
     * Menampilkan halaman detail untuk satu booking.
     */
    public function edit(Booking $booking)
    {
        // Muat relasi yang diperlukan untuk halaman detail
        $booking->load(['client', 'service', 'payment']);

        return view('admin.bookings.edit', compact('booking'));
    }

    /**
     * Memperbarui status booking berdasarkan aksi admin.
     */
    public function update(Request $request, Booking $booking)
    {
        // Validasi aksi yang diminta
        $request->validate([
            'action' => 'required|string|in:confirm,reject,verify_payment,mark_completed'
        ]);

        $action = $request->input('action');
        $message = 'Status booking berhasil diperbarui.';

        switch ($action) {
            // Aksi saat status 'menunggu_konfirmasi'
            case 'confirm':
                $booking->status = 'menunggu_pembayaran_dp';
                Notification::create([
                    'user_id' => $booking->client_id,
                    'message' => "Hore! Booking #{$booking->id} ({$booking->service->name}) telah dikonfirmasi!",
                    'url' => route('dashboard', ['tab' => 'pending']),]);
                break;

            case 'reject':
                $booking->status = 'dibatalkan';
                Notification::create([
                    'user_id' => $booking->client_id,
                    'message' => "Yah 😥 Booking #{$booking->id} ({$booking->service->name}) ditolak.",
                    'url' => route('dashboard', ['tab' => 'history']),
                ]);
                break;

            // Aksi saat status 'menunggu_verifikasi_pembayaran'
            case 'verify_payment':
                if ($booking->payment) {
                    $booking->payment->update(['verified_at' => now()]);
                    $booking->status = 'terkonfirmasi';
                    $message = 'Pembayaran berhasil diverifikasi.';
                    Notification::create([
                        'user_id' => $booking->client_id,
                        'message' => "Pembayaran DP untuk Booking #{$booking->id} telah diterima!",
                        'url' => route('dashboard', ['tab' => 'upcoming']),
                    ]);
                } else {
                    $message = 'Gagal, data pembayaran tidak ditemukan.';
                }
                break;

            // Aksi saat status 'terkonfirmasi'
            case 'mark_completed':
                $booking->status = 'selesai';
                Notification::create([
                    'user_id' => $booking->client_id,
                    'message' => "Booking #{$booking->id} telah selesai. Terima kasih! Yuk, beri ulasan...",
                    'url' => route('testimonial.create', $booking->id),
                ]);
                break;
        }

        $booking->save();

        return redirect()->route('admin.bookings.edit', $booking)->with('success', $message);
    }

    /**
     * Menghapus booking secara permanen.
     */
    public function destroy(Booking $booking)
    {
        if ($booking->payment) {
            Storage::disk('public')->delete($booking->payment->proof_of_payment);
            $booking->payment->delete();
        }
        if ($booking->testimonial) {
            $booking->testimonial->delete();
        }
        Notification::where('url', 'like', '%booking%'.$booking->id.'%')->delete();

        $booking->delete();

        return redirect()->route('admin.bookings.index')->with('success', 'Booking berhasil dihapus permanen.');
    }
}
