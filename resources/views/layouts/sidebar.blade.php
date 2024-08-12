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
                                @if (auth()->user()->hasRole('superadmin'))
                                    Super Admin
                                @elseif (auth()->user()->hasRole('adminbidang'))
                                    Admin Bidang
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
    <!-- Sidebar -->
    <aside id="sidebar" class="fixed inset-y-0 left-0 z-40 w-64 h-screen transform -translate-x-full transition-transform duration-300 bg-white shadow-md sm:translate-x-0">
        <div class="h-full mt-5 px-3 py-4 overflow-y-auto drop-shadow-xl">
            <div class="flex justify-end">
                <button id="closeSidebarButton" class="text-gray-800 focus:outline-none sm:hidden">
                    <svg class="w-6 h-6" fill="none" stroke="currentColor" viewBox="0 0 24 24" xmlns="http://www.w3.org/2000/svg">
                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M6 18L18 6M6 6l12 12"></path>
                    </svg>
                </button>
            </div>            

            <div class="flex justify-between items-center">
                <a href="{{ route('dashboard') }}">
                    <x-application-logo class="block h-9 w-auto fill-current text-gray-800 dark:text-gray-200" />
                </a>
                <!-- Tombol Close Sidebar -->
            </div>
            
            @if (auth()->user()->can('view_beranda') || auth()->user()->can('view_pengumuman') || auth()->user()->can('view_saran'))
                <p class="pt-16 ml-6 font-semibold text-gray-400">DASHBOARD</p>
                <div class="pt-4 ml-6">
                    <ul class="space-y-2 font-medium">
                    @if (auth()->user()->can('view_beranda'))
                        <li>
                            <a href="/beranda" class="{{ $isPage == 'beranda' ? 'flex items-center p-2 text-white rounded-lg bg-gray-500 group' : 'flex items-center p-2 text-gray-600 rounded-lg hover:bg-gray-100 group' }}">
                                <i class="ri-database-line mr-3 {{ $isPage == 'beranda' ? 'text-white' : 'text-gray-600' }}"></i>
                                Beranda
                            </a>
                        </li>
                    @endif
                    @if (auth()->user()->can('view_pengumuman'))
                        <li>
                            <a href="/pengumuman-manager" class="{{ $isPage == 'pengumuman-manager' ? 'flex items-center p-2 text-white rounded-lg bg-gray-500 group' : 'flex items-center p-2 text-gray-600 rounded-lg hover:bg-gray-100 group' }}">
                                <i class="ri-information-line mr-3 {{ $isPage == 'pengumuman-manager' ? 'text-white' : 'text-gray-600' }}"></i>
                                Pengumuman
                            </a>
                        </li>
                    @endif
                    @if (auth()->user()->can('view_saran'))
                        <li>
                            <a href="/contact-messages" class="{{ $isPage == 'contact-messages' ? 'flex items-center p-2 text-white rounded-lg bg-gray-500 group' : 'flex items-center p-2 text-gray-600 rounded-lg hover:bg-gray-100 group' }}">
                                <i class="ri-message-line mr-3 {{ $isPage == 'contact-messages' ? 'text-white' : 'text-gray-600' }}"></i>
                                Saran
                            </a>
                        </li>
                    @endif
                    </ul>
                </div>
            @endif

            @if (auth()->user()->can('view_datapegawai') || auth()->user()->can('view_dataruangan') || auth()->user()->can('view_datapengguna'))
                <p class="pt-10 ml-6 font-semibold text-gray-400">DATA MASTER</p>
                <div class="pt-5 ml-6 space-y-2">
                    @if (auth()->user()->can('view_datapegawai'))
                        <ul class="space-y-4 font-medium">
                            <li>
                                <a href="/pegawai" class="{{ $isPage == 'pegawai' ? 'flex items-center p-2 text-white rounded-lg bg-gray-500 group' : 'flex items-center p-2 text-gray-600 rounded-lg hover:bg-gray-100 group' }}">
                                    <i class="mr-3 ri-database-line {{ $isPage == 'pegawai' ? 'text-white' : 'text-gray-600' }}"></i>
                                    Data Pegawai
                                </a>
                            </li>
                        </ul>
                    @endif
                    @if (auth()->user()->can('view_dataruangan'))
                        <ul class="space-y-4 font-medium">
                            <li>
                                <a href="/dataruangan" class="{{ $isPage == 'dataruangan' ? 'flex items-center p-2 text-white rounded-lg bg-gray-500 group' : 'flex items-center p-2 text-gray-600 rounded-lg hover:bg-gray-100 group' }}">
                                    <i class="ri-database-fill mr-3 {{ $isPage == 'dataruangan' ? 'text-white' : 'text-gray-600' }}"></i>
                                    Data Ruangan
                                </a>
                            </li>
                        </ul>
                    @endif
                    @if (auth()->user()->can('view_datapengguna'))
                        <ul class="space-y-4 font-medium">
                            <li>
                                <a href="/datapengguna" class="{{ $isPage == 'datapengguna' ? 'flex items-center p-2 text-white rounded-lg bg-gray-500 group' : 'flex items-center p-2 text-gray-600 rounded-lg hover:bg-gray-100 group' }}">
                                    <i class="ri-user-line mr-3 {{ $isPage == 'datapengguna' ? 'text-white' : 'text-gray-600' }}"></i>
                                    Data Pengguna
                                </a>
                            </li>
                        </ul>
                    @endif
                </div>
            @endif

            @if (auth()->user()->can('view_datapeminjaman') || auth()->user()->can('view_pinjamruangan') || auth()->user()->can('view_peminjamansaya') || auth()->user()->can('view_laporan'))
                <p class="pt-10 ml-6 font-semibold text-gray-400">PEMINJAMAN</p>
                <div class="pt-5 ml-6">
                    <ul class="space-y-2 font-medium">
                        @if (auth()->user()->can('view_datapeminjaman'))
                            <li>
                                <a href="/datapeminjaman" class="{{ $isPage == 'datapeminjaman' ? 'flex items-center p-2 text-white rounded-lg bg-gray-500 group' : 'flex items-center p-2 text-gray-600 rounded-lg hover:bg-gray-100 group' }}">
                                    <i class="ri-calendar-2-line mr-3 {{ $isPage == 'datapeminjaman' ? 'text-white' : 'text-gray-600' }}"></i>
                                    Data Peminjaman
                                </a>
                            </li>
                        @endif
                        @if (auth()->user()->can('view_pinjamruangan'))
                            <li>
                                <a href="/pinjam-ruangan" class="{{ $isPage == 'pinjam-ruangan' ? 'flex items-center p-2 text-white rounded-lg bg-gray-500 group' : 'flex items-center p-2 text-gray-600 rounded-lg hover:bg-gray-100 group' }}">
                                    <i class="ri-calendar-2-line mr-3 {{ $isPage == 'pinjam-ruangan' ? 'text-white' : 'text-gray-600' }}"></i>
                                    Pinjam Ruangan
                                </a>
                            </li>
                        @endif
                        @if (auth()->user()->can('view_peminjamansaya'))
                            <li>
                                <a href="/peminjamansaya" class="{{ $isPage == 'peminjamansaya' ? 'flex items-center p-2 text-white rounded-lg bg-gray-500 group' : 'flex items-center p-2 text-gray-600 rounded-lg hover:bg-gray-100 group' }}">
                                    <i class="ri-calendar-2-line mr-3 {{ $isPage == 'peminjamansaya' ? 'text-white' : 'text-gray-600' }}"></i>
                                    Peminjaman Saya
                                </a>
                            </li>
                        @endif
                        @if (auth()->user()->can('view_laporan'))
                            <li>
                                <a href="/laporan" class="{{ $isPage == 'laporan' ? 'flex items-center p-2 text-white rounded-lg bg-gray-500 group' : 'flex items-center p-2 text-gray-600 rounded-lg hover:bg-gray-100 group' }}">
                                    <i class="ri-file-copy-2-line mr-3 {{ $isPage == 'laporan' ? 'text-white' : 'text-gray-600' }}"></i>
                                    Laporan
                                </a>
                            </li>
                        @endif
                    </ul>
                </div>
            @endif
        </div>
    </aside>
</main>
<script>
     document.addEventListener('DOMContentLoaded', function () {
    const sidebar = document.getElementById("sidebar");
    const hamburgerButton = document.getElementById("hamburger-button");
    const closeSidebarButton = document.getElementById("closeSidebarButton");

    function toggleSidebar() {
        sidebar.classList.toggle("-translate-x-full");
    }

    hamburgerButton?.addEventListener("click", toggleSidebar);
    closeSidebarButton?.addEventListener("click", toggleSidebar);
});

document.addEventListener('livewire:load', function () {
    const sidebar = document.getElementById("sidebar");
    const hamburgerButton = document.getElementById("hamburger-button");
    const closeSidebarButton = document.getElementById("closeSidebarButton");

    function toggleSidebar() {
        sidebar.classList.toggle("-translate-x-full");
    }

    hamburgerButton?.addEventListener("click", toggleSidebar);
    closeSidebarButton?.addEventListener("click", toggleSidebar);
});

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