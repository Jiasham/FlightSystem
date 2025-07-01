<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>JetSetGo | Home</title>

    <!-- Favicon -->
    <link rel="shortcut icon" href="{{ asset('images/logo-copy.png') }}" type="image/svg+xml">

    <!-- Custom CSS -->
    <link rel="stylesheet" href="{{ asset('css/index.css') }}">

    <!-- Google Fonts -->
    <link rel="preconnect" href="https://fonts.googleapis.com">
    <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
    <link href="https://fonts.googleapis.com/css2?family=Montserrat:wght@500;600;700;800&family=Poppins:wght@400;500;600;700&display=swap" rel="stylesheet">

    <style>
        .hero {
            background-image: url("{{ asset('images/hero-banner.jpg') }}");
            background-repeat: no-repeat;
            background-size: cover;
            background-position: center;
            background-color: hsla(0, 0%, 0%, 0.7);
            background-blend-mode: overlay;
            display: grid;
            place-items: center;
            min-height: 600px;
            text-align: center;
            padding-top: 125px;
        }

        .hero-title {
            margin-bottom: 20px;
        }

        .hero-text {
            color: var(--white);
            font-size: var(--fs-5);
            margin-bottom: 40px;
        }
    </style>
</head>

<body id="top">

    <!-- Header -->
    @include('partials.header')

    <main>
        <article>

            <!-- Hero Section -->
            <section class="hero" id="home">
                <div class="container">
                    <h2 class="h1 hero-title">Journey to explore world</h2>
                    <p class="hero-text">
                        Plan your travel with confidence.
                        Find help with your bookings and travel plans, and see what to expect along your journey.
                    </p>
                </div>
            </section>

            <!-- Flight Search Form -->
<section class="tour-search" style="display: flex; align-items: center; gap: 20px; flex-wrap: wrap;">
    <h2 style="margin-left: 40px; color: brown;">Choose Your Destination:</h2>

    <form action="{{ route('searchFlight') }}" method="POST" class="tour-search-form" style="display: flex; align-items: center; gap: 20px; flex-wrap: wrap;">
        @csrf

        <!-- Departure Location -->
        <div class="input-wrapper" style="margin-left: 40px;">
            <label for="departureLoc" class="input-label" style="color: brown;">From (Malaysia):</label>
            <select id="departureLoc" name="departureLoc" class="input-field" style="width: auto; height: 50px;" required>
                <option value="" disabled selected>Select departure airport</option>
                <option value="KUL">Kuala Lumpur International Airport (KUL)</option>
                <!-- Add more airports if needed -->
            </select>
        </div>

        <!-- Arrival Location -->
        <div class="input-wrapper">
            <label for="arrivalLoc" class="input-label" style="color: brown;">To (City in Malaysia):</label>
            <select id="arrivalLoc" name="arrivalLoc" class="input-field" style="width: auto; height: 50px;" required>
                <option value="" disabled selected>Select destination airport</option>
                <option value="PEN">Penang International Airport (PEN)</option>
                <!-- Add more airports if needed -->
            </select>
        </div>

        <!-- Pax -->
        <div class="input-wrapper">
            <label for="people" class="input-label" style="color: brown;">Pax Number:</label>
            <input type="number" name="people" id="people" class="input-field" placeholder="No. of People" style="width: auto; height: 50px;" required>
        </div>

        <!-- Departure Date -->
        <div class="input-wrapper">
            <label for="departureDate" class="input-label" style="color: brown;">Departure Date:</label>
            <input type="date" name="departureDate" id="departureDate" class="input-field" style="width: auto; height: 50px;" required>
        </div>

        <!-- Submit -->
        <div class="input-wrapper">
            <button type="submit" class="btn btn-secondary" style="color: brown; border: 1px solid brown; padding: 5px 15px; height: 50px;">
                Search Flights
            </button>
        </div>
    </form>
