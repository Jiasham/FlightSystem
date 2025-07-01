// Example dynamic data for flight and hotel booking
const bookingData = {
    flight: {
        airline: "JetSetGo Airlines",
        flightNumber: "J 1209",
        departureTime: "Mon, Jan 13, 03:00 PM",
        arrivalTime: "Mon, Jan 13, 04:05 PM",
        from: "Kuala Lumpur International Airport (KUL)",
        to: "Langkawi International Airport (LGK)",
        passenger: "Alya Natasha",
        seat: "12A",
    },
    hotel: {
        name: "Dayang Bay Resort Langkawi",
        rating: "3.8 Very Good",
        reviews: 7445,
        address: "Persiaran Pelangi, Kuah, Langkawi, Kedah",
        checkIn: "Mon, Jan 13, 03:00 PM",
        checkOut: "Wed, Jan 15, 12:00 PM",
        guests: "2 adults",
        room: "1 x Deluxe Room",
        amenities: ["Breakfast included", "Free parking", "Free fitness center access"],
        price: "RM 553.14",
    },
};

// Populate the flight ticket section
document.getElementById("airline-name").textContent = bookingData.flight.airline;
document.getElementById("flight-number").textContent = `Flight Number: ${bookingData.flight.flightNumber}`;
document.getElementById("departure-time").textContent = `Departure: ${bookingData.flight.departureTime}`;
document.getElementById("arrival-time").textContent = `Arrival: ${bookingData.flight.arrivalTime}`;
document.getElementById("from-airport").textContent = bookingData.flight.from;
document.getElementById("to-airport").textContent = bookingData.flight.to;
document.getElementById("passenger-name").textContent = bookingData.flight.passenger;
document.getElementById("seat-number").textContent = bookingData.flight.seat;

// Populate the hotel booking section
document.getElementById("hotel-name").textContent = bookingData.hotel.name;
document.getElementById("hotel-rating").textContent = `${bookingData.hotel.rating} | ${bookingData.hotel.reviews} reviews`;
document.getElementById("hotel-address").textContent = bookingData.hotel.address;
document.getElementById("checkin-date").textContent = bookingData.hotel.checkIn;
document.getElementById("checkout-date").textContent = bookingData.hotel.checkOut;
document.getElementById("guests").textContent = bookingData.hotel.guests;
document.getElementById("room-type").textContent = bookingData.hotel.room;
document.getElementById("total-price").textContent = bookingData.hotel.price;

// Populate ameniies
const amenitiesContainer = document.getElementById("amenities");
bookingData.hotel.amenities.forEach((amenity) => {
    const p = document.createElement("p");
    p.textContent = `✔️ ${amenity}`;
    amenitiesContainer.appendChild(p);
});
