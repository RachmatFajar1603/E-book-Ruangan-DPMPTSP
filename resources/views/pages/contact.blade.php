@extends('layouts.pages')

@section('content')
    <div class="min-h-screen bg-gray-100">
        <!-- Hero Section -->
        <div class="relative py-24 px-4 sm:px-6 lg:px-8">
            <div class="w-full sm:w-5/6 max-w-screen-xl mx-auto">
                <div class="relative h-64 bg-cover bg-center rounded-xl overflow-hidden"
                    style="background-image: url('https://plus.unsplash.com/premium_photo-1689701711379-154c21998787?w=800&auto=format&fit=crop&q=60&ixlib=rb-4.0.3&ixid=M3wxMjA3fDB8MHxzZWFyY2h8MXx8cnVhbmdhbiUyMHJhcGF0fGVufDB8fDB8fHww');">
                    <div class="absolute inset-0 bg-black opacity-50"></div>
                    <div class="relative z-10 flex flex-col justify-center items-center h-full text-white">
                        <h1 class="text-2xl sm:text-3xl md:text-4xl font-bold mb-2">Hubungi Kami</h1>
                        <nav class="text-sm">
                            <ol class="list-none p-0 inline-flex">
                                <li class="flex items-center">
                                    <a href="/" class="hover:text-gray-300">Home</a>
                                    <svg class="fill-current w-3 h-3 mx-3" xmlns="http://www.w3.org/2000/svg"
                                        viewBox="0 0 320 512">
                                        <path
                                            d="M285.476 272.971L91.132 467.314c-9.373 9.373-24.569 9.373-33.941 0l-22.667-22.667c-9.357-9.357-9.375-24.522-.04-33.901L188.505 256 34.484 101.255c-9.335-9.379-9.317-24.544.04-33.901l22.667-22.667c9.373-9.373 24.569-9.373 33.941 0L285.475 239.03c9.373 9.372 9.373 24.568.001 33.941z" />
                                    </svg>
                                </li>
                                <li>Contact</li>
                            </ol>
                        </nav>
                    </div>
                </div>
            </div>
        </div>

        <!-- Main Content -->
        <div class="max-w-7xl mx-auto px-4 sm:px-6 lg:px-8 py-12">
            <div class="bg-white rounded-3xl shadow-2xl overflow-hidden">
                <div class="md:flex">
                    <!-- Contact Form -->
                    <div class="md:w-1/2 p-8 md:p-12">
                        <h2 class="text-3xl font-bold mb-6 text-gray-800">Kirim Pesan</h2>
                        <livewire:kontak-form />
                    </div>

                    <!-- Contact Information -->
                    <div class="md:w-1/2 bg-gray-700 text-white p-8 md:p-12">
                        <h2 class="text-3xl font-bold mb-8">Informasi Kontak</h2>
                        <div class="space-y-8">
                            <div class="flex items-start">
                                <svg class="w-8 h-8 mr-4 text-gray-300" fill="none" stroke="currentColor"
                                    viewBox="0 0 24 24" xmlns="http://www.w3.org/2000/svg">
                                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                                        d="M17.657 16.657L13.414 20.9a1.998 1.998 0 01-2.827 0l-4.244-4.243a8 8 0 1111.314 0z">
                                    </path>
                                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                                        d="M15 11a3 3 0 11-6 0 3 3 0 016 0z"></path>
                                </svg>
                                <div>
                                    <h3 class="font-semibold text-2xl mb-1">Alamat</h3>
                                    <p class="text-gray-300">Jl. Tgk. Imeum Lueng Bata, Gampong Cot Masjid, Kecamatan Lueng
                                        Bata, Kota Banda Aceh (23246), Aceh. </p>
                                </div>
                            </div>
                            <div class="flex items-start">
                                <svg class="w-8 h-8 mr-4 text-gray-300" fill="none" stroke="currentColor"
                                    viewBox="0 0 24 24" xmlns="http://www.w3.org/2000/svg">
                                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                                        d="M3 5a2 2 0 012-2h3.28a1 1 0 01.948.684l1.498 4.493a1 1 0 01-.502 1.21l-2.257 1.13a11.042 11.042 0 005.516 5.516l1.13-2.257a1 1 0 011.21-.502l4.493 1.498a1 1 0 01.684.949V19a2 2 0 01-2 2h-1C9.716 21 3 14.284 3 6V5z">
                                    </path>
                                </svg>
                                <div>
                                    <h3 class="font-semibold text-2xl mb-1">Telepon</h3>
                                    <p class="text-gray-300">+0651-23170</p>
                                </div>
                            </div>
                            <div class="flex items-start">
                                <svg class="w-8 h-8 mr-4 text-gray-300" fill="none" stroke="currentColor"
                                    viewBox="0 0 24 24" xmlns="http://www.w3.org/2000/svg">
                                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                                        d="M3 8l7.89 5.26a2 2 0 002.22 0L21 8M5 19h14a2 2 0 002-2V7a2 2 0 00-2-2H5a2 2 0 00-2 2v10a2 2 0 002 2z">
                                    </path>
                                </svg>
                                <div>
                                    <h3 class="font-semibold text-2xl mb-1">Email</h3>
                                    <p class="text-gray-300">dpmptspaceh@gmail.com</p>
                                </div>
                            </div>
                            <div class="flex items-start">
                                <svg class="w-8 h-8 mr-4 text-gray-300" fill="none" stroke="currentColor"
                                    viewBox="0 0 24 24" xmlns="http://www.w3.org/2000/svg">
                                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                                        d="M12 8v4l3 3m6-3a9 9 0 11-18 0 9 9 0 0118 0z"></path>
                                </svg>
                                <div>
                                    <h3 class="font-semibold text-2xl mb-1">Jam Kerja</h3>
                                    <p class="text-gray-300">Senin - Jumat: 9AM - 5PM</p>
                                    <p class="text-gray-300">Sabtu: 10AM - 2PM</p>
                                    <p class="text-gray-300">Minggu: Tutup</p>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>

            <!-- Map Section -->
            <div class="mt-16">
                <h2 class="text-3xl font-bold mb-6 text-gray-800">Lokasi Kami</h2>
                <div class="rounded-3xl overflow-hidden shadow-2xl">
                    <iframe
                        src="https://www.google.com/maps/embed?pb=!1m18!1m12!1m3!1d15883.943540823508!2d95.34162640000004!3d5.569103450000003!2m3!1f0!2f0!3f0!3m2!1i1024!2i768!4f13.1!3m3!1m2!1s0x3040392cb2f10c0f%3A0xf5f91eb4060bd040!2sDPMPTSP%20Aceh!5e0!3m2!1sid!2sid!4v1722907987792!5m2!1sid!2sid"
                        width="100%" height="450" style="border:0;" allowfullscreen="" loading="lazy"></iframe>
                </div>
            </div>
        </div>
    </div>
@endsection
