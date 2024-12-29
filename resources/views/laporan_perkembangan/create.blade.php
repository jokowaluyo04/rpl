<x-app-layout>
    <x-slot name="header">
        <h2 class="font-semibold text-xl text-gray-800 dark:text-gray-200 leading-tight">
            <i class="fa-solid fa-list-check mr-2"></i>{{ __('Laporan Perkembangan') }}
            <i class="fa-solid fa-angle-right mx-2"></i>Tambah Laporan Perkembangan
        </h2>
    </x-slot>

    <div class="py-12">
        <div class="max-w-7xl mx-auto sm:px-6 lg:px-8">
            <div class="bg-white dark:bg-gray-800 overflow-hidden shadow-sm sm:rounded-lg p-6">
                <!-- Form -->
                <form action="{{ route('laporan_perkembangan.store') }}" method="POST"
                    class="bg-white p-6 rounded-lg shadow-md">
                    @csrf

                    <!-- Tanggal -->
                    <div class="mb-4">
                        <label for="tanggal" class="block text-sm font-medium text-gray-700">Tanggal</label>
                        <input type="date" name="tanggal"
                            class="mt-1 block w-full px-4 py-2 border border-gray-300 rounded-lg" required>
                    </div>

                    <!-- Siswa -->
                    <div class="mb-4">
                        <label for="siswa_id" class="block text-sm font-medium text-gray-700">Nama Siswa</label>
                        <select name="siswa_id" class="mt-1 block w-full px-4 py-2 border border-gray-300 rounded-lg"
                            required>
                            @foreach ($siswas as $siswa)
                                <option value="{{ $siswa->id }}">{{ $siswa->nama }}</option>
                            @endforeach
                        </select>
                    </div>

                    <!-- Deskripsi -->
                    <div class="mb-4">
                        <label for="deskripsi" class="block text-sm font-medium text-gray-700">Deskripsi</label>
                        <textarea name="deskripsi" class="mt-1 block w-full px-4 py-2 border border-gray-300 rounded-lg" required></textarea>
                    </div>

                    <!-- Nilai Matematika -->
                    <div class="mb-4">
                        <label for="nilai_matematika" class="block text-sm font-medium text-gray-700">Nilai
                            Matematika</label>
                        <input type="number" name="nilai_matematika"
                            class="mt-1 block w-full px-4 py-2 border border-gray-300 rounded-lg" required>
                    </div>

                    <!-- Nilai IPA -->
                    <div class="mb-4">
                        <label for="nilai_ipa" class="block text-sm font-medium text-gray-700">Nilai IPA</label>
                        <input type="number" name="nilai_ipa"
                            class="mt-1 block w-full px-4 py-2 border border-gray-300 rounded-lg" required>
                    </div>

                    <!-- Nilai PPKN -->
                    <div class="mb-4">
                        <label for="nilai_ppkn" class="block text-sm font-medium text-gray-700">Nilai PPKN</label>
                        <input type="number" name="nilai_ppkn"
                            class="mt-1 block w-full px-4 py-2 border border-gray-300 rounded-lg" required>
                    </div>

                    <!-- Nilai Bahasa Indonesia -->
                    <div class="mb-4">
                        <label for="nilai_bahasa_indonesia" class="block text-sm font-medium text-gray-700">Nilai Bahasa
                            Indonesia</label>
                        <input type="number" name="nilai_bahasa_indonesia"
                            class="mt-1 block w-full px-4 py-2 border border-gray-300 rounded-lg" required>
                    </div>

                    <!-- Jumlah Hadir -->
                    <div class="mb-4">
                        <label for="jumlah_hadir" class="block text-sm font-medium text-gray-700">Jumlah Hadir</label>
                        <input type="number" name="jumlah_hadir"
                            class="mt-1 block w-full px-4 py-2 border border-gray-300 rounded-lg">
                    </div>

                    <!-- Jumlah Tidak Hadir -->
                    <div class="mb-4">
                        <label for="jumlah_tidak_hadir" class="block text-sm font-medium text-gray-700">Jumlah Tidak
                            Hadir</label>
                        <input type="number" name="jumlah_tidak_hadir"
                            class="mt-1 block w-full px-4 py-2 border border-gray-300 rounded-lg">
                    </div>

                    <!-- Catatan -->
                    <div class="mb-4">
                        <label for="catatan" class="block text-sm font-medium text-gray-700">Catatan</label>
                        <textarea name="catatan" class="mt-1 block w-full px-4 py-2 border border-gray-300 rounded-lg"></textarea>
                    </div>

                    <!-- Submit Button -->
                    <button type="submit"
                        class="inline-flex items-center justify-center px-4 py-2 bg-gray-800 dark:bg-gray-200 border border-transparent rounded-md font-semibold text-xs text-white dark:text-gray-800 uppercase tracking-widest hover:bg-gray-700 dark:hover:bg-white focus:bg-gray-700 dark:focus:bg-white active:bg-gray-900 dark:active:bg-gray-300 focus:outline-none focus:ring-2 focus:ring-indigo-500 focus:ring-offset-2 dark:focus:ring-offset-gray-800 transition ease-in-out duration-150">
                        Simpan
                    </button>
                </form>
            </div>
        </div>
    </div>
</x-app-layout>
