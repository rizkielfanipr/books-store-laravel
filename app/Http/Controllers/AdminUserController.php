<?php

namespace App\Http\Controllers;

use App\Models\User;
use Illuminate\Http\Request;

class AdminUserController extends Controller
{
    // List Pengguna
    public function index()
    {
        $users = User::all();
        return view('admin.users.index', compact('users'));
    }

    // Tampilkan detail pengguna
    public function show(User $user)
    {
        return view('admin.users.show', compact('user'));
    }

    // Approve pengguna
    // Menyetujui pengguna
    public function approve(Request $request, User $user)
    {
        $user->update(['is_active' => true]);
        return redirect()->route('admin.users')->with('success', 'Pengguna telah disetujui!');
    }
}
