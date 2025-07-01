<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8" />
    <meta name="viewport" content="width=device-width, initial-scale=1.0" />
    <title>JetSetGo | Profile & My Bookings</title>

    {{-- Profile CSS --}}
    <link rel="stylesheet" href="{{ asset('css/profile.css') }}">

    <link href="https://fonts.googleapis.com/css2?family=Montserrat:wght@500;600;700;800&family=Poppins:wght@400;500;600;700&display=swap" rel="stylesheet">
    <link rel="shortcut icon" href="{{ asset('images/logo-copy.png') }}" type="image/svg+xml">
</head>
<body>



{{-- Profile Card --}}
<div class="container d-flex justify-content-center align-items-center mt-5">

    <div class="card">

        <div class="upper">
            <img src="{{ asset('images/bg.jpeg') }}" class="img-fluid">
        </div>

        <div class="user text-center">
            <div class="profile">
                <img src="{{ asset('images/iconprofile.png') }}" class="rounded-circle" width="80">
            </div>
        </div>

        <div class="mt-5 text-center">
            <h4 class="mb-0">{{ Auth::user()->username }}</h4>
            <span class="text-muted d-block mb-2">{{ Auth::user()->email }}</span>

            <div class="d-flex justify-content-between align-items-center mt-4 px-4">
                <div class="profile-body">
                    <div class="info-section text-center">
                        <ul>
                            <li><strong>Full Name:</strong> {{ Auth::user()->fullName ?? '-' }}</li>
                            <li><strong>Phone:</strong> {{ Auth::user()->phoneNumber ?? '-' }}</li>
                        </ul>
                    </div>

                    <div class="d-flex justify-content-between">
                        <a href="{{ route('index') }}" class="btn btn-primary w-50">Back to Home</a>
                        {{-- If you want an edit profile button later: --}}
                        {{-- <a href="{{ route('profile.edit') }}" class="btn btn-primary w-50">Edit Profile</a> --}}
                    </div>
                </div>
            </div>
        </div>

    </div>
</div>

<br><br>

{{-- My Bookings Section --}}
<div class="container">
    <div class="text-center">
        <h2>My Bookings</h2>
    </div>

    @forelse($bookings as $booking)
    <!-- Each Booking Card -->
    <div class="flight-ticket mb-4">
        <h2>Flight Ticket</h2>
        <div class="ticket">
            <div class="ticket-header">
                <div class="flight-info">
                    <h3>{{ $booking->flight->airline ?? 'Airline Name' }}</h3>
                    <p>Flight Number: {{ $booking->flight->flightNumber ?? $booking->flightID }}</p>
                </div>
                <div class="flight-time">
                    <p>Departure: {{ \Carbon\Carbon::parse($booking->flight->departureDate . ' ' . $booking->flight->departureTime)->format('D, M d, h:i A') }}</p>
                    <p>Arrival: {{ \Carbon\Carbon::parse($booking->flight->arrivalDate . ' ' . $booking->flight->arrivalTime)->format('D, M d, h:i A') }}</p>
                </div>
            </div>
            <div class="ticket-body">
                <div>
                    <p><strong>From:</strong> {{ $booking->flight->departureLoc ?? 'N/A' }}</p>
                    <p><strong>To:</strong> {{ $booking->flight->arrivalLoc ?? 'N/A' }}</p>
                </div>
                <div>
                    <p><strong>Passenger Name:</strong> {{ $booking->firstName }} {{ $booking->familyName }}</p>
                    <p><strong>Phone:</strong> {{ $booking->phone }}</p>
                </div>
            </div>
            <div style="padding: 10px;">
                <p><strong>Total Price:</strong> RM {{ number_format($booking->totalPrice, 2) }}</p>
                <p><strong>Status:</strong> {{ $booking->bookingStatus }}</p>
            </div>
        </div>
    </div>
    @empty
        <div class="alert alert-warning text-center">You have no bookings yet.</div>
    @endforelse
</div>


</body>
</html>
