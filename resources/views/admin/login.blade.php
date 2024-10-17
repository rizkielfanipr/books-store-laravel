<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Admin Login</title>
    <!-- Tailwind CSS CDN or Vite Configuration -->
    @vite('resources/css/app.css')  <!-- Update this line if you're using Vite -->
    <link href="https://cdn.jsdelivr.net/npm/tailwindcss@3.0.24/dist/tailwind.min.css" rel="stylesheet">
</head>
<body class="bg-gray-50 flex items-center justify-center min-h-screen">
    <div class="w-full max-w-md bg-white rounded-lg shadow-md p-8">
        <h1 class="text-2xl font-bold mb-6 text-gray-900">Admin Login</h1>

        <!-- Login Form -->
        <form action="{{ route('admin.login.post') }}" method="POST" class="space-y-4">
            @csrf

            <!-- Email Address -->
            <div>
                <label for="email" class="block text-sm font-medium text-gray-700">Email:</label>
                <input type="email" id="email" name="email" required
                       class="mt-1 block w-full border border-gray-300 rounded-lg shadow-sm focus:border-blue-500 focus:ring focus:ring-blue-200 focus:ring-opacity-50">
            </div>

            <!-- Password -->
            <div>
                <label for="password" class="block text-sm font-medium text-gray-700">Password:</label>
                <input type="password" id="password" name="password" required
                       class="mt-1 block w-full border border-gray-300 rounded-lg shadow-sm focus:border-blue-500 focus:ring focus:ring-blue-200 focus:ring-opacity-50">
            </div>

            <!-- Submit Button -->
            <div>
                <button type="submit" class="w-full bg-blue-600 hover:bg-blue-700 text-white font-medium rounded-lg text-sm px-4 py-2 focus:outline-none focus:ring-4 focus:ring-blue-300">
                    Login
                </button>
            </div>

            <!-- Register Admin Link -->
            <div class="mt-4 text-center">
                <p class="text-sm text-gray-600">Belum memiliki akun admin?</p>
                <a href="{{ route('admin.register') }}" class="text-blue-600 hover:text-blue-700 font-medium">
                    {{ __('Register Admin') }}
                </a>
            </div>

            <!-- Error Messages -->
            @if ($errors->any())
                <div class="mt-4 bg-red-100 text-red-700 border border-red-300 rounded-lg p-4">
                    <ul class="list-disc list-inside">
                        @foreach ($errors->all() as $error)
                            <li>{{ $error }}</li>
                        @endforeach
                    </ul>
                </div>
            @endif
        </form>
    </div>
</body>
</html>
