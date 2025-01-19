<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>@yield('title', 'Admin Panel')</title>
    <!-- Tambahkan CSS atau link stylesheet di sini -->
</head>
<body>
    <header>
        <h1>Admin Panel</h1>
        <!-- Tambahkan navigasi atau header lainnya -->
    </header>

    <main>
        @yield('content')
    </main>

    <footer>
        <p>&copy; {{ date('Y') }} Your Company</p>
    </footer>
    <!-- Tambahkan JavaScript di sini -->
</body>
</html>