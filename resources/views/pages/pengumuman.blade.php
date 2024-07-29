@extends('layouts.pages')

@section('content')
    <div class="container mx-auto px-4 py-8">
        <div class="flex flex-col lg:flex-row">
            <!-- Left Sidebar - Navigation -->
            <div class="w-full lg:w-1/5 lg:pr-8 mb-8 lg:mb-0">
                <nav class="sticky top-8">
                    <h3 class="text-lg font-semibold mb-4 text-gray-700">Navigasi</h3>
                    <ul class="space-y-2">
                        <li><a href="#" class="text-blue-600 hover:underline">Beranda</a></li>
                        <li>
                            <span class="font-medium text-gray-700">Pengumuman</span>
                            <ul class="ml-4 mt-2 space-y-2">
                                <li><a href="#" class="text-blue-600 hover:underline">Terbaru</a></li>
                                <li><a href="#" class="text-blue-600 hover:underline">Arsip</a></li>
                                <li><a href="#" class="text-blue-600 hover:underline">Kategori</a></li>
                            </ul>
                        </li>
                        <li><a href="#" class="text-blue-600 hover:underline">Tentang Kami</a></li>
                        <li><a href="#" class="text-blue-600 hover:underline">Kontak</a></li>
                    </ul>
                </nav>
            </div>

            <!-- Main Content -->
            <div class="w-full lg:w-3/5 lg:px-8">
                <header class="mb-8">
                    <h1 class="text-4xl font-bold text-gray-800">Pengumuman</h1>
                    <p class="text-gray-600 mt-2">Informasi terbaru dan penting untuk Anda</p>
                </header>

                <div class="space-y-12">
                    <!-- Announcement 1 -->
                    <article class="prose lg:prose-xl max-w-none">
                        <h2 id="pengumuman-1" class="text-3xl font-semibold text-gray-800">Pengumuman Penting: Perubahan
                            Jadwal Operasional</h2>
                        <p class="text-gray-600 text-sm">Dipublikasikan pada 25 Jul 2024</p>
                        <p>Lorem ipsum dolor sit amet, consectetur adipiscing elit. Sed do eiusmod tempor incididunt ut
                            labore et dolore magna aliqua. Ut enim ad minim veniam, quis nostrud exercitation ullamco
                            laboris nisi ut aliquip ex ea commodo consequat.</p>
                        <p>Duis aute irure dolor in reprehenderit in voluptate velit esse cillum dolore eu fugiat nulla
                            pariatur. Excepteur sint occaecat cupidatat non proident, sunt in culpa qui officia deserunt
                            mollit anim id est laborum.</p>
                        <a href="#"
                            class="inline-block bg-gray-700 text-white px-6 py-2 rounded-lg hover:bg-gray-300 transition duration-300 ease-in-out mt-4">Baca
                            Selengkapnya</a>
                    </article>

                    <!-- Announcement 2 -->
                    <article class="prose lg:prose-xl max-w-none">
                        <h2 id="pengumuman-2" class="text-3xl font-semibold text-gray-800">Peluncuran Fitur Baru: Sistem
                            Manajemen Tugas</h2>
                        <p class="text-gray-600 text-sm">Dipublikasikan pada 24 Jul 2024</p>
                        <p>Ut enim ad minim veniam, quis nostrud exercitation ullamco laboris nisi ut aliquip ex ea commodo
                            consequat. Lorem ipsum dolor sit amet, consectetur adipiscing elit, sed do eiusmod tempor
                            incididunt ut labore et dolore magna aliqua.</p>
                        <p>Excepteur sint occaecat cupidatat non proident, sunt in culpa qui officia deserunt mollit anim id
                            est laborum. Duis aute irure dolor in reprehenderit in voluptate velit esse cillum dolore eu
                            fugiat nulla pariatur.</p>
                        <a href="#"
                            class="inline-block bg-gray-700 text-white px-6 py-2 rounded-lg hover:bg-gray-300 transition duration-300 ease-in-out mt-4">Baca
                            Selengkapnya</a>
                    </article>

                    <!-- Add more announcement articles as needed -->
                </div>

                <!-- Pagination -->
                <div class="mt-12 flex justify-center items-center space-x-2">
                    <a href="#"
                        class="px-4 py-2 bg-gray-200 text-gray-800 rounded-full hover:bg-gray-300 transition duration-300">&laquo;
                        Sebelumnya</a>
                    <a href="#"
                        class="px-4 py-2 bg-blue-600 text-white rounded-full hover:bg-blue-700 transition duration-300">1</a>
                    <a href="#"
                        class="px-4 py-2 bg-gray-200 text-gray-800 rounded-full hover:bg-gray-300 transition duration-300">2</a>

         <a href="#"
                        class="px-4 py-2 bg-gray-200 text-gray-800 rounded-full hover:bg-gray-300 transition duration-300">3</a>
                    <a href="#"
                        class="px-4 py-2 bg-gray-200 text-gray-800 rounded-full hover:bg-gray-300 transition duration-300">Selanjutnya
                        &raquo;</a>
                </div>
            </div>

            <!-- Right Sidebar - Table of Contents -->
            <div class="w-full lg:w-1/5 lg:pl-8 mt-8 lg:mt-0">
                <div class="sticky top-8">
                    <h3 class="text-lg font-semibold mb-4 text-gray-700">Daftar Isi</h3>
                    <ul class="space-y-2 text-sm">
                        <li><a href="#pengumuman-1" class="text-gray-600 hover:text-blue-600 transition duration-300 ease-in-out">Perubahan Jadwal
                                Operasional</a></li>
                        <li><a href="#pengumuman-2" class="text-gray-600 hover:text-blue-600 transition duration-300 ease-in-out">Peluncuran Fitur Baru: Sistem
                                Manajemen Tugas</a></li>
                        <!-- Add more table of contents items as needed -->
                    </ul>
                </div>
            </div>
        </div>
    </div>
@endsection
