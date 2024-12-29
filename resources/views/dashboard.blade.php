<x-app-layout>
    <x-slot name="header">
        <h2 class="font-semibold text-xl text-gray-800 dark:text-gray-200 leading-tight">
            <i class="fa-solid fa-house mr-2"></i>{{ __('Beranda') }}
        </h2>
    </x-slot>

    <div class="py-12">
        <div class="max-w-7xl mx-auto sm:px-6 lg:px-8">
            <div class="bg-white dark:bg-gray-800 overflow-hidden shadow-sm sm:rounded-lg">
                <div class="p-6 text-gray-900 dark:text-gray-100 text-center">
                    <h1 class="text-3xl uppercase">
                        Selamat Datang di
                        <span class="font-bold">BIMBEL
                            G109
                        </span>
                    </h1>
                    <p class="mt-4">Platform terbaik untuk mendukung belajar siswa anda</p>
                </div>
            </div>
            <div class="grid grid-cols-3 gap-4 mt-4">
                <div class="bg-white dark:bg-gray-800 overflow-hidden shadow-sm sm:rounded-lg">
                    <div class="p-6 text-gray-900 dark:text-gray-100 text-center flex justify-center items-center">
                        <i class="fa-solid fa-user-graduate text-5xl"></i>
                        <div class="pl-6 text-left">
                            <h1 class="text-4xl font-bold">{{ $totalSiswa }}</h1>
                            <p>Total Siswa</p>
                        </div>
                    </div>
                </div>
                <div class="bg-white dark:bg-gray-800 overflow-hidden shadow-sm sm:rounded-lg">
                    <div class="p-6 text-gray-900 dark:text-gray-100 text-center flex justify-center items-center">
                        <i class="fa-solid fa-school text-5xl"></i>
                        <div class="pl-6 text-left">
                            <h1 class="text-4xl font-bold">3</h1>
                            <p>Total Kelas</p>
                        </div>
                    </div>
                </div>
                <div class="bg-white dark:bg-gray-800 overflow-hidden shadow-sm sm:rounded-lg">
                    <div class="p-6 text-gray-900 dark:text-gray-100 text-center flex justify-center items-center">
                        <i class="fa-solid fa-user-check text-5xl"></i>
                        <div class="pl-6 text-left">
                            <h1 class="text-4xl font-bold">3</h1>
                            <p>Pengguna Aktif</p>
                        </div>
                    </div>
                </div>
            </div>
            <div class="bg-white dark:bg-gray-800 overflow-hidden shadow-sm sm:rounded-lg mt-4">
                <div class="p-6 text-gray-900 dark:text-gray-100 text-center">
                    <h1 class="text-xl uppercase font-bold">
                        Tentang Kami
                    </h1>
                    <p class="mt-4">
                        Kami menyediakan layanan pembelajaran terbaik untuk mendukung siswa mencapai
                        prestasi maksimal. Dengan Pengajar yang berpengalaman, kami berkomitmen untuk memberikan
                        pengalaman belajar yang efektif dan menyenangkan.
                    </p>
                </div>
            </div>
        </div>
    </div>
</x-app-layout>
