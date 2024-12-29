<?php

namespace App\Http\Controllers;

use App\Models\User;

class DashboardController extends Controller
{
    public function index()
    {
        // Fetch the count of users with the role 'siswa'
        $totalSiswa = User::where('role', 'siswa')->count();

        // Pass the data to the view
        return view('dashboard', compact('totalSiswa'));
    }
}
