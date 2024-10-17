<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Home</title>
    @vite('resources/css/app.css') <!-- Pastikan Vite terkonfigurasi dengan benar -->
</head>

<body>
    <header class="border-b border-gray-200 sticky top-0 z-20 bg-white">
        <div class="flex items-center justify-between mx-auto max-w-6xl px-6 pb-2 pt-4 md:pt-6">
            <a href="/" class="flex no-underline cursor-pointer">
                <img alt="logo" class="h-18 w-36 object-contain -ml-10" src="{{ asset('images/logo.png') }}" />
            </a>
            <div class="flex items-center space-x-4">
                @guest
                    <a href="{{ route('login') }}" class="text-gray-800 hover:text-gray-600">Login</a>
                @else
                    <span class="text-gray-800 mr-4">Hai, {{ Auth::user()->name }}</span> <!-- Menambahkan sapaan pengguna -->
                    <form action="{{ route('logout') }}" method="POST" class="inline">
                        @csrf
                        <button type="submit" class="text-gray-800 hover:text-gray-600">Logout</button>
                    </form>
                @endguest
            </div>
        </div>
    </header>

    <main class="p-4">
        <!-- Banner Section -->
        <div class="relative mb-4">
            <img src="{{ asset('images/banner.png') }}" alt="Banner" class="w-full h-64 object-cover rounded-lg" />
        </div>

<!-- Product Section -->
<div class="text-center mb-6 py-10">
    <h1 class="text-3xl font-bold mb-2">Selamat Datang, Pilih Produk Favoritmu!</h1>
    <p class="text-lg text-gray-600">Temukan berbagai produk menarik kami</p>
</div>

<div class="grid grid-cols-2 sm:grid-cols-3 md:grid-cols-4 gap-4">
    @foreach($products as $product)
    <a href="/products/{{ $product->slug }}" class="block h-full w-full rounded-lg shadow-lg border border-gray-200 overflow-hidden">
        <div class="relative overflow-hidden h-60">
            <!-- Gambar Produk -->
            <img src="{{ asset('images/buku-1.png') }}" alt="Buku" class="w-full h-full object-cover">
        </div>
        <div class="p-4">
            <div class="font-primary text-gray-800 text-xl font-semibold mb-2">
                {{ $product->name }}
            </div>
            <div class="text-lg text-gray-600 mb-2 font-primary font-light">
                {{ $product->description }}
            </div>
            <div class="text-gray-800 font-primary font-medium text-base bg-gray-200 rounded-lg p-2 mt-4">
                Rp {{ number_format($product->price, 0, ',', '.') }}
            </div>
        </div>
    </a>
    @endforeach
</div>

</body>

</html>
