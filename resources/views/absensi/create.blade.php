<x-app-layout>
    <x-slot name="header">
        <h2 class="font-semibold text-xl text-gray-800 dark:text-gray-200 leading-tight">
            <i class="fa-solid fa-user-check mr-2"></i>{{ __('Absensi') }}
            <i class="fa-solid fa-angle-right mx-2"></i>Tambah Absensi
        </h2>
    </x-slot>

    <div class="py-12">
        <div class="max-w-7xl mx-auto sm:px-6 lg:px-8">
            <div class="bg-white dark:bg-gray-800 overflow-hidden shadow-sm sm:rounded-lg p-6">
                <!-- Form -->
                <form action="{{ route('absensi.store') }}" method="POST" class="bg-white p-6 rounded-lg shadow-md">
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
                                <option value="{{ $siswa->id }}">{{ $siswa->user->name }}</option>
                            @endforeach
                        </select>
                    </div>

                    <!-- Kelas -->
                    <div class="mb-4">
                        <label for="kelas" class="block text-sm font-medium text-gray-700">Kelas</label>
                        <select name="kelas" id="kelas"
                            class="mt-1 block w-full px-4 py-2 border border-gray-300 rounded-lg focus:ring-indigo-500 focus:border-indigo-500"
                            required>
                            <option value="Pagi">
                                Pagi</option>
                            <option value="Sore">
                                Sore</option>
                            <option value="Malam">
                                Malam</option>
                        </select>
                    </div>

                    <!-- Status -->
                    <div class="mb-4">
                        <label for="status" class="block text-sm font-medium text-gray-700">Status</label>
                        <select name="status" class="mt-1 block w-full px-4 py-2 border border-gray-300 rounded-lg"
                            required>
                            <option value="Hadir">Hadir</option>
                            <option value="Tidak Hadir">Tidak Hadir</option>
                            <option value="Izin">Izin</option>
                            <option value="Sakit">Sakit</option>
                        </select>
                    </div>

                    <!-- Keterangan -->
                    <div class="mb-4">
                        <label for="keterangan" class="block text-sm font-medium text-gray-700">Keterangan</label>
                        <textarea name="keterangan" class="mt-1 block w-full px-4 py-2 border border-gray-300 rounded-lg"></textarea>
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
