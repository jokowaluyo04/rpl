<?php

namespace App\Http\Controllers;

use App\Models\LaporanPerkembangan;
use App\Models\Siswa;
use Barryvdh\DomPDF\Facade\Pdf;
use Illuminate\Http\Request;

class LaporanPerkembanganController extends Controller
{
    public function index()
    {
        $laporanPerkembangans = LaporanPerkembangan::with('siswa')->get();
        return view('laporan_perkembangan.index', compact('laporanPerkembangans'));
    }

    public function create()
    {
        $siswas = Siswa::all();
        return view('laporan_perkembangan.create', compact('siswas'));
    }

    public function store(Request $request)
    {
        $request->validate([
            'siswa_id' => 'required|exists:siswas,id',
            'deskripsi' => 'required|string',
            'nilai_matematika' => 'required|integer',
            'nilai_ipa' => 'required|integer',
            'nilai_ppkn' => 'required|integer',
            'nilai_bahasa_indonesia' => 'required|integer',
            'jumlah_hadir' => 'nullable|integer',
            'jumlah_tidak_hadir' => 'nullable|integer',
            'catatan' => 'nullable|string',
            'tanggal' => 'required|date',
        ]);

        LaporanPerkembangan::create($request->all());

        return redirect()->route('laporan_perkembangan.index')->with('success', 'Laporan Perkembangan created successfully.');
    }

    public function edit(LaporanPerkembangan $laporanPerkembangan)
    {
        $siswas = Siswa::all();
        return view('laporan_perkembangan.edit', compact('laporanPerkembangan', 'siswas'));
    }

    public function update(Request $request, LaporanPerkembangan $laporanPerkembangan)
    {
        $request->validate([
            'siswa_id' => 'required|exists:siswas,id',
            'deskripsi' => 'required|string',
            'nilai_matematika' => 'required|integer',
            'nilai_ipa' => 'required|integer',
            'nilai_ppkn' => 'required|integer',
            'nilai_bahasa_indonesia' => 'required|integer',
            'jumlah_hadir' => 'nullable|integer',
            'jumlah_tidak_hadir' => 'nullable|integer',
            'catatan' => 'nullable|string',
            'tanggal' => 'required|date',
        ]);

        $laporanPerkembangan->update($request->all());

        return redirect()->route('laporan_perkembangan.index')->with('success', 'Laporan Perkembangan updated successfully.');
    }

    public function destroy(LaporanPerkembangan $laporanPerkembangan)
    {
        $laporanPerkembangan->delete();

        return redirect()->route('laporan_perkembangan.index')->with('success', 'Laporan Perkembangan deleted successfully.');
    }

    public function show($id)
    {
        $laporanPerkembangan = LaporanPerkembangan::with('siswa')->findOrFail($id); // Load related Siswa data

        return view('laporan_perkembangan.show', compact('laporanPerkembangan'));
    }

    public function cetak($id)
    {
        $laporanPerkembangan = LaporanPerkembangan::with('siswa')->findOrFail($id); // Fetch laporan with related siswa data

        // Generate PDF
        $pdf = Pdf::loadView('laporan_perkembangan.cetak', compact('laporanPerkembangan'));

        // Download or stream PDF
        return $pdf->stream('laporan_perkembangan_' . $laporanPerkembangan->id . '.pdf');
    }
}
