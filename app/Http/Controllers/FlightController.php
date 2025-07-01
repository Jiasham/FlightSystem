<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;

class FlightController extends Controller
{
    public function searchFlight(Request $request)
    {
        $from = $request->input('departureLoc');
        $to = $request->input('arrivalLoc');
        $dateInput = $request->input('departureDate');
        $pax = $request->input('people', 1);

        $date = $dateInput;

        $flights = DB::table('Flight')
            ->where('departureLoc', $from)
            ->where('arrivalLoc', $to)
            ->where('departureDate', $date)
            ->get();

        return view('flight-list', [
            'flights' => $flights,
            'from' => $from,
            'to' => $to,
            'date' => $date,
            'pax' => $pax
        ]);
    }

    public function bookFlight($flightID)
    {
        $flight = DB::table('Flight')->where('flightID', $flightID)->first();

        if (!$flight) {
            return redirect()->back()->with('error', 'Flight not found.');
        }

        return view('booking-page', ['flight' => $flight]);
    }
}
