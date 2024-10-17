<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Detail Pengguna</title>
    @vite('resources/css/app.css')
</head>

<body class="flex h-screen bg-gray-100">
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
                    <a href="{{ route('admin.users') }}" class="flex items-center p-2 text-gray-900 rounded-lg bg-gray-100 hover:bg-gray-200 group">
                        <svg class="w-5 h-5 text-gray-500 transition duration-75 group-hover:text-gray-900" fill="currentColor" viewBox="0 0 20 20" xmlns="http://www.w3.org/2000/svg">
                            <path d="M10 10a4 4 0 100-8 4 4 0 000 8zM2 8a6 6 0 1110.89 3.476l4.817 4.817a1 1 0 01-1.414 1.414l-4.816-4.816A6 6 0 012 8z"></path>
                        </svg>
                        <span class="ms-3">Users</span>
                    </a>
                </li>
                <!-- Manajemen Produk -->
                <li>
                    <a href="{{ route('admin.products.index') }}" class="flex items-center p-2 text-gray-900 rounded-lg hover:bg-gray-100 group">
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
        <h1 class="text-3xl font-bold mb-4">Detail Pengguna</h1>

        <main class="p-4">
            <div class="bg-white p-6 rounded-lg shadow-md">
                <p class="mb-4"><strong class="font-medium">Nama:</strong> {{ $user->name }}</p>
                <p class="mb-4"><strong class="font-medium">Email:</strong> {{ $user->email }}</p>
                <p class="mb-4"><strong class="font-medium">Status:</strong> {{ $user->is_active ? 'Aktif' : 'Pending' }}</p>
                <p class="mb-4"><strong class="font-medium">Created At:</strong> {{ $user->created_at }}</p>
                <p class="mb-4"><strong class="font-medium">Updated At:</strong> {{ $user->updated_at }}</p>
                <a href="{{ route('admin.users') }}" class="text-blue-600 hover:text-blue-800 inline-flex items-center">
                    <svg class="w-4 h-4 mr-1" fill="currentColor" viewBox="0 0 20 20" xmlns="http://www.w3.org/2000/svg">
                        <path fill-rule="evenodd" d="M10 3a1 1 0 011 1v10a1 1 0 01-2 0V4a1 1 0 011-1zm-2.707 5.293a1 1 0 011.414 1.414L6.414 12H13a1 1 0 110 2H6.414l2.293 2.293a1 1 0 01-1.414 1.414l-4-4a1 1 0 010-1.414l4-4z" clip-rule="evenodd"></path>
                    </svg>
                    Kembali ke Daftar Pengguna
                </a>
            </div>
        </main>
    </div>
</body>

</html>
