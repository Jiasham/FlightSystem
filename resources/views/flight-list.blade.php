<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Flight Listing</title>
    <link rel="stylesheet" href="{{ asset('css/flight.css') }}">
    <link rel="shortcut icon" href="{{ asset('images/logo-copy.png') }}" type="image/svg+xml">
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/css/bootstrap.min.css">
</head>

<body>

    @include('partials.header')

    <div class="container mt-4">

        <!-- Route Info -->
        <h2 style="font-weight: bold; color: #7c4700;">
            {{ strtoupper($from) }} → {{ strtoupper($to) }}
        </h2>
        <p>{{ $pax }} Adult(s) | Economy | {{ \Carbon\Carbon::parse($date)->format('d M Y') }}</p>

        <!-- Sort Filter -->
        <div class="dropdown mb-4">
            <button class="btn btn-outline-warning dropdown-toggle" type="button" id="sortDropdown" data-bs-toggle="dropdown" aria-expanded="false">
                Sort Flights
            </button>
            <ul class="dropdown-menu" aria-labelledby="sortDropdown">
                <li><a class="dropdown-item" href="{{ request()->fullUrlWithQuery(['sort' => 'earliest']) }}">Earliest</a></li>
                <li><a class="dropdown-item" href="{{ request()->fullUrlWithQuery(['sort' => 'latest']) }}">Latest</a></li>
            </ul>
        </div>

        <!-- Flight Listing -->
        @forelse($flights as $flight)
            <div class="card mb-3 shadow-sm border-0" style="border-radius: 12px;">
                <div class="card-body">
                    <div class="d-flex justify-content-between align-items-center">
                        <div>
                            <h5 style="color: #b36200;">{{ $flight->departureTime }} → {{ $flight->arrivalTime }}</h5>
                            <p style="margin: 0;">
                                {{ $flight->departureLoc }} → {{ $flight->arrivalLoc }} <br>
                                Date: {{ \Carbon\Carbon::parse($flight->departureDate)->format('d M Y') }} <br>
                                Flight No: {{ $flight->flightNumber }}
                            </p>
                        </div>
                        <div class="text-end">
                            <p style="margin: 0; color: #555;">MYR {{ number_format($flight->price, 2) }} / pax</p>
                            <p style="margin: 0;">Seats: {{ $flight->seatsAvailable }}</p>
                            <button class="btn btn-outline-warning mt-2 select-flight-btn"
                                    data-flight-id="{{ $flight->flightID }}"
                                    data-flight-number="{{ $flight->flightNumber }}"
                                    data-bs-toggle="modal"
                                    data-bs-target="#proceedModal">
                                Select
                            </button>
                        </div>
                    </div>
                </div>
            </div>
        @empty
            <div class="alert alert-warning text-center">No flights found for this route and date.</div>
        @endforelse

        <!-- Back to Home -->
        <div class="text-center mt-4">
            <a href="{{ url('/') }}" class="btn btn-outline-secondary">Back to Home</a>
        </div>

    </div>

    <!-- Booking Confirmation Modal -->
    <div class="modal fade" id="proceedModal" tabindex="-1" aria-labelledby="proceedModalLabel" aria-hidden="true">
        <div class="modal-dialog">
            <div class="modal-content">
                <div class="modal-header">
                    <h5 class="modal-title" id="proceedModalLabel">Proceed with Flight Booking</h5>
                    <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                </div>
                <div class="modal-body">
                    Do you want to proceed to book this flight? <span id="selectedFlightNumber" style="font-weight:bold;"></span>
                </div>
                <div class="modal-footer">
                    <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Cancel</button>
                    <form id="bookingForm" method="GET" action="{{ route('bookingPage') }}">
                        <input type="hidden" name="flight_id" id="flightIdInput">
                        <button type="submit" class="btn btn-primary">Proceed to Booking</button>
                    </form>
                </div>
            </div>
        </div>
    </div>

    <!-- Scripts -->
    <script>
        document.addEventListener('DOMContentLoaded', function () {
            const buttons = document.querySelectorAll('.select-flight-btn');
            buttons.forEach(function (btn) {
                btn.addEventListener('click', function () {
                    const flightId = this.getAttribute('data-flight-id');
                    const flightNumber = this.getAttribute('data-flight-number');

                    document.getElementById('flightIdInput').value = flightId;
                    document.getElementById('selectedFlightNumber').innerText = flightNumber;
                });
            });
        });
    </script>

    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/js/bootstrap.bundle.min.js"></script>

    <footer class="text-center mt-4">
        <p>&copy; 2025 alyajiashawani. All rights reserved.</p>
    </footer>

</body>

</html>
