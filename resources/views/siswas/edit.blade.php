<x-app-layout>
    <x-slot name="header">
        <h2 class="font-semibold text-xl text-gray-800 dark:text-gray-200 leading-tight">
            <i class="fa-solid fa-user-graduate mr-2"></i>{{ __('Siswa') }}
            <i class="fa-solid fa-angle-right mx-2"></i>Edit Siswa
        </h2>
    </x-slot>

    <div class="py-12">
        <div class="max-w-7xl mx-auto sm:px-6 lg:px-8">
            <div class="bg-white dark:bg-gray-800 overflow-hidden shadow-sm sm:rounded-lg p-6">
                <!-- Form -->
                <form action="{{ route('siswas.update', $siswa->id) }}" method="POST"
                    class="bg-white p-6 rounded-lg shadow-md">
                    @csrf
                    @method('PUT')

                    <!-- User ID -->
                    <div class="mb-4">
                        <label for="user_id" class="block text-sm font-medium text-gray-700">Nama</label>
                        <select name="user_id" id="user_id"
                            class="mt-1 block w-full px-4 py-2 border border-gray-300 rounded-lg focus:ring-indigo-500 focus:border-indigo-500"
                            required>
                            @foreach ($siswaUsers as $user)
                                <option value="{{ $user->id }}"
                                    {{ $user->id == $siswa->user_id ? 'selected' : '' }}>
                                    {{ $user->name }}
                                </option>
                            @endforeach
                        </select>
                    </div>

                    <!-- NIS -->
                    <div class="mb-4">
                        <label for="nis" class="block text-sm font-medium text-gray-700">NIS</label>
                        <input type="text" name="nis" id="nis"
                            class="mt-1 block w-full px-4 py-2 border border-gray-300 rounded-lg focus:ring-indigo-500 focus:border-indigo-500"
                            value="{{ old('nis', $siswa->nis) }}" required>
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

                    <!-- Alamat -->
                    <div class="mb-4">
                        <label for="alamat" class="block text-sm font-medium text-gray-700">Alamat</label>
                        <textarea name="alamat" id="alamat"
                            class="mt-1 block w-full px-4 py-2 border border-gray-300 rounded-lg focus:ring-indigo-500 focus:border-indigo-500"
                            required>{{ old('alamat', $siswa->alamat) }}</textarea>
                    </div>

                    <!-- Jenis Kelamin -->
                    <div class="mb-4">
                        <label for="jenis_kelamin" class="block text-sm font-medium text-gray-700">Jenis Kelamin</label>
                        <select name="jenis_kelamin" id="jenis_kelamin"
                            class="mt-1 block w-full px-4 py-2 border border-gray-300 rounded-lg focus:ring-indigo-500 focus:border-indigo-500"
                            required>
                            <option value="L"
                                {{ old('jenis_kelamin', $siswa->jenis_kelamin) == 'L' ? 'selected' : '' }}>
                                Laki-laki</option>
                            <option value="P"
                                {{ old('jenis_kelamin', $siswa->jenis_kelamin) == 'P' ? 'selected' : '' }}>
                                Perempuan</option>
                        </select>
                    </div>

                    <!-- No HP -->
                    <div class="mb-4">
                        <label for="no_hp" class="block text-sm font-medium text-gray-700">No HP</label>
                        <input type="text" name="no_hp" id="no_hp"
                            class="mt-1 block w-full px-4 py-2 border border-gray-300 rounded-lg focus:ring-indigo-500 focus:border-indigo-500"
                            value="{{ old('no_hp', $siswa->no_hp) }}">
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
