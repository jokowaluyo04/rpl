<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class LaporanPerkembangan extends Model
{
    use HasFactory;

    protected $fillable = [
        'siswa_id',
        'deskripsi',
        'nilai_matematika',
        'nilai_ipa',
        'nilai_ppkn',
        'nilai_bahasa_indonesia',
        'jumlah_hadir',
        'jumlah_tidak_hadir',
        'catatan',
        'tanggal',
    ];

    // Relationship with Siswa model
    public function siswa()
    {
        return $this->belongsTo(Siswa::class);
    }

    // Relationship with Absensi model (for jumlah_hadir and jumlah_tidak_hadir)
    public function absensi()
    {
        return $this->belongsToMany(Absensi::class, 'absensi_laporan', 'laporan_id', 'absensi_id');
    }
}
