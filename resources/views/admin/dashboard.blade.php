<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Admin Dashboard</title>
    @vite('resources/css/app.css') <!-- Ensure Vite is properly configured -->
</head>

<body class="flex flex-col h-screen bg-gray-100">
    <!-- Sidebar -->
<!-- Sidebar -->
<aside id="sidebar" class="fixed top-0 left-0 z-40 w-64 h-screen bg-gray-50 text-gray-900 border-r border-gray-200">
    <div class="h-full px-3 py-4 overflow-y-auto bg-gray-50">
        <!-- Logo -->
        <div class="flex justify-center items-center mb-6">
            <img src="{{ asset('images/logo.png') }}" alt="Logo" class="h-12 w-auto">
        </div>
        <ul class="space-y-2 font-medium">
            <!-- Dashboard -->
            <li>
                <a href="{{ route('admin.dashboard') }}" class="flex items-center p-2 text-gray-900 rounded-lg hover:bg-gray-100 group">
                    <svg class="w-5 h-5 text-gray-500 transition duration-75 group-hover:text-gray-900" fill="currentColor" viewBox="0 0 20 20" xmlns="http://www.w3.org/2000/svg">
                        <path d="M2 10a8 8 0 018-8v8h8a8 8 0 11-16 0z"></path>
                        <path d="M12 2.252A8.014 8.014 0 0117.748 8H12V2.252z"></path>
                    </svg>
                    <span class="ms-3">Dashboard</span>
                </a>
            </li>
            <!-- Daftar Pengguna -->
            <li>
                <a href="{{ route('admin.users') }}" class="flex items-center p-2 text-gray-900 rounded-lg hover:bg-gray-100 group">
                    <!-- User Icon -->
                    <svg class="w-5 h-5 text-gray-500 transition duration-75 group-hover:text-gray-900" fill="currentColor" viewBox="0 0 20 20" xmlns="http://www.w3.org/2000/svg">
                        <path d="M10 10a4 4 0 100-8 4 4 0 000 8zM2 8a6 6 0 1110.89 3.476l4.817 4.817a1 1 0 01-1.414 1.414l-4.816-4.816A6 6 0 012 8z"></path>
                    </svg>
                    <span class="ms-3">Users</span>
                </a>
            </li>
            <!-- Manajemen Produk -->
            <li>
                <a href="{{ route('admin.products.index') }}" class="flex items-center p-2 text-gray-900 rounded-lg hover:bg-gray-100 group">
                    <!-- Product Icon -->
                    <svg class="w-5 h-5 text-gray-500 transition duration-75 group-hover:text-gray-900" fill="currentColor" viewBox="0 0 20 20" xmlns="http://www.w3.org/2000/svg">
                        <path d="M16 2H4a2 2 0 00-2 2v12a2 2 0 002 2h12a2 2 0 002-2V4a2 2 0 00-2-2zM4 4h12v12H4V4zm1 1v10h10V5H5zm2 1h6v8H7V6z"></path>
                    </svg>
                    <span class="ms-3">Products</span>
                </a>
            </li>
        </ul>
        
        <!-- Logout Button -->
        <div class="absolute bottom-4 left-3 w-64">
            <form action="{{ route('admin.logout') }}" method="POST" onsubmit="return confirm('Are you sure you want to log out?');">
                @csrf
                <button type="submit" class="inline-flex items-center px-4 py-2 text-sm font-medium text-center text-white bg-blue-700 rounded-lg hover:bg-blue-800 focus:ring-4 focus:ring-blue-300">
                    <svg class="w-4 h-4 mr-2" fill="currentColor" viewBox="0 0 20 20" xmlns="http://www.w3.org/2000/svg">
                        <path d="M4 10a1 1 0 01-1-1 1 1 0 011-1h6V5a1 1 0 112 0v3h6a1 1 0 110 2H11v3a1 1 0 01-2 0v-3H4z"></path>
                        <path fill-rule="evenodd" d="M2 10a8 8 0 018-8v8h8a8 8 0 11-16 0z" clip-rule="evenodd"></path>
                    </svg>
                    Logout
                </button>
            </form>
        </div>
    </div>
