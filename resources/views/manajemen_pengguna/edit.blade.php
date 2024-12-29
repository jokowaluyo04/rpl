<x-app-layout>
    <x-slot name="header">
        <h2 class="font-semibold text-xl text-gray-800 dark:text-gray-200 leading-tight">
            <i class="fa-solid fa-users mr-2"></i>{{ __('Manajemen User') }}
            <i class="fa-solid fa-angle-right mx-2"></i>Edit User
        </h2>
    </x-slot>

    <div class="py-12">
        <div class="max-w-7xl mx-auto sm:px-6 lg:px-8">
            <div class="bg-white dark:bg-gray-800 overflow-hidden shadow-sm sm:rounded-lg p-6">
                <!-- Form -->
                <form action="{{ route('manajemen_pengguna.update', $manajemen_pengguna->id) }}" method="POST"
                    class="bg-white p-6 rounded-lg shadow-md">
                    @csrf
                    @method('PUT')

                    <!-- Nama -->
                    <div class="mb-4">
                        <label for="name" class="block text-sm font-medium text-gray-700">Nama</label>
                        <input type="text" name="name" value="{{ $manajemen_pengguna->name }}"
                            class="mt-1 block w-full px-4 py-2 border border-gray-300 rounded-lg" required>
                    </div>

                    <!-- Email -->
                    <div class="mb-4">
                        <label for="email" class="block text-sm font-medium text-gray-700">Email</label>
                        <input type="email" name="email" value="{{ $manajemen_pengguna->email }}"
                            class="mt-1 block w-full px-4 py-2 border border-gray-300 rounded-lg" required>
                    </div>

                    <!-- Password -->
                    <div class="mb-4">
                        <label for="password" class="block text-sm font-medium text-gray-700">Password</label>
                        <input type="password" name="password"
                            class="mt-1 block w-full px-4 py-2 border border-gray-300 rounded-lg" required>
                    </div>

                    <!-- Password Confirmation -->
                    <div class="mb-4">
                        <label for="password_confirmation" class="block text-sm font-medium text-gray-700">Konfirmasi
                            Password</label>
                        <input type="password" name="password_confirmation"
                            class="mt-1 block w-full px-4 py-2 border border-gray-300 rounded-lg" required>
                    </div>

                    <!-- Roles -->
                    <div class="mb-4">
                        <label for="role" class="block text-sm font-medium text-gray-700">Role</label>
                        <select name="role" class="mt-1 block w-full px-4 py-2 border border-gray-300 rounded-lg"
                            required>
                            <option value="siswa" @if (old('role', $manajemen_pengguna->role) == 'siswa') selected @endif>Siswa</option>
                            <option value="pengajar" @if (old('role', $manajemen_pengguna->role) == 'pengajar') selected @endif>Pengajar</option>
                            <option value="pengelola" @if (old('role', $manajemen_pengguna->role) == 'pengelola') selected @endif>Pengelola
                            </option>
                        </select>
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
