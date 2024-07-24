@extends('layouts.pages')

@section('content')
    <div class="relative h-64 bg-cover bg-center" style="background-image: url('https://plus.unsplash.com/premium_photo-1689701711379-154c21998787?w=800&auto=format&fit=crop&q=60&ixlib=rb-4.0.3&ixid=M3wxMjA3fDB8MHxzZWFyY2h8MXx8cnVhbmdhbiUyMHJhcGF0fGVufDB8fDB8fHww');">
        <div class="absolute inset-0 bg-black opacity-50"></div>
        <div class="relative z-10 flex flex-col justify-center items-center h-full text-white">
            <h1 class="text-4xl font-bold mb-2">Ruangan Kami</h1>
            <nav class="text-sm">
                <ol class="list-none p-0 inline-flex">
                    <li class="flex items-center">
                        <a href="/" class="hover:text-gray-300">Home</a>
                        <svg class="fill-current w-3 h-3 mx-3" xmlns="http://www.w3.org/2000/svg" viewBox="0 0 320 512">
                            <path
                                d="M285.476 272.971L91.132 467.314c-9.373 9.373-24.569 9.373-33.941 0l-22.667-22.667c-9.357-9.357-9.375-24.522-.04-33.901L188.505 256 34.484 101.255c-9.335-9.379-9.317-24.544.04-33.901l22.667-22.667c9.373-9.373 24.569-9.373 33.941 0L285.475 239.03c9.373 9.372 9.373 24.568.001 33.941z" />
                        </svg>
                    </li>
                    <li>Ruangan</li>
                </ol>
            </nav>
        </div>
    </div>
    <div class="container mx-auto mt-20 sm:mt-22">
        <h2 class="text-2xl font-bold mb-6 text-center">Ruangan Favorit</h2>
        <div class="grid grid-cols-1 md:grid-cols-2 lg:grid-cols-4 gap-6">
            <div class="card bordered shadow-lg rounded-lg overflow-hidden">
                <img src="https://plus.unsplash.com/premium_photo-1689701711379-154c21998787?w=800&auto=format&fit=crop&q=60&ixlib=rb-4.0.3&ixid=M3wxMjA3fDB8MHxzZWFyY2h8MXx8cnVhbmdhbiUyMHJhcGF0fGVufDB8fDB8fHww"
                    class="w-full h-48 object-cover" alt="Auditorium" />
                <div class="card-body p-4">
                    <h3 class="card-title text-lg font-semibold text-gray-800">AUDITORIUM (MINIMAL 100 ORANG & ACARA
                        RESMI)</h3>
                    <p>Lokasi : Gedung Kampus B2</p>
                    <p>Lantai : 1</p>
                    <p>Banyak Peminjaman : <span class="text-red-500 font-bold">115</span></p>
                    <button
                        class="bg-gray-800 text-white px-4 py-2 rounded mt-2 hover:bg-gray-300 transition duration-300 ease-in-out">View
                        Details</button>
                </div>
            </div>
            <div class="card bordered shadow-lg rounded-lg overflow-hidden">
                <img src="https://plus.unsplash.com/premium_photo-1689701711379-154c21998787?w=800&auto=format&fit=crop&q=60&ixlib=rb-4.0.3&ixid=M3wxMjA3fDB8MHxzZWFyY2h8MXx8cnVhbmdhbiUyMHJhcGF0fGVufDB8fDB8fHww"
                    class="w-full h-48 object-cover" alt="LAB A 402" />
                <div class="card-body p-4">
                    <h3 class="card-title text-lg font-semibold text-gray-800">LAB A 402</h3>
                    <p>Lokasi : Gedung Kampus A</p>
                    <p>Lantai : 4</p>
                    <p>Banyak Peminjaman : <span class="text-red-500 font-bold">53</span></p>
                    <button
                        class="bg-gray-800 text-white px-4 py-2 rounded mt-2 hover:bg-gray-300 transition duration-300 ease-in-out">View
                        Details</button>
                </div>
            </div>
            <div class="card bordered shadow-lg rounded-lg overflow-hidden">
                <img src="https://plus.unsplash.com/premium_photo-1689701711379-154c21998787?w=800&auto=format&fit=crop&q=60&ixlib=rb-4.0.3&ixid=M3wxMjA3fDB8MHxzZWFyY2h8MXx8cnVhbmdhbiUyMHJhcGF0fGVufDB8fDB8fHww"
                    class="w-full h-48 object-cover" alt="LAB A 401" />
                <div class="card-body p-4">
                    <h3 class="card-title text-lg font-semibold text-gray-800">LAB A 401</h3>
                    <p>Lokasi : Gedung Kampus A</p>
                    <p>Lantai : 4</p>
                    <p>Banyak Peminjaman : <span class="text-red-500 font-bold">51</span></p>
                    <button
                        class="bg-gray-800 text-white px-4 py-2 rounded mt-2 hover:bg-gray-300 transition duration-300 ease-in-out">View
                        Details</button>
                </div>
            </div>
            <div class="card bordered shadow-lg rounded-lg overflow-hidden">
                <img src="https://plus.unsplash.com/premium_photo-1689701711379-154c21998787?w=800&auto=format&fit=crop&q=60&ixlib=rb-4.0.3&ixid=M3wxMjA3fDB8MHxzZWFyY2h8MXx8cnVhbmdhbiUyMHJhcGF0fGVufDB8fDB8fHww"
                    class="w-full h-48 object-cover" alt="LAB B2 205A" />
                <div class="card-body p-4">
                    <h3 class="card-title text-lg font-semibold text-gray-800">LAB B2 205A</h3>
                    <p>Lokasi : Gedung Kampus B2</p>
                    <p>Lantai : 2</p>
                    <p>Banyak Peminjaman : <span class="text-red-500 font-bold">48</span></p>
                    <button
                        class="bg-gray-800 text-white px-4 py-2 rounded mt-2 hover:bg-gray-300 transition duration-300 ease-in-out">View
                        Details</button>
                </div>
            </div>
            <div class="card bordered shadow-lg rounded-lg overflow-hidden">
                <img src="https://plus.unsplash.com/premium_photo-1689701711379-154c21998787?w=800&auto=format&fit=crop&q=60&ixlib=rb-4.0.3&ixid=M3wxMjA3fDB8MHxzZWFyY2h8MXx8cnVhbmdhbiUyMHJhcGF0fGVufDB8fDB8fHww"
                    class="w-full h-48 object-cover" alt="LAB B2 205A" />
                <div class="card-body p-4">
                    <h3 class="card-title text-lg font-semibold text-gray-800">LAB B2 205A</h3>
                    <p>Lokasi : Gedung Kampus B2</p>
                    <p>Lantai : 2</p>
                    <p>Banyak Peminjaman : <span class="text-red-500 font-bold">48</span></p>
                    <button
                        class="bg-gray-800 text-white px-4 py-2 rounded mt-2 hover:bg-gray-300 transition duration-300 ease-in-out">View
                        Details</button>
                </div>
            </div>
            <div class="card bordered shadow-lg rounded-lg overflow-hidden">
                <img src="https://plus.unsplash.com/premium_photo-1689701711379-154c21998787?w=800&auto=format&fit=crop&q=60&ixlib=rb-4.0.3&ixid=M3wxMjA3fDB8MHxzZWFyY2h8MXx8cnVhbmdhbiUyMHJhcGF0fGVufDB8fDB8fHww"
                    class="w-full h-48 object-cover" alt="LAB B2 205A" />
                <div class="card-body p-4">
                    <h3 class="card-title text-lg font-semibold text-gray-800">LAB B2 205A</h3>
                    <p>Lokasi : Gedung Kampus B2</p>
                    <p>Lantai : 2</p>
                    <p>Banyak Peminjaman : <span class="text-red-500 font-bold">48</span></p>
                    <button
                        class="bg-gray-800 text-white px-4 py-2 rounded mt-2 hover:bg-gray-300 transition duration-300 ease-in-out">View
                        Details</button>
                </div>
            </div>
            <div class="card bordered shadow-lg rounded-lg overflow-hidden">
                <img src="https://plus.unsplash.com/premium_photo-1689701711379-154c21998787?w=800&auto=format&fit=crop&q=60&ixlib=rb-4.0.3&ixid=M3wxMjA3fDB8MHxzZWFyY2h8MXx8cnVhbmdhbiUyMHJhcGF0fGVufDB8fDB8fHww"
                    class="w-full h-48 object-cover" alt="LAB B2 205A" />
                <div class="card-body p-4">
                    <h3 class="card-title text-lg font-semibold text-gray-800">LAB B2 205A</h3>
                    <p>Lokasi : Gedung Kampus B2</p>
                    <p>Lantai : 2</p>
                    <p>Banyak Peminjaman : <span class="text-red-500 font-bold">48</span></p>
                    <button
                        class="bg-gray-800 text-white px-4 py-2 rounded mt-2 hover:bg-gray-300 transition duration-300 ease-in-out">View
                        Details</button>
                </div>
            </div>
            <div class="card bordered shadow-lg rounded-lg overflow-hidden">
                <img src="https://plus.unsplash.com/premium_photo-1689701711379-154c21998787?w=800&auto=format&fit=crop&q=60&ixlib=rb-4.0.3&ixid=M3wxMjA3fDB8MHxzZWFyY2h8MXx8cnVhbmdhbiUyMHJhcGF0fGVufDB8fDB8fHww"
                    class="w-full h-48 object-cover" alt="LAB B2 205A" />
                <div class="card-body p-4">
                    <h3 class="card-title text-lg font-semibold text-gray-800">LAB B2 205A</h3>
                    <p>Lokasi : Gedung Kampus B2</p>
                    <p>Lantai : 2</p>
                    <p>Banyak Peminjaman : <span class="text-red-500 font-bold">48</span></p>
                    <button
                        class="bg-gray-800 text-white px-4 py-2 rounded mt-2 hover:bg-gray-300 transition duration-300 ease-in-out">View
                        Details</button>
                </div>
            </div>
            <div class="card bordered shadow-lg rounded-lg overflow-hidden">
                <img src="https://plus.unsplash.com/premium_photo-1689701711379-154c21998787?w=800&auto=format&fit=crop&q=60&ixlib=rb-4.0.3&ixid=M3wxMjA3fDB8MHxzZWFyY2h8MXx8cnVhbmdhbiUyMHJhcGF0fGVufDB8fDB8fHww"
                    class="w-full h-48 object-cover" alt="LAB B2 205A" />
                <div class="card-body p-4">
                    <h3 class="card-title text-lg font-semibold text-gray-800">LAB B2 205A</h3>
                    <p>Lokasi : Gedung Kampus B2</p>
                    <p>Lantai : 2</p>
                    <p>Banyak Peminjaman : <span class="text-red-500 font-bold">48</span></p>
                    <button
                        class="bg-gray-800 text-white px-4 py-2 rounded mt-2 hover:bg-gray-300 transition duration-300 ease-in-out">View
                        Details</button>
                </div>
            </div>
            <div class="card bordered shadow-lg rounded-lg overflow-hidden">
                <img src="https://plus.unsplash.com/premium_photo-1689701711379-154c21998787?w=800&auto=format&fit=crop&q=60&ixlib=rb-4.0.3&ixid=M3wxMjA3fDB8MHxzZWFyY2h8MXx8cnVhbmdhbiUyMHJhcGF0fGVufDB8fDB8fHww"
                    class="w-full h-48 object-cover" alt="LAB B2 205A" />
                <div class="card-body p-4">
                    <h3 class="card-title text-lg font-semibold text-gray-800">LAB B2 205A</h3>
                    <p>Lokasi : Gedung Kampus B2</p>
                    <p>Lantai : 2</p>
                    <p>Banyak Peminjaman : <span class="text-red-500 font-bold">48</span></p>
                    <button
                        class="bg-gray-800 text-white px-4 py-2 rounded mt-2 hover:bg-gray-300 transition duration-300 ease-in-out">View
                        Details</button>
                </div>
            </div>
            <div class="card bordered shadow-lg rounded-lg overflow-hidden">
                <img src="https://plus.unsplash.com/premium_photo-1689701711379-154c21998787?w=800&auto=format&fit=crop&q=60&ixlib=rb-4.0.3&ixid=M3wxMjA3fDB8MHxzZWFyY2h8MXx8cnVhbmdhbiUyMHJhcGF0fGVufDB8fDB8fHww"
                    class="w-full h-48 object-cover" alt="LAB B2 205A" />
                <div class="card-body p-4">
                    <h3 class="card-title text-lg font-semibold text-gray-800">LAB B2 205A</h3>
                    <p>Lokasi : Gedung Kampus B2</p>
                    <p>Lantai : 2</p>
                    <p>Banyak Peminjaman : <span class="text-red-500 font-bold">48</span></p>
                    <button
                        class="bg-gray-800 text-white px-4 py-2 rounded mt-2 hover:bg-gray-300 transition duration-300 ease-in-out">View
                        Details</button>
                </div>
            </div>
            <div class="card bordered shadow-lg rounded-lg overflow-hidden">
                <img src="https://plus.unsplash.com/premium_photo-1689701711379-154c21998787?w=800&auto=format&fit=crop&q=60&ixlib=rb-4.0.3&ixid=M3wxMjA3fDB8MHxzZWFyY2h8MXx8cnVhbmdhbiUyMHJhcGF0fGVufDB8fDB8fHww"
                    class="w-full h-48 object-cover" alt="LAB B2 205A" />
                <div class="card-body p-4">
                    <h3 class="card-title text-lg font-semibold text-gray-800">LAB B2 205A</h3>
                    <p>Lokasi : Gedung Kampus B2</p>
                    <p>Lantai : 2</p>
                    <p>Banyak Peminjaman : <span class="text-red-500 font-bold">48</span></p>
                    <button
                        class="bg-gray-800 text-white px-4 py-2 rounded mt-2 hover:bg-gray-300 transition duration-300 ease-in-out">View
                        Details</button>
                </div>
            </div>
            <div class="card bordered shadow-lg rounded-lg overflow-hidden">
                <img src="https://plus.unsplash.com/premium_photo-1689701711379-154c21998787?w=800&auto=format&fit=crop&q=60&ixlib=rb-4.0.3&ixid=M3wxMjA3fDB8MHxzZWFyY2h8MXx8cnVhbmdhbiUyMHJhcGF0fGVufDB8fDB8fHww"
                    class="w-full h-48 object-cover" alt="LAB B2 205A" />
                <div class="card-body p-4">
                    <h3 class="card-title text-lg font-semibold text-gray-800">LAB B2 205A</h3>
                    <p>Lokasi : Gedung Kampus B2</p>
                    <p>Lantai : 2</p>
                    <p>Banyak Peminjaman : <span class="text-red-500 font-bold">48</span></p>
                    <button
                        class="bg-gray-800 text-white px-4 py-2 rounded mt-2 hover:bg-gray-300 transition duration-300 ease-in-out">View
                        Details</button>
                </div>
            </div>
            <div class="card bordered shadow-lg rounded-lg overflow-hidden">
                <img src="https://plus.unsplash.com/premium_photo-1689701711379-154c21998787?w=800&auto=format&fit=crop&q=60&ixlib=rb-4.0.3&ixid=M3wxMjA3fDB8MHxzZWFyY2h8MXx8cnVhbmdhbiUyMHJhcGF0fGVufDB8fDB8fHww"
                    class="w-full h-48 object-cover" alt="LAB B2 205A" />
                <div class="card-body p-4">
                    <h3 class="card-title text-lg font-semibold text-gray-800">LAB B2 205A</h3>
                    <p>Lokasi : Gedung Kampus B2</p>
                    <p>Lantai : 2</p>
                    <p>Banyak Peminjaman : <span class="text-red-500 font-bold">48</span></p>
                    <button
                        class="bg-gray-800 text-white px-4 py-2 rounded mt-2 hover:bg-gray-300 transition duration-300 ease-in-out">View
                        Details</button>
                </div>
            </div>
        </div>
    </div>
@endsection