</aside>


    <!-- Main Content -->
    <div class="flex-1 ml-64 mt-16 p-4">
        <!-- Heading -->
        <h1 class="text-3xl font-bold text-gray-900 mb-6">Admin Dashboard</h1>
        
        <main>
            <!-- Summary Cards -->
            <div class="grid grid-cols-1 md:grid-cols-2 lg:grid-cols-4 gap-4 mb-6">
                <!-- Card for Product Count -->
                <div class="max-w-sm p-6 bg-white border border-gray-200 rounded-lg shadow">
                    <h5 class="mb-2 text-lg font-bold tracking-tight text-gray-900">Jumlah Produk</h5>
                    <p class="mb-3 text-2xl font-bold">{{ $productCount }}</p>
                </div>
                <!-- Card for User Count -->
                <div class="max-w-sm p-6 bg-white border border-gray-200 rounded-lg shadow">
                    <h5 class="mb-2 text-lg font-bold tracking-tight text-gray-900">Jumlah Pengguna</h5>
                    <p class="mb-3 text-2xl font-bold">{{ $userCount }}</p>
                </div>
                <!-- Card for Active Product Count -->
                <div class="max-w-sm p-6 bg-white border border-gray-200 rounded-lg shadow">
                    <h5 class="mb-2 text-lg font-bold tracking-tight text-gray-900">Jumlah Produk Aktif</h5>
                    <p class="mb-3 text-2xl font-bold">{{ $activeProductCount }}</p>
                </div>
                <!-- Card for Active User Count -->
                <div class="max-w-sm p-6 bg-white border border-gray-200 rounded-lg shadow">
                    <h5 class="mb-2 text-lg font-bold tracking-tight text-gray-900">Jumlah Pengguna Aktif</h5>
                    <p class="mb-3 text-2xl font-bold">{{ $activeUserCount }}</p>
                </div>
            </div>

            <!-- Produk Terbaru Table -->
            <div class="mb-6">
                <h2 class="text-xl font-semibold mb-4">Produk Terbaru</h2>
                <div class="relative overflow-x-auto shadow-md sm:rounded-lg">
                    <table class="w-full text-sm text-left text-gray-500 divide-y divide-gray-200">
                        <thead class="text-xs text-gray-700 uppercase bg-gray-100">
                            <tr>
                                <th scope="col" class="p-4">
                                    <div class="flex items-center">
                                        <input id="checkbox-all" aria-describedby="checkbox-1" type="checkbox"
                                            class="w-4 h-4 border-gray-300 rounded bg-gray-50 focus:ring-3 focus:ring-primary-300">
                                        <label for="checkbox-all" class="sr-only">Select All</label>
                                    </div>
                                </th>
                                <th scope="col" class="p-4 text-xs font-medium text-gray-500 uppercase">
                                    Nama Produk
                                </th>
                                <th scope="col" class="p-4 text-xs font-medium text-gray-500 uppercase">
                                    Harga
                                </th>
                                <th scope="col" class="p-4 text-xs font-medium text-gray-500 uppercase">
                                    Status
                                </th>
                                <th scope="col" class="p-4 text-xs font-medium text-gray-500 uppercase">
                                    Aksi
                                </th>
                            </tr>
                        </thead>
                        <tbody class="bg-white divide-y divide-gray-200">
                            @foreach ($latestProducts as $product)
                            <tr class="hover:bg-gray-100">
                                <td class="p-4">
                                    <div class="flex items-center">
                                        <input id="checkbox-{{ $product->id }}" aria-describedby="checkbox-1" type="checkbox"
                                            class="w-4 h-4 border-gray-300 rounded bg-gray-50 focus:ring-3 focus:ring-primary-300">
                                        <label for="checkbox-{{ $product->id }}" class="sr-only">Select</label>
                                    </div>
                                </td>
                                <td class="p-4 text-sm font-normal text-gray-500 whitespace-nowrap">
                                    <div class="text-base font-semibold text-gray-900">{{ $product->name }}</div>
                                </td>
                                <td class="p-4 text-base font-medium text-gray-900 whitespace-nowrap">
                                    Rp {{ number_format($product->price, 0, ',', '.') }}
                                </td>
                                <td class="p-4 text-base font-medium text-gray-900 whitespace-nowrap">
                                    {{ $product->is_active ? 'Aktif' : 'Non-Aktif' }}
                                </td>
                                <td class="p-4 space-x-2 whitespace-nowrap">
                                    <!-- Update Button -->
                                    <a href="{{ route('admin.products.edit', $product->id) }}"
                                       class="inline-flex items-center px-3 py-2 text-sm font-medium text-center text-white bg-blue-700 rounded-lg hover:bg-blue-800 focus:ring-4 focus:ring-blue-300">
                                        <svg class="w-4 h-4 mr-2" fill="currentColor" viewBox="0 0 20 20" xmlns="http://www.w3.org/2000/svg">
                                            <path d="M17.414 2.586a2 2 0 00-2.828 0L7 10.172V13h2.828l7.586-7.586a2 2 0 000-2.828z"></path>
                                            <path fill-rule="evenodd" d="M2 6a2 2 0 012-2h4a1 1 0 010 2H4v10h10v-4a1 1 0 112 0v4a2 2 0 01-2 2H4a2 2 0 01-2-2V6z" clip-rule="evenodd"></path>
                                        </svg>
                                        Update
                                    </a>
                                    
                                    <!-- Delete Button with Confirmation -->
                                    <button type="button" onclick="confirmDelete('{{ route('admin.products.destroy', $product->id) }}')"
                                        class="inline-flex items-center px-3 py-2 text-sm font-medium text-center text-white bg-red-700 rounded-lg hover:bg-red-800 focus:ring-4 focus:ring-red-300">
                                        <svg class="w-4 h-4 mr-2" fill="currentColor" viewBox="0 0 20 20" xmlns="http://www.w3.org/2000/svg">
                                            <path fill-rule="evenodd" d="M9 2a1 1 0 00-.894.553L7.382 4H4a1 1 0 000 2v10a2 2 0 002 2h8a2 2 0 002-2V6a1 1 0 100-2h-3.382l-.724-1.447A1 1 0 0011 2H9zM7 8a1 1 0 012 0v6a1 1 0 11-2 0V8zm5-1a1 1 0 00-1 1v6a1 1 0 102 0V8a1 1 0 00-1-1z" clip-rule="evenodd"></path>
                                        </svg>
                                        Delete
                                    </button>
                                </td>
                            </tr>
                            @endforeach
                        </tbody>
                    </table>
                </div>
            </div>
        </main>
    </div>

    <script>
        function confirmDelete(url) {
            if (confirm("Are you sure you want to delete this item?")) {
                window.location.href = url;
            }
        }
    </script>
</body>

</html>
