<!DOCTYPE html>
<html lang="en">
  
<link rel="shortcut icon" type="x-icon" href="logo.png">
<link href="https://cdn.jsdelivr.net/npm/remixicon@2.5.0/fonts/remixicon.css" rel="stylesheet">
<link rel="stylesheet" href="css/login.css">
<link rel="shortcut icon" href="images/logo-copy.png" type="image/svg+xml">
<link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap-icons@1.9.1/font/bootstrap-icons.css">
<head>
  <title>Login</title>
</head>
<body>
    @if(session('success'))
    <div style="color: green; text-align:center; margin-bottom:10px;">
        {{ session('success') }}
    </div>
@endif

@if(session('error'))
    <div style="color: red; text-align:center; margin-bottom:10px;">
        {{ session('error') }}
    </div>
@endif

<div class="container" id="container">
  <div class="form-container sign-up-container">
    <form action="{{ route('register') }}" method="POST">
      @csrf
      <h1 style="margin-bottom: -10px; color: brown">Create Account</h1>
      
      <div class="social-container">
      </div>
      <div class="text-input">
                <i class="ri-account-circle-line"></i>
                <input type="text" name="username" placeholder="Username" required>
      </div>
      <div class="text-input">
        <i class="ri-account-circle-line"></i>
        <input type="text" name="email" placeholder="Email" aria-describedby="emailHelp" required>
      </div>
      <div class="text-input">
                <i class="ri-account-circle-line"></i>
               <input type="text" name="phoneNumber" placeholder="Phone Number" required>
      </div>
      <div class="text-input">
          <i class="ri-lock-fill"></i>
          <input type="password" name="password" id="password" placeholder="Password" required>
          <i class="ri-eye-off-line" id="togglePassword"></i>
            </div>
      <button type="submit" style="background-color: #ecf0a4; border: transparent; color: brown;">Sign Up</button>
    </form>
  </div>

  <div class="form-container sign-in-container">
    <form action="{{ route('custom.login') }}" method="POST">
    @csrf
      <img src="images/logo.png" alt="Company Logo" style="max-width: 250px; margin-bottom: -30px; margin-top: -30px;">
      <div class="social-container">
      </div>
      <div class="text-input">
                <i class="ri-account-circle-line"></i>
                <input type="text" name="email" id="email" placeholder="Email" aria-describedby="emailHelp">
      </div>
      <div class="text-input">
                <i class="ri-lock-fill"></i>
                <input type="password" name="password" id="passwordlgn" placeholder="Password">
                <i class="ri-eye-off-line" id="togglePassword1"></i>
            </div>
       <div class="content">
          <div class="checkbox">
            <input type="checkbox" name="checkbox" id="checkbox">
            <a id="rememberPass" style="color: #a9b29b; font-size: 15px; padding-left: 5px;">Remember Password</a>
          </div>
          <div class="pass-link"> 
            <a href="" id="forgot" style="color: #a9b29b; font-size: 15px;">Forgot password?</a>
          </div>
        </div>
      <button style="background-color: #e7e598; border: transparent; color: brown;" class="login-btn">Login</button>
    </form>
  </div>
  <div class="overlay-container">
    <div class="overlay">
      <div class="overlay-panel overlay-left">
        <img src="images/flight.png" alt="flight" style="max-width: 250px; margin-bottom: -30px; margin-top: -30px;">
        <h1 style="color: brown;">Welcome Back!</h1>
        <p style="color: rgb(100, 68, 16);">To keep connected with us please login with your personal info</p>
        <button class="ghost" id="signIn">Sign In</button>
      </div>
      <div class="overlay-panel overlay-right">
        <h1 style="color: brown;">Hello, Friend!</h1>
        <p style="color: rgb(100, 68, 16);">Enter your personal details and start journey with us</p>
        <a style="color: rgb(100, 68, 16);">Don't have an account?</a>
        <button class="ghost" id="signUp">Sign Up</button>
      </div>
    </div>
  </div>
</div>
</body>
<script src="js/login.js"></script>
<script type="text/javascript">
    // Clear text boxes on page load
    window.onload = function () {
        clearTextboxes();
        loadRememberMe();
    };

    function clearTextboxes() {
        // Clear the values of email and password
        document.getElementById('email').value = '';
        document.getElementById('password').value = '';
    }
    // Load saved state on page load
    window.onload = function () {
        loadRememberMe();
    };

    function login() {
        var email = document.getElementById('email').value;
        var password = document.getElementById('passwordlgn').value;

        // Check if the entered credentials match the predefined ones
        if (email === "alya@gmail.com" && password === "alya") {
          // Redirect to the landing page if login is successful
          window.location.href = "index.html"; 
        } else {
          // Alert for incorrect credentials
          alert("Invalid email or password.");
        }
      }
    //local storage for login page
      // function storeUserData() {
      //       var email = document.getElementById('email').value;
      //       var password = document.getElementById('passwordlgn').value;

      //       localStorage.setItem('userEmail', 'alya@gmail.com');
      //       localStorage.setItem('userPassword', 'alyantsha');
      //   }

      //   // Log in function
      //   function login() {
      //       var email = document.getElementById('email').value;
      //       var password = document.getElementById('passwordlgn').value;

      //       var storedEmail = localStorage.getItem('userEmail');
      //       var storedPassword = localStorage.getItem('userPassword');

      //       if (email == storedEmail && password == storedPassword) {
      //           window.location.href = "booking.html"; // Redirect on success
      //       } 
      //   }
// Function to toggle password visibility
function togglePassword1() {
            var passwordInput = document.getElementById('passwordlgn');
            var toggleIcon = document.getElementById('togglePassword1');

            // Toggle the password input type attribute
            if (passwordInput.type === 'passwordlgn') {
                passwordInput.type = 'text';
                toggleIcon.className = 'ri-eye-line'; // Change to the "eye" icon when showing the password
            } else {
                passwordInput.type = 'passwordlgn';
                toggleIcon.className = 'ri-eye-off-line'; // Change to the "eye-off" icon when hiding the password
            }
        }

        // Attach an event listener to the toggle password icon
        document.getElementById('togglePassword1').addEventListener('click', togglePassword1);

        function togglePassword1() {
        var passwordInput = document.getElementById('passwordlgn');
        var toggleIcon = document.getElementById('togglePassword1');

        if (passwordInput.type === 'password') {
          passwordInput.type = 'text';
          toggleIcon.className = 'ri-eye-line';
        } else {
          passwordInput.type = 'password';
          toggleIcon.className = 'ri-eye-off-line';
        }
      }

        // Attach an event listener to the toggle password icon
        document.getElementById('togglePassword').addEventListener('click', togglePassword);

function saveRememberMe() {
        // Save checkbox state to local storage
        var rememberMeCheckbox = document.getElementById('checkbox');
        localStorage.setItem('checkbox', rememberMeCheckbox.checked);
    }

    function loadRememberMe() {
        // Load checkbox state from local storage
        var rememberMeCheckbox = document.getElementById('checkbox');
        rememberMeCheckbox.checked = localStorage.getItem('checkbox') === 'true';
    }
</script>

</html>