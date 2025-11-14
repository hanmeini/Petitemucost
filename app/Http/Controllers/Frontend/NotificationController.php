<?php

namespace App\Http\Controllers\Frontend;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class NotificationController extends Controller
{
    /**
     * Menampilkan halaman daftar notifikasi.
     */
    public function index()
    {
        $user = Auth::user();

        $notifications = $user->notifications()
                              ->latest()
                              ->paginate(15);

        $user->notifications()->whereNull('read_at')->update([
            'read_at' => now()
        ]);
        return view('frontend.notifications.index', compact('notifications'));
    }
}
