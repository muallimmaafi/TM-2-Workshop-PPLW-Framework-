<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <title>Landing Page</title>
    <link rel="stylesheet" href="{{ asset('template/assets/vendors/css/vendor.bundle.base.css') }}">
    <link rel="stylesheet" href="{{ asset('template/assets/css/style.css') }}">
</head>
<body>

<div class="container d-flex justify-content-center align-items-center" style="height:100vh;">
    <div class="text-center">
        <h1>Sistem Perpustakaan</h1>
        <p>Aplikasi manajemen buku dan kategori</p>

        @auth
            <a href="{{ route('dashboard') }}" class="btn btn-primary">
                Dashboard
            </a>
        @else
            <a href="{{ route('login') }}" class="btn btn-primary me-2">
                Login
            </a>

            <a href="{{ route('register') }}" class="btn btn-outline-primary">
                Register
            </a>
        @endauth
    </div>
</div>

</body>
</html>