<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Daftar Pengguna</title>
    @vite('resources/css/app.css') <!-- Pastikan Vite terkonfigurasi dengan benar -->
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
    <h1 class="text-3xl font-bold text-gray-900 mb-6">Daftar Pengguna</h1>
        <main class="p-4">
            @if (session('success'))
                <div class="bg-green-100 text-green-800 p-4 mb-4 rounded">
                    {{ session('success') }}
                </div>
            @endif
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
                                Nama
                            </th>
                            <th scope="col" class="p-4 text-xs font-medium text-gray-500 uppercase">
                                Email
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
                        @foreach ($users as $user)
                        <tr class="hover:bg-gray-100">
                            <td class="p-4">
                                <div class="flex items-center">
                                    <input id="checkbox-{{ $user->id }}" aria-describedby="checkbox-1" type="checkbox"
                                        class="w-4 h-4 border-gray-300 rounded bg-gray-50 focus:ring-3 focus:ring-primary-300">
                                    <label for="checkbox-{{ $user->id }}" class="sr-only">Select</label>
                                </div>
                            </td>
                            <td class="p-4 text-sm font-normal text-gray-500 whitespace-nowrap">
                                <div class="text-base font-semibold text-gray-900">{{ $user->name }}</div>
                            </td>
                            <td class="p-4 text-sm font-normal text-gray-500 whitespace-nowrap">
                                {{ $user->email }}
                            </td>
                            <td class="p-4 text-sm font-medium text-gray-900 whitespace-nowrap">
                                {{ $user->is_active ? 'Aktif' : 'Pending' }}
                            </td>
                            <td class="p-4 space-x-2 whitespace-nowrap">
                                @if (!$user->is_active)
                                    <form action="{{ route('admin.user.approve', $user) }}" method="POST" class="inline">
                                        @csrf
                                        <button type="submit" class="inline-flex items-center px-3 py-2 text-sm font-medium text-center text-white bg-blue-700 rounded-lg hover:bg-blue-800 focus:ring-4 focus:ring-blue-300">
                                            Approve
                                        </button>
                                    </form>
                                @endif
                                <a href="{{ route('admin.user.show', $user) }}" class="inline-flex items-center px-3 py-2 text-sm font-medium text-center text-blue-600 rounded-lg hover:text-blue-800 focus:ring-4 focus:ring-blue-300">
                                    Detail
                                </a>
                            </td>
                        </tr>
                        @endforeach
                    </tbody>
                </table>
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
