@extends('layouts.pages')

@section('content')
    <x-carausel />
    <x-availability-check />
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
        </div>
    </div>
@endsection
