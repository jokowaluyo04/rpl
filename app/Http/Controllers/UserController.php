<?php

namespace App\Http\Controllers;

use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Hash;

class UserController extends Controller
{
    public function index()
    {
        $users = User::all(); // Fetch all users
        $totalSiswa = User::where('role', 'siswa')->count(); // Count users with 'siswa' role
        return view('manajemen_pengguna.index', compact('users', 'totalSiswa'));
    }

    public function create()
    {
        return view('manajemen_pengguna.create');
    }

    public function store(Request $request)
    {
        $request->validate([
            'name' => 'required|string|max:255',
            'email' => 'required|string|email|max:255|unique:users',
            'password' => 'required|string|min:8|confirmed',
            'role' => 'required|string|max:255',
        ]);

        User::create([
            'name' => $request->name,
            'email' => $request->email,
            'password' => Hash::make($request->password),
            'role' => $request->role,
        ]);

        return redirect()->route('manajemen_pengguna.index')->with('success', 'User created successfully.');
    }

    public function edit(User $manajemen_pengguna)
    {
        return view('manajemen_pengguna.edit', compact('manajemen_pengguna'));
    }

    public function update(Request $request, User $manajemen_pengguna)
    {
        $request->validate([
            'name' => 'required|string|max:255',
            'email' => 'required|string|email|max:255|unique:users,email,' . $manajemen_pengguna->id,
            'role' => 'required|string|max:255',
            'password' => 'nullable|string|min:8|confirmed',
        ]);

        $manajemen_pengguna->update([
            'name' => $request->name,
            'email' => $request->email,
            'password' => $request->password ? Hash::make($request->password) : $manajemen_pengguna->password,
            'role' => $request->role,
        ]);

        return redirect()->route('manajemen_pengguna.index')->with('success', 'User updated successfully.');
    }

    public function destroy(User $manajemen_pengguna)
    {
        $manajemen_pengguna->delete();
        return redirect()->route('manajemen_pengguna.index')->with('success', 'User deleted successfully.');
    }
}
