<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\Booking;
use Illuminate\Http\Request;

class BookingController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $bookings = Booking::with(['client', 'service', 'payment'])
            ->orderBy('booking_date', 'desc')
            ->orderBy('booking_time', 'desc')
            ->get();

        return view('admin.bookings.index', compact('bookings'));
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        //
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        //
    }

    /**
     * Display the specified resource.
     */
    public function show(string $id)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(Booking $booking)
    {
        $booking->load(['client', 'service', 'payment']);
        return view('admin.bookings.edit', compact('booking'));
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, Booking $booking)
    {
        $request->validate([
            'action' => 'required|in:confirm,reject,verify_payment,mark_completed'
        ]);

        $action = $request->input('action');

        switch ($action) {
            case 'confirm':
                $booking->update(['status' => 'terkonfirmasi']);
                $message = 'Booking berhasil dikonfirmasi!';
                break;

            case 'reject':
                $booking->update(['status' => 'dibatalkan']);
                $message = 'Booking telah ditolak!';
                break;

            case 'verify_payment':
                $booking->update(['status' => 'terkonfirmasi']);
                $message = 'Pembayaran berhasil diverifikasi!';
                break;

            case 'mark_completed':
                $booking->update(['status' => 'selesai']);
                $message = 'Booking telah ditandai selesai!';
                break;
        }

        return redirect()->route('bookings.edit', $booking)
            ->with('success', $message);
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(string $id)
    {
        //
    }
}
