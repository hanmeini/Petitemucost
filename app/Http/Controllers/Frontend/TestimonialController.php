<?php

    namespace App\Http\Controllers\Frontend;

    use App\Http\Controllers\Controller;
    use App\Models\Booking;
    use App\Models\Testimonial;
    use Illuminate\Http\Request;
    use Illuminate\Support\Facades\Auth;

    class TestimonialController extends Controller
    {
        /**
         * Menampilkan form untuk menulis testimoni.
         */
        public function create(Booking $booking)
        {
            // Cek keamanan: Pastikan booking ini milik user yang login
            if ($booking->client_id !== Auth::id()) {
                abort(403, 'Akses ditolak');
            }

            // Cek keamanan: Pastikan statusnya 'selesai'
            if ($booking->status !== 'selesai') {
                return redirect()->route('dashboard')->with('error', 'Booking ini belum selesai.');
            }

            // Cek keamanan: Pastikan belum pernah memberi ulasan
            if ($booking->testimonial()->exists()) {
                return redirect()->route('dashboard')->with('error', 'Anda sudah memberi ulasan untuk booking ini.');
            }

            return view('frontend.testimonial.create', compact('booking'));
        }

        /**
         * Menyimpan testimoni baru ke database.
         */
        public function store(Request $request, Booking $booking)
        {
            // Cek keamanan
            if ($booking->client_id !== Auth::id() || $booking->status !== 'selesai' || $booking->testimonial()->exists()) {
                abort(403, 'Aksi tidak diizinkan');
            }

            // Validasi input
            $request->validate([
                'rating' => 'required|integer|min:1|max:5',
                'comment' => 'required|string|max:1000',
            ]);

            // Simpan testimoni
            Testimonial::create([
                'booking_id' => $booking->id,
                'rating' => $request->rating,
                'comment' => $request->comment,
                'is_featured' => false, // Admin yang akan menentukan ini nanti
            ]);

            return redirect()->route('dashboard')->with('success', 'Terima kasih atas ulasan Anda!');
        }
    }
