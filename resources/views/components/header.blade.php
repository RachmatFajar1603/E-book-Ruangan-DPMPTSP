<header>
    <div class="bg-gray-800 text-white py-2 sm:py-4">
        <div class="container mx-auto px-4 sm:px-6 lg:px-8">
            <div class="flex flex-wrap justify-between items-center">
                <div class="flex items-center space-x-4 text-xs sm:text-sm mb-2 sm:mb-0">
                    <span class="flex items-center whitespace-nowrap">
                        <i class="fas fa-phone mr-1 sm:mr-2"></i>
                        <span class="hidden sm:inline">+62 857-1624-3174</span>
                    </span>
                    <span class="flex items-center whitespace-nowrap">
                        <i class="fas fa-envelope mr-1 sm:mr-2"></i>
                        <span class="hidden sm:inline">dpmptstProvAceh@gmail.com</span>
                    </span>
                </div>
                <div class="flex space-x-3 sm:space-x-4">
                    <a href="#"
                        class="hover:text-gray-300 text-sm sm:text-base transition duration-300 ease-in-out"><i
                            class="fab fa-facebook-f"></i></a>
                    <a href="#"
                        class="hover:text-gray-300 text-sm sm:text-base transition duration-300 ease-in-out"><i
                            class="fab fa-twitter"></i></a>
                    <a href="#"
                        class="hover:text-gray-300 text-sm sm:text-base transition duration-300 ease-in-out"><i
                            class="fab fa-linkedin-in"></i></a>
                    <a href="#"
                        class="hover:text-gray-300 text-sm sm:text-base transition duration-300 ease-in-out"><i
                            class="fab fa-youtube"></i></a>
                    <a href="#"
                        class="hover:text-gray-300 text-sm sm:text-base transition duration-300 ease-in-out"><i
                            class="fab fa-instagram"></i></a>
                </div>
            </div>
        </div>
    </div>
    <nav class="bg-white ">
        <div class="container mx-auto px-4">
            <div class="flex justify-between items-center py-4">
                <a href="#" class="flex items-center space-x-3">
                    <img src="/images/logo-dmptsp.png" alt="ST-LNF Logo" class="h-12">
                </a>
                <div class="hidden md:flex space-x-4 items-center">
                    <a href="/"
                        class="text-gray-700 hover:text-gray-300 transition duration-300 ease-in-out font-semibold">Home</a>
                    <a href="/ruangan"
                        class="text-gray-700 hover:text-gray-300 transition duration-300 ease-in-out font-semibold">Ruangan</a>
                    <a href="/gedung"
                        class="text-gray-700 hover:text-gray-300 transition duration-300 ease-in-out font-semibold">Status
                        Ruangan</a>
                    <div class="relative group">
                        <button
                            class="text-gray-700 hover:text-gray-300 transition duration-300 ease-in-out flex items-center font-semibold">
                            Property
                            <svg class="ml-2 h-5 w-5 transition duration-300 ease-in-out transform group-hover:rotate-180"
                                xmlns="http://www.w3.org/2000/svg" viewBox="0 0 20 20" fill="currentColor">
                                <path fill-rule="evenodd"
                                    d="M5.293 7.293a1 1 0 011.414 0L10 10.586l3.293-3.293a1 1 0 111.414 1.414l-4 4a1 1 0 01-1.414 0l-4-4a1 1 0 010-1.414z"
                                    clip-rule="evenodd" />
                            </svg>
                        </button>
                        <div
                            class="absolute left-0 mt-0 w-48 bg-white rounded-md shadow-lg opacity-0 invisible group-hover:opacity-100 group-hover:visible transition duration-300 ease-in-out">
                            <div class="py-2">
                                <a href="/gedung"
                                    class="block px-4 py-2 text-sm text-gray-700 hover:bg-gray-100 transition duration-300 ease-in-out">Gedung</a>
                                <a href="#"
                                    class="block px-4 py-2 text-sm text-gray-700 hover:bg-gray-100 transition duration-300 ease-in-out">Fasilitas
                                    Ruangan</a>
                            </div>
                        </div>
                    </div>
                    <a href="#"
                        class="text-gray-700 hover:text-gray-300 transition duration-3000 font-semibold">Peminjaman</a>

                    @if (Route::has('login'))
                        <div class="flex items-center">
                            @auth
                                <a href="{{ url('/dashboard') }}"
                                    class="font-semibold text-gray-700 hover:text-gray-300 transition duration-300 ease-in-out focus:outline focus:outline-2 focus:rounded-sm focus:outline-red-500">Dashboard</a>
                            @else
                                <a href="{{ route('login') }}"
                                    class="font-semibold text-gray-700 hover:text-gray-300 transition duration-300 ease-in-out  focus:outline focus:outline-2 focus:rounded-sm focus:outline-red-500">Log
                                    in</a>
                                @if (Route::has('register'))
                                    <a href="{{ route('register') }}"
                                        class="ml-4 font-semibold text-gray-700 hover:text-gray-300 transition duration-300 ease-in-out focus:outline focus:outline-2 focus:rounded-sm focus:outline-red-500">Register</a>
                                @endif
                            @endauth
                        </div>
                    @endif
                </div>

                <div class="md:hidden">
                    <!-- Hamburger button -->
                    <button id="hamburger-button"
                        class="md:hidden text-gray-500 hover:text-gray-900 focus:outline-none focus:text-gray-900 transition duration-300 ease-in-out">
                        <svg class="h-6 w-6" fill="none" viewBox="0 0 24 24" stroke="currentColor">
                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                                d="M4 6h16M4 12h16M4 18h16" />
                        </svg>
                    </button>
                </div>
            </div>
        </div>

        <div id="mobile-menu"
            class="fixed inset-y-0 top-10 right-0 w-64 bg-white shadow-lg transform translate-x-full transition-transform duration-300 ease-in-out overflow-y-auto z-50">
            <div class="px-6 py-4">
                <button id="close-menu"
                    class="text-gray-500 hover:text-gray-900 focus:outline-none focus:text-gray-900 transition duration-300 ease-in-out">
                    <svg class="h-6 w-6" fill="none" viewBox="0 0 24 24" stroke="currentColor">
                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                            d="M6 18L18 6M6 6l12 12" />
                    </svg>
                </button>
            </div>
            <div class="px-6 py-4 space-y-2">
                <!-- Menu items here -->
                <a href="/"
                    class="block py-2 text-base font-medium text-gray-700 hover:text-gray-300 transition duration-300 ease-in-out">Home</a>
                <a href="/ruangan"
                    class="block py-2 text-base font-medium text-gray-700 hover:text-gray-300 transition duration-300 ease-in-out">Ruangan</a>
                <a href="#"
                    class="block py-2 text-base font-medium text-gray-700 hover:text-gray-300 transition duration-300 ease-in-out">Status
                    Ruangan</a>
                <div class="relative">
                    <button id="mobile-property-dropdown"
                        class="flex items-center justify-between w-full py-2 text-base font-medium text-gray-700 hover:text-gray-300 transition duration-300 ease-in-out">
                        Property
                        <svg class="ml-2 h-5 w-5 transition duration-300 ease-in-out transform"
                            xmlns="http://www.w3.org/2000/svg" viewBox="0 0 20 20" fill="currentColor">
                            <path fill-rule="evenodd"
                                d="M5.293 7.293a1 1 0 011.414 0L10 10.586l3.293-3.293a1 1 0 111.414 1.414l-4 4a1 1 0 01-1.414 0l-4-4a1 1 0 010-1.414z"
                                clip-rule="evenodd" />
                        </svg>
                    </button>
                    <div id="mobile-property-menu" class="hidden mt-2 space-y-2 px-4">
                        <a href="#"
                            class="block py-2 text-sm text-gray-700 hover:text-gray-300 transition duration-300 ease-in-out">Ruangan</a>
                        <a href="#"
                            class="block py-2 text-sm text-gray-700 hover:text-gray-300 transition duration-300 ease-in-out">Fasilitas Ruangan</a>
                    </div>
                </div>
                <a href="#"
                    class="block py-2 text-base font-medium text-gray-700 hover:text-gray-300 transition duration-300 ease-in-out">Peminjaman</a>
                @if (Route::has('login'))
                    @auth
                        <a href="{{ url('/dashboard') }}"
                            class="block py-2 text-base font-medium text-gray-700 hover:text-gray-300 transition duration-300 ease-in-out">Dashboard</a>
                    @else
                        <a href="{{ route('login') }}"
                            class="block py-2 text-base font-medium text-gray-700 hover:text-gray-300 transition duration-300 ease-in-out">Log
                            in</a>
                        @if (Route::has('register'))
                            <a href="{{ route('register') }}"
                                class="block py-2 text-base font-medium text-gray-700 hover:text-gray-300 transition duration-300 ease-in-out">Register</a>
                        @endif
                    @endauth
                @endif
            </div>
        </div>
    </nav>
