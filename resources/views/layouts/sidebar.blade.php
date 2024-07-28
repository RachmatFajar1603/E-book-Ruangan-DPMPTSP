<main class="p-4 sm:ml-64">
    <!-- Navbar -->
    <div class="bg-white p-2 rounded-md shadow-md flex justify-between items-center">
        <div class="relative flex items-center ml-auto">
            <img src="/images/profile.svg" alt="Profile Image" class="w-12 h-12 rounded-full object-cover cursor-pointer" onclick="toggleDropdown()">
            <div id="profileDropdown" class="hidden absolute right-0 mt-12 w-48 bg-white rounded-md shadow-lg z-50">
                <div class="px-4 py-2">
                    <div class="flex items-center">
                        <img src="/images/profile.svg" alt="Profile Image" class="w-8 h-8 rounded-full object-cover">
                        <div class="ml-2">
                            <p class="text-gray-800 font-semibold">AdminSiparu</p>
                            <p class="text-gray-600 text-sm">User</p>
                        </div>
                    </div>
                </div>
                <div class="border-t border-gray-200"></div>
                <a href="#" class="block px-4 py-2 text-gray-800 hover:bg-gray-200 flex items-center">
                    <i class="ri-user-line mr-2"></i> Profil Saya
                </a>
                <a href="#" class="block px-4 py-2 text-gray-800 hover:bg-gray-200 flex items-center">
                    <i class="ri-settings-3-line mr-2"></i> Pengaturan
                </a>
                <form method="POST" action="{{ route('logout') }}">
                    @csrf
                    <a href="{{ route('logout') }}" class="block px-4 py-2 text-gray-800 hover:bg-gray-200 flex items-center" onclick="event.preventDefault(); this.closest('form').submit();">
                        <i class="ri-logout-box-line mr-2"></i> Keluar
                    </a>
                </form>
                </a>
            </div>
        </div>
    </div>
        
    <button data-drawer-target="default-sidebar" data-drawer-toggle="default-sidebar" aria-controls="default-sidebar" type="button" class="inline-flex items-center p-2 mt-2 ms-3 text-sm text-gray-500 rounded-lg sm:hidden hover:bg-gray-100 focus:outline-none focus:ring-2 focus:ring-gray-200 dark:text-gray-400 dark:hover:bg-gray-700 dark:focus:ring-gray-600">
        <span class="sr-only">Open sidebar</span>
        <svg class="w-6 h-6" aria-hidden="true" fill="currentColor" viewBox="0 0 20 20" xmlns="http://www.w3.org/2000/svg">
            <path clip-rule="evenodd" fill-rule="evenodd" d="M2 4.75A.75.75 0 012.75 4h14.5a.75.75 0 010 1.5H2.75A.75.75 0 012 4.75zm0 10.5a.75.75 0 01.75-.75h7.5a.75.75 0 010 1.5h-7.5a.75.75 0 01-.75-.75zM2 10a.75.75 0 01.75-.75h14.5a.75.75 0 010 1.5H2.75A.75.75 0 012 10z"></path>
        </svg>
    </button>
 
    <aside id="default-sidebar" class="fixed top-0 left-0 z-40 w-64 h-screen transition-transform -translate-x-full sm:translate-x-0 shadow-md" aria-label="Sidebar">
        <div class="h-full px-3 py-4 overflow-y-auto bg-white drop-shadow-xl">
            <div class="shrink-0 mt-8 flex items-center">
                <a href="{{ route('dashboard') }}">
                    <x-application-logo class="block h-9 w-auto fill-current text-gray-800 dark:text-gray-200" />
                </a>
            </div>

            @If (auth()->user()->can('view_beranda'))
            <p class="pt-16 ml-6 font-semibold text-gray-300">DASHBOARD</p>
            <div class="pt-5 ml-6">
                <ul class="space-y-2 font-medium">
                    <li>
                        <a wire:navigate href="/beranda" class="flex items-center p-2 text-gray-900 rounded-lg dark:text-white hover:bg-gray-100 dark:hover:bg-gray-700 group">
                            <i class="ri-database-line text-gray-500"></i>
                            <span class="ms-3 text-gray-500">Beranda</span>
                        </a>
                    </li>
                </ul>
            </div>    
            @endif
            
            @if (auth()->user()->can('view_datapegawai') || auth()->user()->can('view_dataruangan') || auth()->user()->can('view_datapengguna'))
            <p class="pt-16 ml-6 font-semibold text-gray-300">DATA MASTER</p>
            <div class="pt-5 ml-6">
            @if (auth()->user()->can('view_datapegawai'))
                <ul class="space-y-2 font-medium">
                    <li>
                        <a href="#" class="flex items-center p-2 text-gray-900 rounded-lg dark:text-white hover:bg-gray-100 dark:hover:bg-gray-700 group">
                            <i class="ri-database-line text-gray-500"></i>
                            <span class="ms-3 text-gray-500">Data Pegawai</span>
                        </a>
                    </li>
                </ul>
            @endif
            @if (auth()->user()->can('view_dataruangan'))
                <ul class="space-y-2 font-medium">
                    <li>
                        <a wire:navigate href="/dataruangan" class="flex items-center p-2 text-gray-900 rounded-lg dark:text-white hover:bg-gray-100 dark:hover:bg-gray-700 group">
                            <i class="ri-database-fill text-gray-500"></i>
                            <span class="ms-3 text-gray-500">Data Ruangan</span>
                        </a>
                    </li>
                </ul>
            @endif
            @if (auth()->user()->can('view_datapengguna'))
                <ul class="space-y-2 font-medium">
                    <li>
                        <a wire:navigate href="/datapengguna" class="flex items-center p-2 text-gray-900 rounded-lg dark:text-white hover:bg-gray-100 dark:hover:bg-gray-700 group">
                            <i class="ri-user-line text-gray-500"></i>
                            <span class="ms-3 text-gray-500">Data Pengguna</span>
                        </a>
                    </li>
                </ul>
            @endif
            </div>
            @endif
            <p class="pt-10 ml-6 font-semibold text-gray-300">PEMINJAMAN</p>
            <div class="pt-5 ml-6">
                <ul class="space-y-2 font-medium">
                    <li>
                        <a wire:navigate href="datapeminjaman" class="flex items-center p-2 text-gray-900 rounded-lg dark:text-white hover:bg-gray-100 dark:hover:bg-gray-700 group">
                            <i class="ri-calendar-2-line text-gray-500"></i>
                            <span class="ms-3 text-gray-500">Data Peminjaman</span>
                        </a>
                    </li>
                    <li>
                        <a href="pinjam-ruangan" class="flex items-center p-2 text-gray-900 rounded-lg dark:text-white hover:bg-gray-100 dark:hover:bg-gray-700 group">
                            <i class="ri-calendar-check-line text-gray-500"></i>
                            <span class="ms-3 text-gray-500">Pinjam Ruangan</span>
                        </a>
                    </li>
                    <li>
                        <a wire:navigate href="/peminjamansaya" class="flex items-center p-2 text-gray-900 rounded-lg dark:text-white hover:bg-gray-100 dark:hover:bg-gray-700 group">
                            <i class="ri-user-shared-2-fill text-gray-500"></i>
                            <span class="ms-3 text-gray-500">Peminjaman Saya</span>
                        </a>
                    </li>
                    <li>
                        <a wire:navigate href="/laporan" class="flex items-center p-2 text-gray-900 rounded-lg dark:text-white hover:bg-gray-100 dark:hover:bg-gray-700 group">
                            <i class="ri-file-3-line text-gray-500"></i>
                            <span class="ms-3 text-gray-500">Laporan</span>
                        </a>
                    </li>
                </ul>
            </div>
        </div>
    </aside>
</main>

<script>
    function toggleDropdown() {
        document.getElementById("profileDropdown").classList.toggle("hidden");
    }

    window.onclick = function(event) {
        if (!event.target.closest('.relative')) {
            var dropdowns = document.getElementById("profileDropdown");
            if (!dropdowns.classList.contains('hidden')) {
                dropdowns.classList.add('hidden');
            }
        }
    }
</script>

{{ $slot }}
