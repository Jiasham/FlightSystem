<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\FlightController;
use App\Http\Controllers\BookingController;
use App\Http\Controllers\PaymentController;
use App\Http\Controllers\LoginController;
use App\Http\Controllers\ProfileController;
use App\Http\Controllers\UserController;

Route::middleware(['web'])->group(function () {
    Route::get('/custom-login', [LoginController::class, 'showLoginForm'])->name('custom.login.form');
    Route::post('/custom-login', [LoginController::class, 'login'])->name('custom.login');
    Route::post('/register', [LoginController::class, 'register'])->name('register');
    Route::get('/dashboard', [LoginController::class, 'dashboard'])->name('dashboard');
    Route::get('/logout', [LoginController::class, 'logout'])->name('logout');
});

Route::get('/', function () {
    return view('index');
})->name('index');

Route::match(['get', 'post'], '/search-flight', [FlightController::class, 'searchFlight'])->name('searchFlight');
Route::get('/book-flight/{flightID}', [FlightController::class, 'bookFlight'])->name('bookFlight');

Route::post('/submit-booking', [BookingController::class, 'submitBooking'])->name('submitBooking');
Route::get('/payment-method', [BookingController::class, 'showPaymentPage'])->name('paymentMethod');
Route::get('/booking-page', [BookingController::class, 'showBookingPage'])->name('bookingPage');

Route::post('/confirm-payment', [PaymentController::class, 'confirmPayment'])->name('confirmPayment');


Route::middleware(['web'])->group(function () {
   Route::get('/profile', [UserController::class, 'showProfile'])->name('profile');
Route::get('/my-bookings', [BookingController::class, 'myBookings'])->name('myBookings');
});

Route::get('/profile', [BookingController::class, 'profile'])->name('profile');
Route::get('/profile', [BookingController::class, 'profileWithBookings'])->name('profile');
