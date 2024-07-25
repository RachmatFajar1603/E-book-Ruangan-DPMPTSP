@extends('layouts.pages')

@section('content')
    <div class="container mx-auto px-4 py-12">
        <h1 class="text-4xl font-bold text-center mb-12 text-gray-800">Pengumuman</h1>

        <div class="flex flex-wrap -mx-4">
            <!-- Announcement 1 -->
            <div class="w-full md:w-1/2 lg:w-1/3 px-4 mb-8">
                <div
                    class="bg-white rounded-lg shadow-lg overflow-hidden flex flex-col h-full transition-transform duration-300 hover:scale-105">
                    <img src="https://via.placeholder.com/400x200" alt="Announcement 1" class="w-full h-48 object-cover">
                    <div class="p-6 flex flex-col flex-grow">
                        <h2 class="text-2xl font-semibold mb-2 text-gray-800">Pengumuman 1</h2>
                        <p class="text-gray-600 text-sm mb-4">25 Jul 2024</p>
                        <p class="text-gray-700 mb-6 flex-grow">Lorem ipsum dolor sit amet, consectetur adipiscing elit. Sed
                            do eiusmod tempor incididunt ut labore et dolore magna aliqua.</p>
                        <a href="#"
                            class="inline-block bg-gray-700 text-white px-6 py-2 rounded-lg hover:bg-gray-300 transition duration-300 text-center">Baca
                            Selengkapnya</a>
                    </div>
                </div>
            </div>

            <!-- Announcement 2 -->
            <div class="w-full md:w-1/2 lg:w-1/3 px-4 mb-8">
                <div
                    class="bg-white rounded-lg shadow-lg overflow-hidden flex flex-col h-full transition-transform duration-300 hover:scale-105">
                    <img src="https://via.placeholder.com/400x200" alt="Announcement 2" class="w-full h-48 object-cover">
                    <div class="p-6 flex flex-col flex-grow">
                        <h2 class="text-2xl font-semibold mb-2 text-gray-800">Pengumuman 2</h2>
                        <p class="text-gray-600 text-sm mb-4">24 Jul 2024</p>
                        <p class="text-gray-700 mb-6 flex-grow">Ut enim ad minim veniam, quis nostrud exercitation ullamco
                            laboris nisi ut aliquip ex ea commodo consequat.</p>
                        <a href="#"
                            class="inline-block bg-gray-700 text-white px-6 py-2 rounded-lg hover:bg-gray-300 transition duration-300 text-center">Baca
                            Selengkapnya</a>
                    </div>
                </div>
            </div>

            <!-- Announcement 3 -->
            <div class="w-full md:w-1/2 lg:w-1/3 px-4 mb-8">
                <div
                    class="bg-white rounded-lg shadow-lg overflow-hidden flex flex-col h-full transition-transform duration-300 hover:scale-105">
                    <img src="https://via.placeholder.com/400x200" alt="Announcement 3" class="w-full h-48 object-cover">
                    <div class="p-6 flex flex-col flex-grow">
                        <h2 class="text-2xl font-semibold mb-2 text-gray-800">Pengumuman 3</h2>
                        <p class="text-gray-600 text-sm mb-4">23 Jul 2024</p>
                        <p class="text-gray-700 mb-6 flex-grow">Duis aute irure dolor in reprehenderit in voluptate velit
                            esse cillum dolore eu fugiat nulla pariatur.</p>
                        <a href="#"
                            class="inline-block bg-gray-700 text-white px-6 py-2 rounded-lg hover:bg-gray-300 transition duration-300 text-center">Baca
                            Selengkapnya</a>
                    </div>
                </div>
            </div>

            <!-- Add more announcement cards as needed -->

        </div>

        <!-- Modern pagination -->
        <div class="mt-12 flex justify-center items-center space-x-2">
            <a href="#"
                class="px-4 py-2 bg-gray-200 text-gray-800 rounded-full hover:bg-gray-300 transition duration-300">&laquo;
                Previous</a>
            <a href="#"
                class="px-4 py-2 bg-gray-700 text-white rounded-full hover:bg-gray-300 transition duration-300">1</a>
            <a href="#"
                class="px-4 py-2 bg-gray-200 text-gray-800 rounded-full hover:bg-gray-300 transition duration-300">2</a>
            <a href="#"
                class="px-4 py-2 bg-gray-200 text-gray-800 rounded-full hover:bg-gray-300 transition duration-300">3</a>
            <a href="#"
                class="px-4 py-2 bg-gray-200 text-gray-800 rounded-full hover:bg-gray-300 transition duration-300">Next
                &raquo;</a>
        </div>
    </div>
@endsection
