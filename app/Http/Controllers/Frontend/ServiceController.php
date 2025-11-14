<?php

namespace App\Http\Controllers\Frontend;

use App\Http\Controllers\Controller;
use App\Models\Service;
use Illuminate\Http\Request;

class ServiceController extends Controller
{
    /**
     * Menampilkan halaman daftar layanan (sekarang dengan fitur search).
     */
    public function index(Request $request)
    {
        $query = Service::query();

        if ($request->has('search') && $request->search != '') {
            $searchTerm = $request->search;

            $query->where(function($q) use ($searchTerm) {
                $q->where('name', 'like', '%' . $searchTerm . '%')
                  ->orWhere('description', 'like', '%' . $searchTerm . '%');
            });
        }

        $services = $query->latest()->paginate(9)->withQueryString();

        return view('frontend.services.index', [
            'services' => $services,
            'search' => $request->search ?? ''
        ]);
    }

    /**
     * Menampilkan halaman detail layanan.
     * (Tidak ada perubahan di sini)
     */
    public function show(Service $service)
    {
        $service->load('portfolios');
        return view('frontend.services.show', compact('service'));
    }
}
