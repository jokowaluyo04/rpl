<aside class="bg-white dark:bg-gray-800 border-b border-r border-gray-100 dark:border-gray-700 w-1/6 fixed h-screen">
    <div class="bg-white dark:bg-gray-800 shadow border-b border-gray-100 dark:border-gray-700">
        <div class="max-w-7xl mx-auto py-6 px-4 sm:px-6 lg:px-6 text-white font-bold">
            <h1>BIMBEL G109</h1>
        </div>
    </div>

    <div class="bg-white dark:bg-gray-800">
        <div class="max-w-7xl mx-auto py-6 px-4 sm:px-6 lg:px-6 text-white">
            <h1>Hallo <span class="font-bold">{{ Auth::user()->name }}</span></h1>
            <p><span>{{ Auth::user()->role }}</span></p>
        </div>
    </div>

    <div class="bg-white dark:bg-gray-800">
        <ul class="max-w-7xl mx-auto py-6 px-4 sm:px-6 lg:px-4 text-white">
            <li>
                <a class="my-2 px-2 py-3 rounded flex items-center hover:bg-gray-900 hover:cursor-pointer"
                    href="/dashboard">
                    <i class="fa-solid fa-house mr-2"></i>Beranda
                </a>
            </li>
            <li>
                <a class="my-2 px-2 py-3 rounded flex items-center hover:bg-gray-900 hover:cursor-pointer"
                    href="/siswas">
                    <i class="fa-solid fa-user-graduate mr-2"></i>Siswa
                </a>
            </li>
            <li class="{{ Auth::user()->role == 'siswa' ? 'hidden' : '' }}">
                <a class="my-2 px-2 py-3 rounded flex items-center hover:bg-gray-900 hover:cursor-pointer"
                    href="/absensi">
                    <i class="fa-solid fa-user-check mr-2"></i>Absensi
                </a>
            </li>
            <li>
                <a class="my-2 px-2 py-3 rounded flex items-center hover:bg-gray-900 hover:cursor-pointer"
                    href="/laporan_perkembangan">
                    <i class="fa-solid fa-list-check mr-2"></i>Laporan
                </a>
            </li>
            <li>
                <a class="my-2 px-2 py-3 rounded flex items-center hover:bg-gray-900 hover:cursor-pointer"
                    href="{{ route('profile.edit') }}">
                    <i class="fa-solid fa-user-pen mr-2"></i>Profil
                </a>
            </li>
            <li class="{{ Auth::user()->role == 'siswa' || Auth::user()->role == 'pengajar' ? 'hidden' : '' }}">
                <a class="my-2 px-2 py-3 rounded flex items-center hover:bg-gray-900 hover:cursor-pointer"
                    href="/manajemen_pengguna">
                    <i class="fa-solid fa-users mr-2"></i>Manajemen User
                </a>
            </li>
            <li>
                <form method="POST" action="{{ route('logout') }}">
                    <a class="my-2 p-3 rounded flex items-center hover:bg-gray-900 hover:cursor-pointer" href="#"
                        onclick="event.preventDefault(); this.closest('form').submit();">
                        <i class="fa-solid fa-right-from-bracket mr-2"></i>Logout
                    </a>
                    @csrf
                </form>
            </li>
        </ul>
    </div>
</aside>
