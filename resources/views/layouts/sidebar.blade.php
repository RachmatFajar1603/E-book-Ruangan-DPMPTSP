<main class="p-4 sm:ml-64 font-poppins">
    <!-- Navbar -->
    <div class="bg-white p-2 rounded-md shadow-md flex justify-between items-center">
        <button id="hamburger-button" type="button"
            class="inline-flex items-center p-2 text-sm text-gray-500 rounded-lg sm:hidden hover:bg-gray-100 focus:outline-none focus:ring-2 focus:ring-gray-200 dark:text-gray-400 dark:hover:bg-gray-700 dark:focus:ring-gray-600">
            <span class="sr-only">Toggle sidebar</span>
            <svg class="w-6 h-6" aria-hidden="true" fill="currentColor" viewBox="0 0 20 20"
                xmlns="http://www.w3.org/2000/svg">
                <path clip-rule="evenodd" fill-rule="evenodd"
                    d="M2 4.75A.75.75 0 012.75 4h14.5a.75.75 0 010 1.5H2.75A.75.75 0 012 4.75zm0 10.5a.75.75 0 01.75-.75h7.5a.75.75 0 010 1.5h-7.5a.75.75 0 01-.75-.75zM2 10a.75.75 0 01.75-.75h14.5a.75.75 0 010 1.5H2.75A.75.75 0 012 10z">
                </path>
            </svg>
        </button>
        <div class="relative flex items-center ml-auto">
            <img src="/images/profile.svg" alt="Profile Image"
                class="w-12 h-12 rounded-full object-cover cursor-pointer" onclick="toggleDropdown()">
            <div id="profileDropdown" class="hidden absolute right-0 mt-12 w-48 bg-white rounded-md shadow-lg z-50">
                <div class="px-4 py-2">
                    <div class="flex items-center">
                        <img src="/images/profile.svg" alt="Profile Image" class="w-8 h-8 rounded-full object-cover">
                        <div class="ml-2">
                            <p class="text-gray-800 font-semibold"> {{ auth()->user()->nama }} </p>
                            <p class="text-gray-600 text-sm">
                                @if (auth()->user()->hasRole('admin'))
                                    Administrator
                                @elseif(auth()->user()->hasRole('user'))
                                    Regular User
                                @else
                                    No Specific Role
                                @endif
                            </p>
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
                    <a href="{{ route('logout') }}"
                        class="block px-4 py-2 text-gray-800 hover:bg-gray-200 flex items-center"
                        onclick="event.preventDefault(); this.closest('form').submit();">
                        <i class="ri-logout-box-line mr-2"></i> Keluar
                    </a>
                </form>
                </a>
            </div>
        </div>
    </div>

    <aside id="default-sidebar"
        class="fixed top-0 left-0 z-40 w-64 h-screen transition-transform -translate-x-full sm:translate-x-0 shadow-md"
        aria-label="Sidebar">
        <div class="h-full px-3 py-4 overflow-y-auto bg-white drop-shadow-xl">
            <div class="shrink-0 mt-8 flex items-center">
                <a href="{{ route('dashboard') }}">
                    <x-application-logo class="block h-9 w-auto fill-current text-gray-800 dark:text-gray-200" />
                </a>
            </div>
            @if (auth()->user()->can('view_beranda'))
                <p class="pt-16 ml-6 font-semibold text-gray-400">DASHBOARD</p>
                <div class="pt-4 ml-6">
                    <ul class="space-y-2 font-medium">
                        <li>
                            <a wire:navigate href="/beranda" class="{{ $isPage == "beranda" ? 'flex items-center p-2 text-white rounded-lg dark:text-white bg-gray-500 dark:bg-gray-700 group' : 'flex items-center p-2 text-gray-600 rounded-lg dark:text-white hover:bg-gray-100 dark:hover:bg-gray-700 group' }}">
                                <i class="ri-database-line mr-3 {{ $isPage == "beranda" ? 'text-white' : 'text-gray-600' }}"></i>
                              Beranda
                            </a>
                        </li>
                        <li>
                            <a wire:navigate href="/pengumuman-manager" class="{{ $isPage == "pengumuman-manager" ? 'flex items-center p-2 text-white rounded-lg dark:text-white bg-gray-500 dark:bg-gray-700 group' : 'flex items-center p-2 text-gray-600 rounded-lg dark:text-white hover:bg-gray-100 dark:hover:bg-gray-700 group' }}">
                                <i class="ri-information-line mr-3 {{ $isPage == "pengumuman-manager" ? 'text-white' : 'text-gray-600' }}"></i>
                               Pengumuman
                            </a>
                        </li>
                        <li>
                            <a wire:navigate href="/contact-messages" class="{{ $isPage == "contact-messages" ? 'flex items-center p-2 text-white rounded-lg dark:text-white bg-gray-500 dark:bg-gray-700 group' : 'flex items-center p-2 text-gray-600 rounded-lg dark:text-white hover:bg-gray-100 dark:hover:bg-gray-700 group' }}">
                                <i class="ri-message-line mr-3 {{ $isPage == "contact-messages" ? 'text-white' : 'text-gray-600' }}"></i>
                               Saran
                            </a>
                        </li>
                    </ul>
                </div>
            @endif


            @if (auth()->user()->can('view_datapegawai') ||
                    auth()->user()->can('view_dataruangan') ||
                    auth()->user()->can('view_datapengguna'))
                <p class="pt-10  ml-6 font-semibold text-gray-400">DATA MASTER</p>
                <div class="pt-5 ml-6 space-y-2">
                    @if (auth()->user()->can('view_datapegawai'))
                        <ul class="space-y-4 font-medium">
                            <li>
                                <a wire:navigate href="/pegawai" class="{{ $isPage == "pegawai" ? 'flex items-center p-2 text-white rounded-lg dark:text-white bg-gray-500 dark:bg-gray-700 group' : 'flex items-center p-2 text-gray-600 rounded-lg dark:text-white hover:bg-gray-100 dark:hover:bg-gray-700 group' }}">
                                    <i class="mr-3 ri-database-line {{ $isPage == "pegawai" ? 'text-white' : 'text-gray-600' }}"></i>
                                    Data Pegawai
                                </a>
                            </li>
                        </ul>
                    @endif
                    @if (auth()->user()->can('view_dataruangan'))
                        <ul class="space-y-4 font-medium">
                            <li>
                                <a wire:navigate href="/dataruangan"
                                    class="{{ $isPage == "dataruangan" ? 'flex items-center p-2 text-white rounded-lg dark:text-white bg-gray-500 dark:bg-gray-700 group' : 'flex items-center p-2 text-gray-600 rounded-lg dark:text-white hover:bg-gray-100 dark:hover:bg-gray-700 group' }}">
                                    <i class="ri-database-fill mr-3 {{ $isPage == "dataruangan" ? 'text-white' : 'text-gray-600' }}"></i>
                                    Data Ruangan
                                </a>
                            </li>
                        </ul>
                    @endif
                   <!-- resources/views/livewire/admin/pengguna/pengguna-list.blade.php -->
                    <div>
                        @if (auth()->user()->can('view_datapengguna'))
                            <ul class="space-y-4 font-medium">
                                <li>
                                    <a wire:navigate href="/datapengguna"
                                        class="{{ $isPage == "datapengguna" ? 'flex items-center p-2 text-white rounded-lg dark:text-white bg-gray-500 dark:bg-gray-700 group' : 'flex items-center p-2 text-gray-600 rounded-lg dark:text-white hover:bg-gray-100 dark:hover:bg-gray-700 group' }}">
                                        <i class="ri-user-line mr-3 {{ $isPage == "datapengguna" ? 'text-white' : 'text-gray-600' }}"></i>
                                    Data Pengguna
                                    </a>
                                </li>
                            </ul>
                        @endif
                    </div>
                </div>
            @endif
            <p class="pt-10 ml-6 font-semibold text-gray-400">PEMINJAMAN</p>
            <div class="pt-5 ml-6">
                <ul class="space-y-2 font-medium">
                    <li>
                        <a wire:navigate href="/datapeminjaman"
                            class="{{ $isPage == "datapeminjaman" ? 'flex items-center p-2 text-white rounded-lg dark:text-white bg-gray-500 dark:bg-gray-700 group' : 'flex items-center p-2 text-gray-600 rounded-lg dark:text-white hover:bg-gray-100 dark:hover:bg-gray-700 group' }}">
                            <i class="ri-calendar-2-line mr-3 {{ $isPage == "datapeminjaman" ? 'text-white' : 'text-gray-600' }}"></i>
                            Data Peminjaman
                        </a>
                    </li>
                    <li>
                        <a wire:navigate href="/pinjam-ruangan"
                            class="{{ $isPage == "pinjam-ruangan" ? 'flex items-center p-2 text-white rounded-lg dark:text-white bg-gray-500 dark:bg-gray-700 group' : 'flex items-center p-2 text-gray-600 rounded-lg dark:text-white hover:bg-gray-100 dark:hover:bg-gray-700 group' }}">
                            <i class="ri-calendar-check-line mr-3 {{ $isPage == "pinjam-ruangan" ? 'text-white' : 'text-gray-600' }}"></i>
                            Pinjam Ruangan
                        </a>
                    </li>
                    <li>
                        <a wire:navigate href="/peminjamansaya"
                            class="{{ $isPage == "peminjamansaya" ? 'flex items-center p-2 text-white rounded-lg dark:text-white bg-gray-500 dark:bg-gray-700 group' : 'flex items-center p-2 text-gray-600 rounded-lg dark:text-white hover:bg-gray-100 dark:hover:bg-gray-700 group' }}">
                            <i class="ri-user-shared-2-fill mr-3 {{ $isPage == "peminjamansaya" ? 'text-white' : 'text-gray-600' }}"></i>
                           Peminjaman Saya
                        </a>
                    </li>
                    <li>
                        <a wire:navigate href="/laporan"
                            class="{{ $isPage == "laporan" ? 'flex items-center p-2 text-white rounded-lg dark:text-white bg-gray-500 dark:bg-gray-700 group' : 'flex items-center p-2 text-gray-600 rounded-lg dark:text-white hover:bg-gray-100 dark:hover:bg-gray-700 group' }}">
                            <i class="ri-file-3-line mr-3 {{ $isPage == "laporan" ? 'text-white' : 'text-gray-600' }}"></i>
                           Laporan
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

    function toggleSidebar() {
        document.getElementById("default-sidebar").classList.toggle("-translate-x-full");
    }

    document.getElementById("hamburger-button").addEventListener("click", toggleSidebar);

    window.onclick = function(event) {
        if (!event.target.closest('.relative')) {
            var dropdowns = document.getElementById("profileDropdown");
            if (!dropdowns.classList.contains('hidden')) {
                dropdowns.classList.add('hidden');
            }
        }
    }
</script>