<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\ProfileController;

//Auth
use App\Http\Controllers\Auth\GoogleLoginController;
use App\Http\Controllers\Auth\AuthController;

//Controller Admin
use App\Http\Controllers\Admin\ServiceController as AdminServiceController;
use App\Http\Controllers\Admin\DashboardController;
use App\Http\Controllers\Admin\PortfolioController;
use App\Http\Controllers\Admin\BookingController;
use App\Http\Controllers\Admin\EventController;
use App\Http\Controllers\Admin\TestimonialController as AdminTestimonialController;


// Controller frontend
use App\Http\Controllers\Frontend\ServiceController as FrontendServiceController;
use App\Http\Controllers\Frontend\BookingController as FrontendBookingController;
use App\Http\Controllers\Frontend\ClientDashboardController;
use App\Http\Controllers\Frontend\PaymentController;
use App\Http\Controllers\Frontend\PortfoliosController;
use App\Http\Controllers\Frontend\LandingPageController;
use App\Http\Controllers\Frontend\TestimonialController;
use App\Http\Controllers\Frontend\NotificationController;


// Rute untuk Login Google
Route::get('/auth/google/redirect', [GoogleLoginController::class, 'redirectToGoogle'])->name('google.redirect');
Route::get('/auth/google/callback', [GoogleLoginController::class, 'handleGoogleCallback'])->name('google.callback');

// Auth Routes (Pengganti Breeze)
Route::get('/login', [AuthController::class, 'showLoginForm'])->name('login');
Route::post('/login', [AuthController::class, 'login']);
Route::get('/register', [AuthController::class, 'showRegisterForm'])->name('register');
Route::post('/register', [AuthController::class, 'register']);
Route::post('/logout', [AuthController::class, 'logout'])->name('logout');


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
    Route::get('/testimonial/{booking}/create', [TestimonialController::class, 'create'])->name('testimonial.create');
    Route::post('/testimonial/{booking}', [TestimonialController::class, 'store'])->name('testimonial.store');
    Route::get('/notifications', [NotificationController::class, 'index'])->name('notifications.index');

});

// Dashboard Admin
Route::middleware(['auth', 'admin'])->prefix('admin')->name('admin.')->group(function () {
    Route::get('/dashboard', [DashboardController::class, 'index'])->name('dashboard');
    Route::resource('/services', AdminServiceController::class);
    Route::resource('/portfolios', PortfolioController::class);
    Route::resource('/bookings', BookingController::class);
    Route::resource('/events', EventController::class);
    Route::resource('/testimonials', AdminTestimonialController::class)->only([
        'index', 'update', 'destroy'
    ]);
});

//Profile Routes (bisa diakses oleh Klien & Admin)
Route::middleware('auth')->group(function () {
    Route::get('/profile', [ProfileController::class, 'edit'])->name('profile.edit');
    Route::patch('/profile', [ProfileController::class, 'update'])->name('profile.update');
    Route::delete('/profile', [ProfileController::class, 'destroy'])->name('profile.destroy');
});

Route::fallback(function () {
    return response()->view('errors.404', [], 404);
});
require __DIR__.'/auth.php';

