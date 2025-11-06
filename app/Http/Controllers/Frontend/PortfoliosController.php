<?php

namespace App\Http\Controllers\Frontend;

use App\Http\Controllers\Controller;
use App\Models\Portfolio;
use App\Models\Service; // Kita butuh Model Service
use Illuminate\Http\Request;

class PortfoliosController extends Controller
{
    public function index()
    {
        $servicesWithPortfolios = Service::whereHas('portfolios')
                                         ->with('portfolios')
                                         ->get();
                                         
        return view('frontend.portfolios.index', compact('servicesWithPortfolios'));
    }
}
