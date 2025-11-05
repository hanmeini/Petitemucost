<?php

namespace App\Http\Controllers\Frontend;

use App\Http\Controllers\Controller;
use App\Models\Service;
use Illuminate\Http\Request;

class ServiceController extends Controller
{
    public function index()
    {

        $services = Service::latest()->get();
        return view('frontend.services.index', compact('services'));
    }
        public function show(Service $service)
    {
        $service->load('portfolios');
        return view('frontend.services.show', compact('service'));
    }
}
