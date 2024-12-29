<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    /**
     * Run the migrations.
     */
    public function up(): void
    {
        Schema::create('laporan_perkembangans', function (Blueprint $table) {
            $table->id();
            $table->foreignId('siswa_id')->constrained('siswas');  // Relates to 'siswas' table
            $table->text('deskripsi');
            $table->integer('nilai_matematika');
            $table->integer('nilai_ipa');
            $table->integer('nilai_ppkn');
            $table->integer('nilai_bahasa_indonesia');
            $table->integer('jumlah_hadir')->nullable();
            $table->integer('jumlah_tidak_hadir')->nullable();
            $table->text('catatan')->nullable();
            $table->date('tanggal');
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('laporan_perkembangans');
    }
};