</header>

<script>
    document.addEventListener('DOMContentLoaded', function() {
        const hamburgerButton = document.getElementById('hamburger-button');
        const mobileMenu = document.getElementById('mobile-menu');
        const closeMenuButton = document.getElementById('close-menu');
        const mobilePropertyDropdown = document.getElementById('mobile-property-dropdown');
        const mobilePropertyMenu = document.getElementById('mobile-property-menu');

        function openMenu() {
            mobileMenu.classList.remove('translate-x-full');
            document.documentElement.style.overflow = 'hidden';
        }

        function closeMenu() {
            mobileMenu.classList.add('translate-x-full');
            document.documentElement.style.overflow = '';
        }

        hamburgerButton.addEventListener('click', openMenu);
        closeMenuButton.addEventListener('click', closeMenu);

        // Toggle mobile property dropdown
        mobilePropertyDropdown.addEventListener('click', function() {
            mobilePropertyMenu.classList.toggle('hidden');
            this.querySelector('svg').classList.toggle('rotate-180');
        });

        // Close mobile menu when clicking outside
        document.addEventListener('click', function(event) {
            const isClickInsideMenu = mobileMenu.contains(event.target);
            const isClickOnHamburger = hamburgerButton.contains(event.target);

            if (!isClickInsideMenu && !isClickOnHamburger && !mobileMenu.classList.contains(
                    'translate-x-full')) {
                closeMenu();
            }
        });

        // Close mobile menu when window is resized to desktop view
        window.addEventListener('resize', function() {
            if (window.innerWidth >= 768) { // 768px is the 'md' breakpoint in Tailwind
                closeMenu();
            }
        });
    });
</script>
