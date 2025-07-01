<!DOCTYPE html>
<html>
<head>
    <title>Flight List</title>
</head>
<body>
    <h1>Available Flights</h1>
    <table border="1">
        <tr>
            <th>Flight ID</th>
            <th>Flight Number</th>
            <th>Departure Location</th>
            <th>Arrival Location</th>
            <th>Departure Date</th>
            <th>Departure Time</th>
            <th>Arrival Date</th>
            <th>Arrival Time</th>
            <th>Price</th>
            <th>Seats Available</th>
        </tr>
        @foreach($flights as $flight)
        <tr>
            <td>{{ $flight->flightID }}</td>
            <td>{{ $flight->flightNumber }}</td>
            <td>{{ $flight->departureLoc }}</td>
            <td>{{ $flight->arrivalLoc }}</td>
            <td>{{ $flight->departureDate }}</td>
            <td>{{ $flight->departureTime }}</td>
            <td>{{ $flight->arrivalDate }}</td>
            <td>{{ $flight->arrivalTime }}</td>
            <td>{{ $flight->price }}</td>
            <td>{{ $flight->seatsAvailable }}</td>
        </tr>
        @endforeach
    </table>
</body>
</html>
