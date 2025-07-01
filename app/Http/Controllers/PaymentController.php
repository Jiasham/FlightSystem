<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;

class PaymentController extends Controller
{
    public function confirmPayment(Request $request)
    {
        $paymentID = uniqid('P');

        DB::table('Payment')->insert([
            'paymentID' => $paymentID,
            'paymentDate' => now(),
            'totalAmount' => $request->input('totalAmount'),
            'paymentMethod' => $request->input('paymentMethod'),
            'paymentStatus' => 'Success',
            'bookingID' => $request->input('bookingID'),
        ]);

        // Update booking status to Confirmed
        DB::table('Booking')->where('bookingID', $request->input('bookingID'))
            ->update(['bookingStatus' => 'Confirmed']);

        return redirect()->route('index')->with('success', 'Payment successful! Your booking is confirmed.');
    }
}
