<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\ProfileController;

//Controller Admin
use App\Http\Controllers\Admin\ServiceController as AdminServiceController;
use App\Http\Controllers\Admin\DashboardController;
use App\Http\Controllers\Admin\PortfolioController;
use App\Http\Controllers\Admin\BookingController;
use App\Http\Controllers\Admin\EventController;


// Controller frontend
use App\Http\Controllers\Frontend\ServiceController as FrontendServiceController;
use App\Http\Controllers\Frontend\BookingController as FrontendBookingController;
use App\Http\Controllers\Frontend\ClientDashboardController;
use App\Http\Controllers\Frontend\PaymentController;
use App\Http\Controllers\Frontend\PortfoliosController;
use App\Http\Controllers\Frontend\LandingPageController;


Route::get('/', [LandingPageController::class, 'index'])->name('home');
Route::get('/services', [FrontendServiceController::class, 'index'])->name('services.index');
Route::get('/services/{service:slug}', [FrontendServiceController::class, 'show'])->name('services.show');
Route::get('/portfolios', [App\Http\Controllers\Frontend\PortfoliosController::class, 'index'])->name('portfolios.index');

//User Login
Route::middleware(['auth', 'verified'])->group(function () {
    Route::get('/dashboard', [ClientDashboardController::class, 'index'])->name('dashboard');
    Route::post('/book/store', [FrontendBookingController::class, 'store'])->name('booking.store');
    Route::match(['get', 'post'], '/book/{service:slug}', [FrontendBookingController::class, 'create'])->name('booking.create');
    Route::get('/payment/{booking}', [PaymentController::class, 'create'])->name('payment.create');
    Route::post('/payment/{booking}', [PaymentController::class, 'store'])->name('payment.store');

});

// Dashboard Admin
Route::middleware(['auth', 'admin'])->prefix('admin')->name('admin.')->group(function () {
    Route::get('/dashboard', [DashboardController::class, 'index'])->name('dashboard');
    Route::resource('/services', AdminServiceController::class);
    Route::resource('/portfolios', PortfolioController::class);
    Route::resource('/bookings', BookingController::class);
    Route::resource('/events', EventController::class);
});

//Profile Routes (bisa diakses oleh Klien & Admin)
Route::middleware('auth')->group(function () {
    Route::get('/profile', [ProfileController::class, 'edit'])->name('profile.edit');
    Route::patch('/profile', [ProfileController::class, 'update'])->name('profile.update');
    Route::delete('/profile', [ProfileController::class, 'destroy'])->name('profile.destroy');
});

require __DIR__.'/auth.php';

