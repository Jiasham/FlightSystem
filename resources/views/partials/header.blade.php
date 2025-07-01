<header class="header" data-header style="background-color: #333;">
    <div class="overlay" data-overlay></div>
    <div class="header-top">
        <div class="container">
            <a href="tel:+60136972759" class="helpline-box">
                <div class="icon-box">
                    <ion-icon name="call-outline"></ion-icon>
                </div>
                <div class="wrapper">
                    <p class="helpline-title">For Further Inquires :</p>
                    <p class="helpline-number">+60 136972759</p>
                </div>
            </a>
            <a href="#" class="logo">
                <img src="{{ asset('images/logo-copy.png') }}" alt="JetSetGo logo" class="logo-image">
            </a>
            <div class="header-btn-group">
                <button class="search-btn" aria-label="Search">
                    <ion-icon name="search"></ion-icon>
                </button>
                <button class="nav-open-btn" aria-label="Open Menu" data-nav-open-btn>
                    <ion-icon name="menu-outline"></ion-icon>
                </button>
            </div>
        </div>
    </div>

    <div class="header-bottom">
        <div class="container">
            <ul class="social-list">
                <li><a href="https://web.facebook.com/alya.natasha.5245961" target="_top" class="social-link"><ion-icon name="logo-facebook"></ion-icon></a></li>
                <li><a href="https://x.com/nr_alyaantshaaa" target="_top" class="social-link"><ion-icon name="logo-twitter"></ion-icon></a></li>
                <li><a href="https://www.instagram.com/alyaantshaaa/" target="_top" class="social-link"><ion-icon name="logo-instagram"></ion-icon></a></li>
            </ul>

            <nav class="navbar" data-navbar>
                <div class="navbar-top">
                    <a href="#" class="logo">
                        <img src="{{ asset('images/logo.png') }}" alt="JetSetGo Logo">
                    </a>
                    <button class="nav-close-btn" aria-label="Close Menu" data-nav-close-btn>
                        <ion-icon name="close-outline"></ion-icon>
                    </button>
                </div>
                <ul class="navbar-list">
                    <li><a href="{{ route('index') }}" class="navbar-link" data-nav-link>Home</a></li>
                    <li><a href="{{ url('/destination') }}" class="navbar-link" data-nav-link>Destination</a></li>
                    <li><a href="{{ route('profile') }}" class="navbar-link" data-nav-link>Profile</a></li>
                    <li><a href="{{ url('/about-us') }}" class="navbar-link" data-nav-link>About Us</a></li>
                </ul>
            </nav>

            <button class="btn btn-primary" onclick="window.top.location.href='{{ route('logout') }}';">Log Out</button>
        </div>
    </div>
</header>

{{-- Ionicons --}}
<script type="module" src="https://unpkg.com/ionicons@5.5.2/dist/ionicons/ionicons.esm.js"></script>
<script nomodule src="https://unpkg.com/ionicons@5.5.2/dist/ionicons/ionicons.js"></script>
