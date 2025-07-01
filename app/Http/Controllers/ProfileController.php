<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;

class ProfileController extends Controller
{
    public function showProfile()
    {
        $user = auth()->user();

        return view('profile', [
            'user' => $user
        ]);
    }
    

    public function showMyBookings()
    {
        $userID = auth()->check() ? auth()->user()->userID : null;

        if (!$userID) {
            return redirect()->route('custom.login.form')->with('error', 'Please login first.');
        }

        // Fetch user's bookings (You can JOIN with Flight table for flight details)
        $bookings = DB::table('Booking')
            ->join('Flight', 'Booking.flightID', '=', 'Flight.flightID')
            ->where('Booking.userID', $userID)
            ->select(
                'Booking.*',
                'Flight.flightNumber',
                'Flight.departureLoc',
                'Flight.arrivalLoc',
                'Flight.departureDate',
                'Flight.departureTime',
                'Flight.arrivalTime'
            )
            ->get();

        return view('my-booking', [
            'bookings' => $bookings
        ]);
    }
}
