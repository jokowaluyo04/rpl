<x-app-layout>
    <x-slot name="header">
        <h2 class="font-semibold text-xl text-gray-800 dark:text-gray-200 leading-tight">
            <i class="fa-solid fa-list-check mr-2"></i>{{ __('Laporan Perkembangan') }}
        </h2>
    </x-slot>

    <div class="py-12">
        <div class="max-w-7xl mx-auto sm:px-6 lg:px-8">
            <div class="bg-white dark:bg-gray-800 overflow-hidden shadow-sm sm:rounded-lg p-6">
                <!-- Add Laporan Button -->
                <a href="{{ route('laporan_perkembangan.create') }}"
                    class="inline-flex items-center px-4 py-2 bg-gray-800 dark:bg-gray-200 border border-transparent rounded-md font-semibold text-xs text-white dark:text-gray-800 uppercase tracking-widest hover:bg-gray-700 dark:hover:bg-white focus:bg-gray-700 dark:focus:bg-white active:bg-gray-900 dark:active:bg-gray-300 focus:outline-none focus:ring-2 focus:ring-indigo-500 focus:ring-offset-2 dark:focus:ring-offset-gray-800 transition ease-in-out duration-150">
                    Tambah Laporan
                </a>

                <!-- Success Message -->
                @if (session('success'))
                    <div class="bg-green-100 border border-green-400 text-green-800 px-4 py-2 rounded my-4">
                        {{ session('success') }}
                    </div>
                @endif

                <!-- Table -->
                <div class="overflow-x-auto bg-white shadow-md rounded-lg mt-4">
                    <table class="min-w-full table-auto">
                        <thead>
                            <tr class="bg-gray-200 text-left">
                                <th class="py-3 px-4 text-sm font-medium text-gray-600">Tanggal</th>
                                <th class="py-3 px-4 text-sm font-medium text-gray-600">Nama Siswa</th>
                                <th class="py-3 px-4 text-sm font-medium text-gray-600">MTK</th>
                                <th class="py-3 px-4 text-sm font-medium text-gray-600">IPA</th>
                                <th class="py-3 px-4 text-sm font-medium text-gray-600">PPKN</th>
                                <th class="py-3 px-4 text-sm font-medium text-gray-600">B.Indonesia</th>
                                <th class="py-3 px-4 text-sm font-medium text-gray-600">Action</th>
                            </tr>
                        </thead>
                        <tbody>
                            @foreach ($laporanPerkembangans as $laporan)
                                <tr class="border-b hover:bg-gray-50">
                                    <td class="py-3 px-4 text-sm text-gray-800">{{ $laporan->tanggal }}</td>
                                    <td class="py-3 px-4 text-sm text-gray-800">{{ $laporan->siswa->nama }}</td>
                                    <td class="py-3 px-4 text-sm text-gray-800">{{ $laporan->nilai_matematika }}</td>
                                    <td class="py-3 px-4 text-sm text-gray-800">{{ $laporan->nilai_ipa }}</td>
                                    <td class="py-3 px-4 text-sm text-gray-800">{{ $laporan->nilai_ppkn }}</td>
                                    <td class="py-3 px-4 text-sm text-gray-800">{{ $laporan->nilai_bahasa_indonesia }}
                                    </td>
                                    <td class="py-3 px-4 text-sm">
                                        <a href="{{ route('laporan_perkembangan.edit', $laporan->id) }}"
                                            class="inline-flex items-center px-4 py-2 bg-amber-500 dark:bg-amber-200 border border-transparent rounded-md font-semibold text-xs text-white dark:text-amber-800 uppercase tracking-widest hover:bg-amber-600 dark:hover:bg-amber-300 focus:bg-amber-600 dark:focus:bg-amber-300 active:bg-amber-700 dark:active:bg-amber-400 focus:outline-none focus:ring-2 focus:ring-red-500 focus:ring-offset-2 dark:focus:ring-offset-gray-800 transition ease-in-out duration-150">
                                            Edit
                                        </a>
                                        <form action="{{ route('laporan_perkembangan.destroy', $laporan->id) }}"
                                            method="POST" style="display:inline;">
                                            @csrf
                                            @method('DELETE')
                                            <button type="submit"
                                                class="inline-flex items-center px-4 py-2 bg-red-500 dark:bg-red-200 border border-transparent rounded-md font-semibold text-xs text-white dark:text-red-800 uppercase tracking-widest hover:bg-red-600 dark:hover:bg-red-300 focus:bg-red-600 dark:focus:bg-red-300 active:bg-red-700 dark:active:bg-red-400 focus:outline-none focus:ring-2 focus:ring-red-500 focus:ring-offset-2 dark:focus:ring-offset-gray-800 transition ease-in-out duration-150">
                                                Delete
                                            </button>
                                        </form>
                                        <a href="{{ route('laporan_perkembangan.show', $laporan->id) }}"
                                            class="inline-flex items-center px-4 py-2 bg-sky-500 dark:bg-sky-200 border border-transparent rounded-md font-semibold text-xs text-white dark:text-sky-800 uppercase tracking-widest hover:bg-sky-600 dark:hover:bg-sky-300 focus:bg-sky-600 dark:focus:bg-sky-300 active:bg-sky-700 dark:active:bg-sky-400 focus:outline-none focus:ring-2 focus:ring-red-500 focus:ring-offset-2 dark:focus:ring-offset-gray-800 transition ease-in-out duration-150">
                                            Detail
                                        </a>
                                    </td>
                                </tr>
                            @endforeach
                        </tbody>
                    </table>
                </div>
            </div>
        </div>
    </div>
</x-app-layout>
