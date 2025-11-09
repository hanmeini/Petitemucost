<?php

namespace App\Http\Controllers\Frontend;

use App\Http\Controllers\Controller;
use App\Models\Service;
use Illuminate\Http\Request;

class PortfoliosController extends Controller
{
    public function index(Request $request)
    {
        $allServices = Service::has('portfolios')->get();

        $query = Service::query();

        if ($request->has('category') && $request->category != '') {
            $query->where('slug', $request->category);
        }

        $servicesWithPortfolios = $query->whereHas('portfolios')
                                        ->with(['portfolios' => function($q) {
                                            $q->latest();
                                        }])
                                        ->get();

        return view('frontend.portfolios.index', compact('servicesWithPortfolios', 'allServices'));
    }
}
