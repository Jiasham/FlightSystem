<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8" />
    <meta http-equiv="X-UA-Compatible" content="IE=edge" />
    <meta name="viewport" content="width=device-width, initial-scale=1.0" />
    <link rel="stylesheet" href="{{ asset('css/payment.css') }}" />
    <script src="{{ asset('js/payment.js') }}" defer></script>
    <title>Flight Booking</title>
</head>
<body>

    <!-- Cancel Booking Button -->
    <a href="{{ route('index') }}" id="cancelBookingBtn" class="cancel-btn">Cancel Booking</a>

    <form action="{{ route('submitBooking') }}" method="POST" class="form">
        @csrf

        <h1 class="text-center">Booking Form</h1>

        <!-- Progress Bar -->
        <div class="progressbar">
            <div class="progress" id="progress"></div>
            <div align="center" class="progress-step progress-step-active" data-title="Personal Details"></div>
            <div align="center" class="progress-step" data-title="Flight Details"></div>
            <div align="center" class="progress-step" data-title="Payment Details"></div>
        </div>

        <!-- Step 1: Personal Details -->
        <div class="form-step form-step-active">
            <div class="input-group">
                <label for="firstName">First Name</label>
                <input type="text" name="firstName" id="firstName" required />
            </div>
            <div class="input-group">
                <label for="familyName">Family Name</label>
                <input type="text" name="familyName" id="familyName" required />
            </div>
            <div class="input-group">
                <label for="gender">Gender</label>
                <select name="gender" id="gender" required>
                    <option value="" disabled selected hidden>Select gender</option>
                    <option value="male">Male</option>
                    <option value="female">Female</option>
                </select>
            </div>
            <div class="input-group">
                <label for="phone">Phone Number</label>
                <input type="text" name="phone" id="phone" required />
            </div>
            <div>
                <a href="#" class="btn btn-next width-50 ml-auto">Next</a>
            </div>
        </div>

        <!-- Step 2: Flight Details -->
        <div class="form-step">
            <div class="card">
                <div class="card-header">
                    Flight Details
                </div>
                <div class="card-body">
                    <div class="row">
                        <div>
                            <h6>Departure</h6>
                            <p><strong>City:</strong> {{ $flight->departureLoc }}</p>
                            <p><strong>Date:</strong> {{ $flight->departureDate }}</p>
                        </div>
                        <div>
                            <h6>Arrival</h6>
                            <p><strong>City:</strong> {{ $flight->arrivalLoc }}</p>
                            <p><strong>Date:</strong> {{ $flight->arrivalDate }}</p>
                        </div>
                    </div>
                    <hr>
                    <div class="row">
                        <div>
                            <h6>Flight Info</h6>
                            <p><strong>Flight Number:</strong> {{ $flight->flightNumber }}</p>
                            <p><strong>Departure Time:</strong> {{ $flight->departureTime }}</p>
                            <p><strong>Arrival Time:</strong> {{ $flight->arrivalTime }}</p>
                        </div>
                        <div>
                            <h6>Passenger</h6>
                            <p><strong>Name:</strong> <span id="passengerName"></span></p>
                            <p><strong>Seat:</strong> Will be assigned</p>
                        </div>
                    </div>
                </div>
                <!-- <div class="card-footer">
                    <button type="button">View Itinerary</button>
                    <button type="button" class="secondary">Download Ticket</button>
                </div> -->
            </div>

            <!-- Hidden Flight ID -->
            <input type="hidden" name="flightID" value="{{ $flight->flightID }}">
            <input type="hidden" id="flightPrice" value="{{ $flight->price }}">

            <!-- Luggage Selection -->
            <div class="input-group">
                <label for="luggage">Luggage (kg)</label>
                <select name="luggage" id="luggage" required>
                    <option value="0">No Extra Luggage (RM0.00)</option>
                    <option value="23.70">15kg (+RM23.70)</option>
                    <option value="36.20">20kg (+RM36.20)</option>
                    <option value="42.80">25kg (+RM42.80)</option>
                </select>
            </div>

            <!-- Total Price -->
            <div class="input-group">
                <label>Total Price (with 6% tax):</label>
                <p id="totalPriceDisplay">MYR {{ number_format($flight->price * 1.06, 2) }}</p>
                <input type="hidden" name="totalPrice" id="totalPriceInput">
            </div>

            <div class="btns-group">
                <a href="#" class="btn btn-prev">Previous</a>
                <a href="#" class="btn btn-next">Next</a>
            </div>
        </div>

        <!-- Step 3: Payment Details -->
        <div class="form-step">
            <h2><strong>Final Payment: </strong><span id="finalPriceDisplay">MYR 0.00</span></h2>

            <div class="btns-group">
                <a href="" class="btn btn-prev">Previous</a>
                <button type="submit" class="btn payCard">Pay Now</button>
            </div>
        </div>

    </form>

    <script>
        document.addEventListener('DOMContentLoaded', function() {
            const flightPrice = parseFloat(document.getElementById('flightPrice').value);
            const luggageSelect = document.getElementById('luggage');
            const totalPriceDisplay = document.getElementById('totalPriceDisplay');
            const finalPriceDisplay = document.getElementById('finalPriceDisplay');
            const totalPriceInput = document.getElementById('totalPriceInput');

            function calculateTotal() {
                const luggageFee = parseFloat(luggageSelect.value);
                const subtotal = flightPrice + luggageFee;
                const totalWithTax = subtotal * 1.06;
                totalPriceDisplay.innerText = 'MYR ' + totalWithTax.toFixed(2);
                finalPriceDisplay.innerText = 'MYR ' + totalWithTax.toFixed(2);
                totalPriceInput.value = totalWithTax.toFixed(2);
            }

            // Auto-fill passenger name preview in Flight Details step
            document.getElementById('firstName').addEventListener('input', updatePassengerName);
            document.getElementById('familyName').addEventListener('input', updatePassengerName);

            function updatePassengerName() {
                const firstName = document.getElementById('firstName').value;
                const familyName = document.getElementById('familyName').value;
                document.getElementById('passengerName').innerText = firstName + ' ' + familyName;
            }

            luggageSelect.addEventListener('change', calculateTotal);
            calculateTotal();
        });
    </script>

</body>
</html>
