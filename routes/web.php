<?php

use App\Http\Controllers\ProfileController;
use App\Http\Controllers\Admin\ServiceController;
use App\Http\Controllers\Admin\DashboardController;
use App\Http\Controllers\Admin\PortfolioController;
use App\Http\Controllers\Admin\BookingController;
use Illuminate\Support\Facades\Route;

Route::get('/', function () {
    return view('landingpage');
});

// Rute untuk user yang sudah login
Route::middleware(['auth', 'verified'])->group(function () {
    // Dashboard Klien
    Route::get('/dashboard', function () {
        return view('dashboard');
    })->name('dashboard');

});
// Grup Rute KHUSUS ADMIN
Route::middleware(['auth', 'admin'])->group(function () {

    Route::get('/admin/dashboard', [DashboardController::class, 'index'])->name('admin.dashboard');
    Route::resource('/admin/services', ServiceController::class);
    Route::resource('/admin/portfolios', PortfolioController::class);
    Route::resource('/admin/bookings', BookingController::class);
});

Route::middleware('auth')->group(function () {
    Route::get('/profile', [ProfileController::class, 'edit'])->name('profile.edit');
    Route::patch('/profile', [ProfileController::class, 'update'])->name('profile.update');
    Route::delete('/profile', [ProfileController::class, 'destroy'])->name('profile.destroy');
});

require __DIR__.'/auth.php';
