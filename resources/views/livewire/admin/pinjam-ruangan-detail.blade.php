<div>
    <main class="p-4 sm:ml-64 font-poppins">
        <div class="container mx-auto px-4 py-8">
            <!-- Header -->
            <div class="relative h-48 md:h-64 bg-cover bg-center mb-8 rounded-xl overflow-hidden"
                style="background-image: url('{{ $room->image_url }}');">
                <div class="absolute inset-0 bg-black opacity-50 rounded-xl"></div>
                <div class="absolute inset-0 flex flex-col md:flex-row items-center justify-between p-4 md:px-8">
                    <h1 class="text-2xl md:text-4xl font-bold text-white mb-4 md:mb-0 z-10">{{ $room->nama }}</h1>
                </div>
            </div>

            <!-- Room Images -->
            <div class="mb-8">
                <img src="{{ $room->image_url }}" alt="Room" class="w-full h-96 object-cover rounded-xl mb-4">
                <div class="flex space-x-4 overflow-x-auto">
                    @foreach ($room->images as $image)
                        <img src="{{ Storage::url($image->image) }}" alt="Room {{ $loop->iteration }}"
                            class="w-1/4 h-24 object-cover rounded-lg flex-shrink-0">
                    @endforeach
                </div>
            </div>

            <!-- Room Details -->
            <div class="grid grid-cols-2 md:grid-cols-4 gap-4 md:gap-8 mb-8">
                <div>
                    <h3 class="font-semibold text-gray-700">Deskripsi</h3>
                    <p>{{ $room->deskripsi }}</p>
                </div>
                <div>
                    <h3 class="font-semibold text-gray-700">Lokasi</h3>
                    <p>{{ $room->lokasi }}</p>
                </div>
                <div>
                    <h3 class="font-semibold text-gray-700">Bidang</h3>
                    <p>{{ $room->bidang->nama }}</p>
                </div>
                <div>
                    <h3 class="font-semibold text-gray-700">Kapasitas</h3>
                    <p>{{ $room->kapasitas }}</p>
                </div>
            </div>

            <!-- Facilities -->
            <h2 class="text-2xl font-bold mb-4">Fasilitas {{ $room->nama }}</h2>
            <div class="grid grid-cols-2 md:grid-cols-4 gap-4 mb-8">
                @if ($room->fasilitas->ac)
                    <div class="flex items-center space-x-2">
                        <svg class="w-6 h-6 text-blue-500" fill="none" stroke="currentColor" viewBox="0 0 24 24"
                            xmlns="http://www.w3.org/2000/svg">
                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                                d="M20 7l-8-4-8 4m16 0l-8 4m8-4v10l-8 4m0-10L4 7m8 4v10M4 7v10l8 4" />
                        </svg>
                        <span>AC</span>
                    </div>
                @endif

                @if ($room->fasilitas->proyektor)
                    <div class="flex items-center space-x-2">
                        <svg class="w-6 h-6 text-gray-500" fill="none" stroke="currentColor" viewBox="0 0 24 24"
                            xmlns="http://www.w3.org/2000/svg">
                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                                d="M9.75 17L9 20l-1 1h8l-1-1-.75-3M3 13h18M5 17h14a2 2 0 002-2V5a2 2 0 00-2-2H5a2 2 0 00-2 2v10a2 2 0 002 2z" />
                        </svg>
                        <span>LCD Projector</span>
                    </div>
                @endif

                @if ($room->fasilitas->wifi)
                    <div class="flex items-center space-x-2">
                        <svg class="w-6 h-6 text-green-500" fill="none" stroke="currentColor" viewBox="0 0 24 24"
                            xmlns="http://www.w3.org/2000/svg">
                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                                d="M8.111 16.404a5.5 5.5 0 017.778 0M12 20h.01m-7.08-7.071c3.904-3.905 10.236-3.905 14.141 0M1.394 9.393c5.857-5.857 15.355-5.857 21.213 0" />
                        </svg>
                        <span>Wifi</span>
                    </div>
                @endif

                @if ($room->fasilitas->kursi)
                    <div class="flex items-center space-x-2">
                        <svg class="w-6 h-6 text-yellow-500" fill="none" stroke="currentColor" viewBox="0 0 24 24"
                            xmlns="http://www.w3.org/2000/svg">
                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                                d="M20 13V6a2 2 0 00-2-2H6a2 2 0 00-2 2v7m16 0v5a2 2 0 01-2 2H6a2 2 0 01-2-2v-5m16 0h-2.586a1 1 0 00-.707.293l-2.414 2.414a1 1 0 01-.707.293h-3.172a1 1 0 01-.707-.293l-2.414-2.414A1 1 0 006.586 13H4" />
                        </svg>
                        <span>Kursi</span>
                    </div>
                @endif

                @if ($room->fasilitas->meja)
                    <div class="flex items-center space-x-2">
                        <svg class="w-6 h-6 text-brown-500" fill="none" stroke="currentColor" viewBox="0 0 24 24"
                            xmlns="http://www.w3.org/2000/svg">
                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                                d="M4 6a2 2 0 012-2h2a2 2 0 012 2v2a2 2 0 01-2 2H6a2 2 0 01-2-2V6zM14 6a2 2 0 012-2h2a2 2 0 012 2v2a2 2 0 01-2 2h-2a2 2 0 01-2-2V6zM4 16a2 2 0 012-2h2a2 2 0 012 2v2a2 2 0 01-2 2H6a2 2 0 01-2-2v-2zM14 16a2 2 0 012-2h2a2 2 0 012 2v2a2 2 0 01-2 2h-2a2 2 0 01-2-2v-2z" />
                        </svg>
                        <span>Meja</span>
                    </div>
                @endif
            </div>

            <!-- Booking Schedule -->
            <h2 class="text-2xl font-bold mb-4">Ruangan ini telah di booking pada:</h2>
            <div class="overflow-x-auto">
                <table class="w-full text-sm text-left text-gray-500 rounded-xl">
                    <thead class="text-xs text-gray-700 uppercase bg-gray-50">
                        <tr>
                            <th scope="col" class="px-6 py-3">Tanggal Pinjam</th>
                            <th scope="col" class="px-6 py-3">Tanggal Selesai</th>
                            <th scope="col" class="px-6 py-3">Waktu Mulai</th>
                            <th scope="col" class="px-6 py-3">Waktu Selesai</th>
                        </tr>
                    </thead>
                    <tbody>
                        @foreach ($bookings as $booking)
                            <tr class="bg-white border-b">
                                <td class="px-6 py-4">{{ $booking['tanggal_pinjam'] }}</td>
                                <td class="px-6 py-4">{{ $booking['tanggal_selesai'] }}</td>
                                <td class="px-6 py-4">{{ $booking['waktu_mulai'] }}</td>
                                <td class="px-6 py-4">{{ $booking['waktu_selesai'] }}</td>
                            </tr>
                        @endforeach
                    </tbody>
                </table>
            </div>
        </div>
    </main>
</div>
