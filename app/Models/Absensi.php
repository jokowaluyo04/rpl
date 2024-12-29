<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Absensi extends Model
{
    use HasFactory;

    protected $fillable = [
        'tanggal',
        'siswa_id',
        'kelas',
        'status',
        'keterangan'
    ];

    // Relationship with Siswa model
    public function siswa()
    {
        return $this->belongsTo(Siswa::class);
    }
}
