<!-- resources/views/layouts/admin.blade.php -->
<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Admin Dashboard</title>
    @vite('resources/css/app.css') <!-- Pastikan Vite terkonfigurasi dengan benar -->
</head>

<body>
    <header class="bg-gray-800 text-white p-4">
        <div class="container mx-auto flex justify-between items-center">
            <a href="{{ route('admin.dashboard') }}" class="text-xl font-bold">Admin Dashboard</a>
            <a href="{{ route('logout') }}" class="text-white hover:text-gray-300">Logout</a>
        </div>
    </header>

    <main class="py-8">
        @yield('content')
    </main>
</body>

</html>
