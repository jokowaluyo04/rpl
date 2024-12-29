<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Siswa extends Model
{
    protected $table = 'siswas';

    protected $fillable = [
        'user_id',
        'nis',
        'kelas',
        'alamat',
        'jenis_kelamin',
        'no_hp',
    ];

    // Relationship with User model
    public function user()
    {
        return $this->belongsTo(User::class);
    }
}
