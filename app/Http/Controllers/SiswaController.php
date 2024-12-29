<?php

namespace App\Http\Controllers;

use App\Models\Siswa;
use App\Models\User;
use Illuminate\Http\Request;

class SiswaController extends Controller
{
    public function index()
    {
        $siswas = Siswa::with('user')->get(); // Eager load the user relationship
        return view('siswas.index', compact('siswas')); // Pass the data to the view
    }

    public function create(Siswa $siswa)
    {
        // Fetch all users with the 'siswa' role
        $siswaUsers = User::where('role', 'siswa')->get();

        // Pass both $siswa and $siswaUsers to the view
        return view('siswas.create', compact('siswa', 'siswaUsers'));
    }


    public function store(Request $request)
    {
        // Validate the incoming request data
        $request->validate([
            'user_id' => 'required|exists:users,id', // Ensure that the user_id exists in the users table
            'nis' => 'required|unique:siswas', // Ensure the NIS is unique in the siswas table
            'kelas' => 'required', // Class field is required
            'alamat' => 'required', // Address field is required
            'jenis_kelamin' => 'required', // Gender field is required
            'no_hp' => 'nullable', // Phone number is optional
        ]);

        // Create the Siswa record using the validated data
        Siswa::create([
            'user_id' => $request->user_id, // Store the user_id
            'nis' => $request->nis, // Store the NIS
            'kelas' => $request->kelas, // Store the class
            'alamat' => $request->alamat, // Store the address
            'jenis_kelamin' => $request->jenis_kelamin, // Store the gender
            'no_hp' => $request->no_hp, // Store the phone number (optional)
        ]);

        // Redirect back to the index page with a success message
        return redirect()->route('siswas.index')->with('success', 'Siswa created successfully');
    }


    public function edit(Siswa $siswa)
    {
        // Fetch all users with the 'siswa' role
        $siswaUsers = User::where('role', 'siswa')->get();

        // Pass both $siswa and $siswaUsers to the view
        return view('siswas.edit', compact('siswa', 'siswaUsers'));
    }

    public function update(Request $request, Siswa $siswa)
    {
        $request->validate([
            'user_id' => 'required',
            'nis' => 'required|unique:siswas,nis,' . $siswa->id,
            'kelas' => 'required',
            'alamat' => 'required',
            'jenis_kelamin' => 'required',
            'no_hp' => 'nullable',
        ]);

        $siswa->update([
            'user_id' => $request->user_id,
            'nis' => $request->nis,
            'kelas' => $request->kelas, // Make sure this is set correctly
            'alamat' => $request->alamat,
            'jenis_kelamin' => $request->jenis_kelamin,
            'no_hp' => $request->no_hp,
        ]);

        return redirect()->route('siswas.index')->with('success', 'Siswa updated successfully');
    }

    public function destroy(Siswa $siswa)
    {
        $siswa->delete(); // Delete siswa data

        return redirect()->route('siswas.index')->with('success', 'Siswa deleted successfully');
    }
}
