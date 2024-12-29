<x-app-layout>
    <x-slot name="header">
        <h2 class="font-semibold text-xl text-gray-800 dark:text-gray-200 leading-tight flex items-center">
            <i class="fa-solid fa-list-check mr-2 text-sky-500"></i>
            {{ __('Laporan Perkembangan') }}
            <i class="fa-solid fa-angle-right mx-2 text-gray-400"></i>
            <span class="text-sky-600">Detail Laporan Perkembangan</span>
        </h2>
    </x-slot>

    <div class="container mx-auto px-4 py-8">
        <div class="bg-white dark:bg-gray-800 shadow-lg rounded-lg p-8">
            <h2 class="text-2xl font-bold text-gray-800 dark:text-gray-100 mb-6 border-b pb-2">Informasi Siswa</h2>
            <div class="text-gray-700 dark:text-gray-300 mb-6">
                <p><strong>Nama:</strong> {{ $laporanPerkembangan->siswa->user->name }}</p>
                <p><strong>NIS:</strong> {{ $laporanPerkembangan->siswa->nis }}</p>
                <p><strong>Kelas:</strong> {{ $laporanPerkembangan->siswa->kelas }}</p>
            </div>

            <h2 class="text-2xl font-bold text-gray-800 dark:text-gray-100 mb-6 border-b pb-2">Detail Laporan</h2>
            <div class="text-gray-700 dark:text-gray-300 mb-6">
                <p><strong>Deskripsi:</strong> {{ $laporanPerkembangan->deskripsi }}</p>
                <p><strong>Nilai Matematika:</strong> {{ $laporanPerkembangan->nilai_matematika }}</p>
                <p><strong>Nilai IPA:</strong> {{ $laporanPerkembangan->nilai_ipa }}</p>
                <p><strong>Nilai PPKn:</strong> {{ $laporanPerkembangan->nilai_ppkn }}</p>
                <p><strong>Nilai Bahasa Indonesia:</strong> {{ $laporanPerkembangan->nilai_bahasa_indonesia }}</p>
            </div>

            <h2 class="text-2xl font-bold text-gray-800 dark:text-gray-100 mb-6 border-b pb-2">Kehadiran</h2>
            <div class="text-gray-700 dark:text-gray-300 mb-6">
                <p><strong>Jumlah Hadir:</strong> {{ $laporanPerkembangan->jumlah_hadir }}</p>
                <p><strong>Jumlah Tidak Hadir:</strong> {{ $laporanPerkembangan->jumlah_tidak_hadir }}</p>
            </div>

            <h2 class="text-2xl font-bold text-gray-800 dark:text-gray-100 mb-6 border-b pb-2">Informasi Tambahan</h2>
            <div class="text-gray-700 dark:text-gray-300">
                <p><strong>Catatan:</strong> {{ $laporanPerkembangan->catatan }}</p>
                <p><strong>Tanggal:</strong> {{ $laporanPerkembangan->tanggal }}</p>
            </div>

            <div class="flex justify-between items-center mt-10">
                <a href="{{ route('laporan_perkembangan.index') }}"
                   class="inline-flex items-center px-6 py-3 bg-gray-800 dark:bg-gray-200 text-white dark:text-gray-800 font-medium text-sm uppercase tracking-wide rounded-lg hover:bg-gray-700 dark:hover:bg-gray-300 transition">
                    <i class="fa-solid fa-arrow-left mr-2"></i>Kembali
                </a>
                <a href="{{ route('laporan_perkembangan.cetak', $laporanPerkembangan->id) }}" target="_blank"
                   class="inline-flex items-center px-6 py-3 bg-sky-500 dark:bg-sky-200 text-white dark:text-sky-800 font-medium text-sm uppercase tracking-wide rounded-lg hover:bg-sky-600 dark:hover:bg-sky-300 transition">
                    <i class="fa-solid fa-print mr-2"></i>Cetak Laporan
                </a>
            </div>
        </div>
    </div>
</x-app-layout>
