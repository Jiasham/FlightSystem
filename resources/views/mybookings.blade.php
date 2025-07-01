<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>My Bookings</title>

    <link rel="stylesheet" href="{{ asset('css/confirmation.css') }}">
    <link href="https://fonts.googleapis.com/css2?family=Montserrat:wght@500;600;700;800&family=Poppins:wght@400;500;600;700&display=swap" rel="stylesheet">
    <link rel="shortcut icon" href="{{ asset('images/logo-copy.png') }}" type="image/svg+xml">
</head>
<body>

    <div class="container">
        <div class="text-center">
            <h2>My Bookings</h2>
        </div>

        @forelse($bookings as $booking)
    <div class="flight-ticket mb-4">
        <h2>Flight Ticket</h2>
        <div class="ticket">
            <div class="ticket-header">
                <div class="flight-info">
                    <h3>{{ $booking->flight->flightNumber ?? 'N/A' }}</h3>
                    <p>Flight Number: {{ $booking->flight->flightNumber ?? 'N/A' }}</p>
                </div>
                <div class="flight-time">
                    <p>Departure: {{ \Carbon\Carbon::parse($booking->flight->departureDate)->format('d M Y') }} - {{ $booking->flight->departureTime }}</p>
                    <p>Arrival: {{ \Carbon\Carbon::parse($booking->flight->arrivalDate)->format('d M Y') }} - {{ $booking->flight->arrivalTime }}</p>
                </div>
            </div>
            <div class="ticket-body">
                <p><strong>From:</strong> {{ $booking->flight->departureLoc ?? 'N/A' }}</p>
                <p><strong>To:</strong> {{ $booking->flight->arrivalLoc ?? 'N/A' }}</p>
                <p><strong>Passenger:</strong> {{ $booking->firstName }} {{ $booking->familyName }}</p>
                <p><strong>Phone:</strong> {{ $booking->phone }}</p>
                <p><strong>Status:</strong> {{ $booking->bookingStatus }}</p>
                <p><strong>Total Price:</strong> RM {{ number_format($booking->totalPrice, 2) }}</p>
            </div>
        </div>
    </div>
@empty
    <div class="alert alert-warning text-center">You have no bookings yet.</div>
@endforelse

       

        <div class="text-center mt-3">
            <a href="{{ route('index') }}" class="back-btn">Back to Home</a>
        </div>
    </div>


</body>
</html>
