<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use App\Models\Booking;
use App\Models\Flight;
use Illuminate\Support\Facades\Auth;



class BookingController extends Controller
{
    public function showBookingPage(Request $request)
    {
        $flightID = $request->query('flight_id');
        $flight = DB::table('Flight')->where('flightID', $flightID)->first();

        if (!$flight) {
            return redirect()->back()->with('error', 'Flight not found.');
        }

        return view('booking-page', ['flight' => $flight]);
    }

    public function submitBooking(Request $request)
    {
        $bookingID = uniqid('B');

        DB::table('Booking')->insert([
    'bookingID' => $bookingID,
    'bookingDate' => now(),
    'bookingStatus' => 'Pending',
    'flightID' => $request->input('flightID'),
    'firstName' => $request->input('firstName'),
    'familyName' => $request->input('familyName'),
    'gender' => $request->input('gender'),
    'phone' => $request->input('phone'),
    'luggageFee' => $request->input('luggage'),
    'totalPrice' => $request->input('totalPrice'),
]);


        // Save booking info into session for payment page
        $request->session()->put('current_booking_id', $bookingID);
        $request->session()->put('current_total_amount', $request->input('totalPrice'));

        return redirect()->route('paymentMethod');
    }

    public function showPaymentPage(Request $request)
    {
        $bookingID = $request->session()->get('current_booking_id');
        $totalAmount = $request->session()->get('current_total_amount');

        if (!$bookingID || !$totalAmount) {
            return redirect()->route('index')->with('error', 'No booking found. Please start again.');
        }

        return view('payment-method', [
            'bookingID' => $bookingID,
            'totalAmount' => $totalAmount
        ]);
    }

public function myBookings()
{
    $userID = Auth::id();  // Get the logged in user ID

    $bookings = Booking::where('userID', $userID)->with('flight')->get();

    return view('mybookings', compact('bookings'));
}

public function profile()
{
    $userID = Auth::id();
    $bookings = Booking::where('userID', $userID)->with('flight')->get();

    return view('profile', compact('bookings'));
}
public function profileWithBookings()
    {
        $userID = Auth::id();

        // Fetch bookings for the logged-in user, including related flight info
        $bookings = Booking::with('flight')->where('userID', $userID)->get();

        return view('profile', compact('bookings'));
    }
}
