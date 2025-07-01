
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <title>Dashboard</title>
</head>
<body>
    <h1>Welcome, {{  Auth::user()->username }}!</h1>
    <p>Your email: {{  Auth::user()->email }}</p>

    <a href="{{ route('logout') }}">Logout</a>
</body>
</html>

