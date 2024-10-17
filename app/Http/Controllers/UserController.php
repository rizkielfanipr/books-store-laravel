<?php

namespace App\Http\Controllers;

use App\Models\User;
use Illuminate\Http\Request;

class UserController extends Controller
{
    public function index()
    {
        // Mengambil semua pengguna dengan paginasi
        $users = User::paginate(10); // Menampilkan 10 pengguna per halaman
        return view('admin.users.index', compact('users'));
    }

    public function show(User $user)
    {
        // Menampilkan detail pengguna
        return view('admin.users.show', compact('user'));
    }

    public function approve(User $user)
    {
        // Menyetujui pendaftaran pengguna
        $user->update(['is_active' => true]);
        return redirect()->route('admin.users')->with('success', 'User approved successfully.');
    }
}
