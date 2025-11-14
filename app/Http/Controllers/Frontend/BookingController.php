<?php

namespace App\Http\Controllers\Frontend;

use App\Http\Controllers\Controller;
use App\Models\Booking;
use App\Models\Service;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Carbon\Carbon;
use Carbon\CarbonPeriod;

class BookingController extends Controller
{
    /**
     * Menampilkan form booking dan mengecek ketersediaan.
     */
    public function create(Request $request, Service $service)
    {
        $availableSlots = null;
        $selectedDate = null;

        // Mode POST (Ketika Klien memilih tanggal dan menekan "Cek Ketersediaan")
        if ($request->isMethod('post')) {

            $request->validate([
                'booking_date' => 'required|date|after_or_equal:today'
            ], [
                'booking_date.after_or_equal' => 'Tanggal booking tidak boleh di masa lalu.'
            ]);

            $selectedDate = Carbon::parse($request->booking_date);

            // Panggil fungsi pengecekan ketersediaan
            $availableSlots = $this->getAvailableSlots($selectedDate, $service->duration_minutes);

            return view('frontend.bookings.create', [
                'service' => $service,
                'availableSlots' => $availableSlots,
                'selectedDate' => $selectedDate,
            ]);
        }

        // Mode GET (Tampilan awal halaman)
        return view('frontend.bookings.create', [
            'service' => $service,
            'availableSlots' => $availableSlots,
            'selectedDate' => $selectedDate,
        ]);
    }

    /**
     * Memproses penyimpanan booking baru.
     */
    public function store(Request $request)
    {
        $request->validate([
            'service_id' => 'required|exists:services,id',
            'booking_date' => 'required|date',
            'booking_time' => 'required|string',
            'location_address' => 'required|string|max:500',
            'notes' => 'nullable|string|max:1000',
        ]);

        $service = Service::find($request->service_id);
        $bookingDate = Carbon::parse($request->booking_date);

        // --- VALIDASI ULANG SLOT (DIPERBARUI) ---
        $availableSlots = $this->getAvailableSlots($bookingDate, (int)$service->duration_minutes);

        // Cek apakah slot yang dipilih ada dan tersedia
        $isSlotValid = false;
        foreach ($availableSlots as $slot) {
            if ($slot['time'] == $request->booking_time && $slot['available']) {
                $isSlotValid = true;
                break;
            }
        }

        if (!$isSlotValid) {
            return back()->withInput()->with('error', 'Maaf, slot jam ' . $request->booking_time . ' sudah terisi atau tidak valid. Silakan pilih slot lain.');
        }

        // Simpan booking
        Booking::create([
            'client_id' => Auth::id(),
            'service_id' => $request->service_id,
            'booking_date' => $request->booking_date,
            'booking_time' => $request->booking_time,
            'location_address' => $request->location_address,
            'notes' => $request->notes,
            'status' => 'menunggu_konfirmasi',
            'dp_amount' => $service->price * ($service->dp_percentage / 100),
        ]);

        return redirect()->route('dashboard')->with('success', 'Booking Anda telah berhasil diajukan! Mohon tunggu konfirmasi dari admin.');
    }

    /**
     * Menghasilkan array slot waktu yang tersedia.
     */
    private function getAvailableSlots(Carbon $date, ?int $duration): array
    {
        if (empty($duration)) {
            return [];
        }

        $startTime = $date->copy()->setTime(8, 0, 0);
        $endTime = $date->copy()->setTime(18, 0, 0);

        $existingBookings = Booking::where('booking_date', $date->format('Y-m-d'))
                                    ->whereNotIn('status', ['dibatalkan', 'selesai'])
                                    ->with('service:id,duration_minutes')
                                    ->get();

        $filledSlots = [];
        foreach ($existingBookings as $booking) {
            $start = $date->copy()->setTimeFromTimeString($booking->booking_time);
            $durationTaken = $booking->service->duration_minutes ?? 60;
            $end = $start->copy()->addMinutes($durationTaken);
            $filledSlots[] = CarbonPeriod::create($start, $end);
        }

        // --- INI PERUBAHAN LOGIKANYA ---
        $availableSlots = [];
        $currentSlot = $startTime->copy();

        while ($currentSlot < $endTime) {
            $isAvailable = true;
            $currentSlotEnd = $currentSlot->copy()->addMinutes($duration);

            if ($currentSlotEnd > $endTime) {
                break;
            }

            foreach ($filledSlots as $filledPeriod) {
                if ( $currentSlot->lt($filledPeriod->getEndDate()) && $currentSlotEnd->gt($filledPeriod->getStartDate()) )
                {
                    $isAvailable = false;
                    break;
                }
            }

            // SELALU tambahkan slot, tapi dengan status ketersediaannya
            $availableSlots[] = [
                'time' => $currentSlot->format('H:i'),
                'available' => $isAvailable
            ];

            // Maju ke slot berikutnya (interval 60 menit)
            $currentSlot->addMinutes(60);
        }

        return $availableSlots;
    }
}
