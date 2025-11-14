<?php

namespace App\View\Composers;

use Illuminate\View\View;
use Illuminate\Support\Facades\Auth;
use App\Models\Booking;

class AdminSidebarComposer
{
    /**
     * Mengikat data ke view.
     *
     * @param  \Illuminate\View\View  $view
     * @return void
     */
    public function compose(View $view)
    {
        $adminNotificationCount = 0;

        if (Auth::check() && Auth::user()->role == 'admin') {
            $pendingBookings = Booking::where('status', 'menunggu_konfirmasi')->count();
            $pendingPayments = Booking::where('status', 'menunggu_verifikasi_pembayaran')->count();
            $adminNotificationCount = $pendingBookings + $pendingPayments;
        }
        $view->with('adminNotificationCount', $adminNotificationCount);
    }
}
