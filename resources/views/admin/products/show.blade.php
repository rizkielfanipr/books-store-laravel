<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Detail Produk</title>
    @vite('resources/css/app.css')
</head>

<body class="flex">
    <!-- Sidebar -->
    <aside class="w-64 bg-gray-800 text-white p-4">
        <h2 class="text-xl font-bold mb-4">Admin Menu</h2>
        <ul>
            <li class="mb-2">
                <a href="{{ route('admin.dashboard') }}" class="block py-2 px-4 rounded hover:bg-gray-700">
                    Dashboard
                </a>
            </li>
            <li class="mb-2">
                <a href="{{ route('admin.users') }}" class="block py-2 px-4 rounded hover:bg-gray-700">
                    Daftar Pengguna
                </a>
            </li>
            <li class="mb-2">
                <a href="{{ route('products.index') }}" class="block py-2 px-4 rounded bg-gray-700">
                    Manajemen Produk
                </a>
            </li>
        </ul>
    </aside>

    <!-- Main Content -->
    <div class="flex-1">
        <header class="bg-gray-800 text-white p-4">
            <div class="container mx-auto flex justify-between items-center">
                <a href="{{ route('admin.dashboard') }}" class="text-xl font-bold">Admin Dashboard</a>
                <form action="{{ route('admin.logout') }}" method="POST" class="inline">
                    @csrf
                    <button type="submit" class="text-white hover:text-gray-300 bg-gray-700 p-2 rounded">
                        Logout
                    </button>
                </form>
            </div>
        </header>

        <main class="p-4">
            <h2 class="text-xl font-semibold mb-4">Detail Produk</h2>
            <div class="mb-4">
                <label class="block text-sm font-medium text-gray-700">Nama Produk</label>
                <p>{{ $product->name }}</p>
            </div>
            <div class="mb-4">
                <label class="block text-sm font-medium text-gray-700">Harga Produk</label>
                <p>Rp {{ number_format($product->price, 0, ',', '.') }}</p>
            </div>
            <div class="mb-4">
                <label class="block text-sm font-medium text-gray-700">Gambar Produk</label>
                @if ($product->image)
                    <img src="{{ Storage::url($product->image) }}" alt="{{ $product->name }}" class="w-40 h-40 object-cover">
                @else
                    <p>Tidak ada gambar</p>
                @endif
            </div>
            <div class="mb-4">
                <label class="block text-sm font-medium text-gray-700">Status</label>
                <p>{{ $product->is_active ? 'Aktif' : 'Non-Aktif' }}</p>
            </div>
            <a href="{{ route('products.edit', $product) }}" class="bg-blue-500 text-white px-4 py-2 rounded hover:bg-blue-600">Edit</a>
            <a href="{{ route('products.index') }}" class="bg-gray-500 text-white px-4 py-2 rounded hover:bg-gray-600">Kembali</a>
        </main>
    </div>
</body>

</html>
