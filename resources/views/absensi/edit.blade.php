<x-app-layout>
    <x-slot name="header">
        <h2 class="font-semibold text-xl text-gray-800 dark:text-gray-200 leading-tight">
            <i class="fa-solid fa-user-check mr-2"></i>{{ __('Absensi') }}
            <i class="fa-solid fa-angle-right mx-2"></i>Edit Absensi
        </h2>
    </x-slot>

    <div class="py-12">
        <div class="max-w-7xl mx-auto sm:px-6 lg:px-8">
            <div class="bg-white dark:bg-gray-800 overflow-hidden shadow-sm sm:rounded-lg p-6">
                <!-- Form -->
                <form action="{{ route('absensi.update', $absensi->id) }}" method="POST"
                    class="bg-white p-6 rounded-lg shadow-md">
                    @csrf
                    @method('PUT')

                    <!-- Tanggal -->
                    <div class="mb-4">
                        <label for="tanggal" class="block text-sm font-medium text-gray-700">Tanggal</label>
                        <input type="date" name="tanggal" value="{{ $absensi->tanggal }}"
                            class="mt-1 block w-full px-4 py-2 border border-gray-300 rounded-lg" required>
                    </div>

                    <!-- Siswa -->
                    <div class="mb-4">
                        <label for="siswa_id" class="block text-sm font-medium text-gray-700">Nama Siswa</label>
                        <select name="siswa_id" class="mt-1 block w-full px-4 py-2 border border-gray-300 rounded-lg"
                            required>
                            @foreach ($siswas as $siswa)
                                <option value="{{ $siswa->id }}" @if ($siswa->id == $absensi->siswa_id) selected @endif>
                                    {{ $siswa->user->name }}
                                </option>
                            @endforeach
                        </select>
                    </div>

                    <!-- Kelas -->
                    <div class="mb-4">
                        <label for="kelas" class="block text-sm font-medium text-gray-700">Kelas</label>
                        <select name="kelas" id="kelas"
                            class="mt-1 block w-full px-4 py-2 border border-gray-300 rounded-lg focus:ring-indigo-500 focus:border-indigo-500"
                            required>
                            <option value="Pagi" {{ old('kelas', $siswa->kelas ?? '') == 'Pagi' ? 'selected' : '' }}>
                                Pagi</option>
                            <option value="Sore" {{ old('kelas', $siswa->kelas ?? '') == 'Sore' ? 'selected' : '' }}>
                                Sore</option>
                            <option value="Malam" {{ old('kelas', $siswa->kelas ?? '') == 'Malam' ? 'selected' : '' }}>
                                Malam</option>
                        </select>
                    </div>

                    <!-- Status -->
                    <div class="mb-4">
                        <label for="status" class="block text-sm font-medium text-gray-700">Status</label>
                        <select name="status" class="mt-1 block w-full px-4 py-2 border border-gray-300 rounded-lg"
                            required>
                            <option value="Hadir" @if ($absensi->status == 'Hadir') selected @endif>Hadir</option>
                            <option value="Tidak Hadir" @if ($absensi->status == 'Tidak Hadir') selected @endif>Tidak Hadir
                            </option>
                            <option value="Izin" @if ($absensi->status == 'Izin') selected @endif>Izin</option>
                            <option value="Sakit" @if ($absensi->status == 'Sakit') selected @endif>Sakit</option>
                        </select>
                    </div>

                    <!-- Keterangan -->
                    <div class="mb-4">
                        <label for="keterangan" class="block text-sm font-medium text-gray-700">Keterangan</label>
                        <textarea name="keterangan" class="mt-1 block w-full px-4 py-2 border border-gray-300 rounded-lg">{{ $absensi->keterangan }}</textarea>
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

    {{-- <div class="container mx-auto px-4 py-8">

        <form action="{{ route('absensi.update', $absensi->id) }}" method="POST"
            class="bg-white p-6 rounded-lg shadow-md">
            @csrf
            @method('PUT')

            <div class="mb-4">
                <label for="tanggal" class="block text-sm font-medium text-gray-700">Tanggal</label>
                <input type="date" name="tanggal" value="{{ $absensi->tanggal }}"
                    class="mt-1 block w-full px-4 py-2 border border-gray-300 rounded-lg" required>
            </div>

            <div class="mb-4">
                <label for="siswa_id" class="block text-sm font-medium text-gray-700">Nama Siswa</label>
                <select name="siswa_id" class="mt-1 block w-full px-4 py-2 border border-gray-300 rounded-lg" required>
                    @foreach ($siswas as $siswa)
                        <option value="{{ $siswa->id }}" @if ($siswa->id == $absensi->siswa_id) selected @endif>
                            {{ $siswa->nama }}
                        </option>
                    @endforeach
                </select>
            </div>

            <div class="mb-4">
                <label for="kelas" class="block text-sm font-medium text-gray-700">Kelas</label>
                <input type="text" name="kelas" value="{{ $absensi->kelas }}"
                    class="mt-1 block w-full px-4 py-2 border border-gray-300 rounded-lg" required>
            </div>

            <div class="mb-4">
                <label for="status" class="block text-sm font-medium text-gray-700">Status</label>
                <select name="status" class="mt-1 block w-full px-4 py-2 border border-gray-300 rounded-lg" required>
                    <option value="Hadir" @if ($absensi->status == 'Hadir') selected @endif>Hadir</option>
                    <option value="Tidak Hadir" @if ($absensi->status == 'Tidak Hadir') selected @endif>Tidak Hadir</option>
                    <option value="Izin" @if ($absensi->status == 'Izin') selected @endif>Izin</option>
                    <option value="Sakit" @if ($absensi->status == 'Sakit') selected @endif>Sakit</option>
                </select>
            </div>

            <div class="mb-4">
                <label for="keterangan" class="block text-sm font-medium text-gray-700">Keterangan</label>
                <textarea name="keterangan" class="mt-1 block w-full px-4 py-2 border border-gray-300 rounded-lg">{{ $absensi->keterangan }}</textarea>
            </div>

            <button type="submit" class="btn btn-primary mt-3">Update</button>
        </form>
    </div> --}}
</x-app-layout>
