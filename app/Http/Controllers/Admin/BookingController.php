<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\Booking;
use App\Models\Payment;
use Illuminate\Http\Request; // <-- TAMBAHKAN INI
use Illuminate\Support\Facades\Storage;

class BookingController extends Controller
{
    /**
     * Menampilkan daftar semua booking, dengan filter dan sortir.
     */
    public function index(Request $request) // <-- TAMBAHKAN Request $request
    {
        // Mulai query
        $query = Booking::with(['client', 'service', 'payment']);

        // 1. Terapkan filter status jika ada
        if ($request->has('status') && $request->status != '') {
            $query->where('status', $request->status);
        }

        // 2. Terapkan sortir default:
        // Urutkan berdasarkan "menunggu_konfirmasi" dulu,
        // lalu "menunggu_verifikasi_pembayaran",
        // baru sisanya diurutkan berdasarkan yang terbaru.
        $query->orderByRaw("
            CASE
                WHEN status = 'menunggu_konfirmasi' THEN 1
                WHEN status = 'menunggu_verifikasi_pembayaran' THEN 2
                ELSE 3
            END ASC
        ")
        ->latest(); // latest() = orderBy('created_at', 'DESC')

        // Ambil data dengan paginasi
        // withQueryString() penting agar filter tetap ada saat pindah halaman
        $bookings = $query->paginate(15)->withQueryString();

        return view('admin.bookings.index', [
            'bookings' => $bookings,
            'currentStatus' => $request->status // Kirim status filter ke view
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
                // TODO: Kirim notifikasi ke klien
                break;

            case 'reject':
                $booking->status = 'dibatalkan';
                // TODO: Kirim notifikasi ke klien
                break;

            // Aksi saat status 'menunggu_verifikasi_pembayaran'
            case 'verify_payment':
                if ($booking->payment) {
                    $booking->payment->update(['verified_at' => now()]);
                    $booking->status = 'terkonfirmasi';
                    $message = 'Pembayaran berhasil diverifikasi.';
                } else {
                    $message = 'Gagal, data pembayaran tidak ditemukan.';
                }
                break;

            // Aksi saat status 'terkonfirmasi'
            case 'mark_completed':
                $booking->status = 'selesai';
                // TODO: Aktifkan fitur testimoni untuk klien
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
        // Hapus pembayaran terkait jika ada
        if ($booking->payment) {
            Storage::disk('public')->delete($booking->payment->proof_of_payment);
            $booking->payment->delete();
        }
        $booking->delete();

        return redirect()->route('bookings.index')->with('success', 'Booking berhasil dihapus permanen.');
    }
}
