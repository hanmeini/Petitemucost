<?php

namespace App\Http\Controllers\Frontend;

use App\Http\Controllers\Controller;
use App\Models\Service;
use App\Models\Portfolio;
use App\Models\Testimonial;
use App\Models\Events;
use Illuminate\Http\Request;

class LandingPageController extends Controller
{
    /**
     * Menampilkan halaman landing page dengan data dinamis.
     */
    public function index()
    {
        // Ambil 3 layanan untuk ditampilkan
        $services = Service::latest()->take(3)->get();

        // Ambil 6 foto portofolio terbaru
        $portfolios = Portfolio::with('service')->latest()->take(6)->get();

        // Ambil 3 testimoni yang di-featured
        $testimonials = Testimonial::where('is_featured', true)
                                   ->with('booking.client')
                                   ->latest()
                                   ->take(3)
                                   ->get();
        //Ambil 5 event terdekat
        $upcomingEvents = Events::where('event_date', '>=', now())
                                ->orderBy('event_date', 'asc')
                                ->take(5)
                                ->get();

        return view('landingpage', compact(
            'services','portfolios','testimonials','upcomingEvents'
        ));
    }
}