</section>


            <!-- Destination, Gallery, CTA Sections -->
            
            <!-- 
        - #GALLERY
      -->

            <section class="gallery" id="gallery">
                <div class="container">

                    <p class="section-subtitle">Photo Gallery</p>

                    <h2 class="h2 section-title" style="color: brown;">Photo's From Travellers</h2>

                    <p class="section-text">
                        Captured Moments from Our Travelers
                        Get inspired by breathtaking photos shared by our travelers as they explore stunning
                        destinations, iconic landmarks, and hidden gems.
                    </p>

                    <ul class="gallery-list">

                        <li class="gallery-item">
                            <figure class="gallery-image">
                                <img src="images/gallery-1.jpg" alt="Gallery image">
                            </figure>
                        </li>

                        <li class="gallery-item">
                            <figure class="gallery-image">
                                <img src="images/gallery-2.jpg" alt="Gallery image">
                            </figure>
                        </li>

                        <li class="gallery-item">
                            <figure class="gallery-image">
                                <img src="images/gallery-3.jpg" alt="Gallery image">
                            </figure>
                        </li>

                        <li class="gallery-item">
                            <figure class="gallery-image">
                                <img src="images/gallery-4.jpg" alt="Gallery image">
                            </figure>
                        </li>

                        <li class="gallery-item">
                            <figure class="gallery-image">
                                <img src="images/gallery-5.jpg" alt="Gallery image">
                            </figure>
                        </li>

                    </ul>

                </div>
            </section>

                        <!-- 
        - #CTA
      -->

            <section class="cta" id="contact">
                <div class="container">

                    <div class="cta-content">
                        <p class="section-subtitle" style="color: brown;">Call To Action</p>

                        <h2 class="h2 section-title" style="color: brown;">Ready For Unforgatable Travel. Remember Us!
                        </h2>

                        <p class="section-text" style="color: brown;">
                            Your Next Adventure Awaits!
                            Don’t wait—book your dream trip today and start creating unforgettable memories.
                        </p>
                    </div>

                    <a href="#contact">
                        <button class="btn btn-secondary" style="color: brown; border-color: brown;">Contact
                            Us!</button>
                    </a>

                </div>
            </section>


    



        </article>
    </main>

    <!-- Footer -->
     <footer class="footer">

        <div class="footer-top">
            <div class="container">

                <div class="footer-brand">

                    <a href="#" class="logo">
                        <img src="images/logo.png" alt="Tourly logo">
                    </a>

                    <p class="footer-text">
                        Have Questions? Get in Touch!
                        We’re here to help with any inquiries, bookings, or support you need. Contact us today and let
                        us assist you in planning your perfect journey.
                    </p>

                </div>
                    <div class="footer-contact">

                    <h4 class="contact-title">Contact Us</h4>

                    <p class="contact-text">
                        Feel free to contact and reach us !!
                    </p>

                    <ul>

                        <li class="contact-item">
                            <ion-icon name="call-outline"></ion-icon>

                            <a href="tel:+01123456790" class="contact-link">+60 13697275</a>
                        </li>

                        <li class="contact-item">
                            <ion-icon name="mail-outline"></ion-icon>

                            <a href="mailto:info.tourly.com" class="contact-link">jetsetgo@gmail.com</a>
                        </li>

                        <li class="contact-item">
                            <ion-icon name="location-outline"></ion-icon>

                            <address>UiTM Shah Alam</address>
                        </li>

                    </ul>

                </div>

                <div class="footer-form">

                    <p class="form-text">
                        Subscribe our newsletter for more update & news !!
                    </p>

                    <form action="" class="form-wrapper">
                        <input type="email" name="email" class="input-field" placeholder="Enter Your Email" required>

                        <button type="submit" class="btn btn-secondary">Subscribe</button>
                    </form>

                </div>

            </div>
        </div>

        <div class="footer-bottom">
            <div class="container">

                <p class="copyright">
                    &copy; 2025 <a href="">alyajiashawani</a>. All rights reserved
                </p>

                <ul class="footer-bottom-list">

                    <li>
                        <a href="#" class="footer-bottom-link">Privacy Policy</a>
                    </li>

                    <li>
                        <a href="#" class="footer-bottom-link">Term & Condition</a>
                    </li>

                    <li>
                        <a href="#" class="footer-bottom-link">FAQ</a>
                    </li>

                </ul>

            </div>
        </div>

    </footer>

    <!-- JS Files -->
    <script src="{{ asset('js/script.js') }}"></script>
    <script type="module" src="https://unpkg.com/ionicons@5.5.2/dist/ionicons/ionicons.esm.js"></script>
    <script nomodule src="https://unpkg.com/ionicons@5.5.2/dist/ionicons/ionicons.js"></script>

</body>

</html>
