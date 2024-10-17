<?php

namespace App\Http\Controllers;

use App\Models\Product;
use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class AdminController extends Controller
{
    // Menampilkan daftar pengguna
    public function listUsers()
    {
        $users = User::all(); // Anda bisa menambahkan filter jika diperlukan
        return view('admin.users.index', compact('users'));
    }

    // Menampilkan detail pengguna
    public function showUser(User $user)
    {
        return view('admin.users.show', compact('user'));
    }

    // Menyetujui pengguna
    public function approveUser(Request $request, User $user)
    {
        // Lakukan validasi jika perlu
        $user->update(['is_active' => true]);
        return redirect()->route('admin.users')->with('success', 'Pengguna telah disetujui!');
    }

    // Tampilkan form login admin
    public function showLoginForm()
    {
        return view('admin.login'); // Pastikan file view ini ada
    }

    // Proses login admin
    public function login(Request $request)
    {
        $credentials = $request->only('email', 'password');

        if (Auth::guard('admin')->attempt($credentials)) {
            return redirect()->intended('/admin/dashboard');
        }

        return redirect()->back()->withErrors([
            'email' => 'The provided credentials do not match our records.',
        ]);
    }

    // Proses logout admin
    public function logout(Request $request)
    {
        Auth::guard('admin')->logout();

        $request->session()->invalidate();

        $request->session()->regenerateToken();

        return redirect('/admin/login');
    }

    // Dashboard Admin
    public function dashboard()
    {
        $productCount = Product::count();
        $userCount = User::count();
        $activeProductCount = Product::where('is_active', true)->count();
        $activeUserCount = User::where('is_active', true)->count();
        $latestProducts = Product::latest()->take(10)->get();

        return view('admin.dashboard', compact('productCount', 'userCount', 'activeProductCount', 'activeUserCount', 'latestProducts'));
    }
}
