<?php

namespace App\Http\Controllers;

use App\Models\Absensi;
use App\Models\Siswa;
use Illuminate\Http\Request;

class AbsensiController extends Controller
{
    public function index()
    {
        $absensis = Absensi::with('siswa')->get();  // Load siswa with absensi
        return view('absensi.index', compact('absensis'));
    }

    public function create()
    {
        $siswas = Siswa::all();
        return view('absensi.create', compact('siswas'));
    }

    public function store(Request $request)
    {
        $request->validate([
            'tanggal' => 'required|date',
            'siswa_id' => 'required|exists:siswas,id',
            'kelas' => 'required|string|max:255',
            'status' => 'required|in:Hadir,Tidak Hadir,Izin,Sakit',
            'keterangan' => 'nullable|string',
        ]);

        Absensi::create($request->all());

        return redirect()->route('absensi.index')->with('success', 'Absensi created successfully.');
    }

    public function edit(Absensi $absensi)
    {
        $siswas = Siswa::all();
        return view('absensi.edit', compact('absensi', 'siswas'));
    }

    public function update(Request $request, Absensi $absensi)
    {
        $request->validate([
            'tanggal' => 'required|date',
            'siswa_id' => 'required|exists:siswas,id',
            'kelas' => 'required|string|max:255',
            'status' => 'required|in:Hadir,Tidak Hadir,Izin,Sakit',
            'keterangan' => 'nullable|string',
        ]);

        $absensi->update($request->all());

        return redirect()->route('absensi.index')->with('success', 'Absensi updated successfully.');
    }

    public function destroy(Absensi $absensi)
    {
        $absensi->delete();

        return redirect()->route('absensi.index')->with('success', 'Absensi deleted successfully.');
    }
}
