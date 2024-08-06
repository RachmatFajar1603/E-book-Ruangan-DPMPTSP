<div>
    <div class="max-w-5xl mx-auto p-6 sm:p-8 bg-white rounded-lg shadow-lg my-12 sm:my-16">
        <form wire:submit.prevent="checkAvailability">
            @csrf
            <div class="grid grid-cols-1 sm:grid-cols-2 lg:grid-cols-3 gap-6 items-end">
                <div class="w-full">
                    <label for="tanggal_awal" class="block mb-2 text-sm font-medium text-gray-900">Tanggal Awal</label>
                    <input type="date" id="tanggal_awal" wire:model="tanggal_awal"
                        class="bg-gray-50 border border-gray-300 text-gray-900 text-sm rounded-lg focus:ring-blue-500 focus:border-blue-500 block w-full p-3"
                        required>
                </div>
                <div class="w-full">
                    <label for="tanggal_akhir" class="block mb-2 text-sm font-medium text-gray-900">Tanggal
                        Akhir</label>
                    <input type="date" id="tanggal_akhir" wire:model="tanggal_akhir"
                        class="bg-gray-50 border border-gray-300 text-gray-900 text-sm rounded-lg focus:ring-blue-500 focus:border-blue-500 block w-full p-3"
                        required>
                </div>
                <div class="w-full">
                    <label for="jam_mulai" class="block mb-2 text-sm font-medium text-gray-900">Jam Mulai</label>
                    <input type="time" id="jam_mulai" wire:model="jam_mulai"
                        class="bg-gray-50 border border-gray-300 text-gray-900 text-sm rounded-lg focus:ring-blue-500 focus:border-blue-500 block w-full p-3"
                        required>
                </div>
                <div class="w-full">
                    <label for="jam_selesai" class="block mb-2 text-sm font-medium text-gray-900">Jam Selesai</label>
                    <input type="time" id="jam_selesai" wire:model="jam_selesai"
                        class="bg-gray-50 border border-gray-300 text-gray-900 text-sm rounded-lg focus:ring-blue-500 focus:border-blue-500 block w-full p-3"
                        required>
                </div>
                <div class="w-full">
                    <label for="ruangan" class="block mb-2 text-sm font-medium text-gray-900">Ruangan</label>
                    <select id="ruangan" wire:model="ruangan"
                        class="bg-gray-50 border border-gray-300 text-gray-900 text-sm rounded-lg focus:ring-blue-500 focus:border-blue-500 block w-full p-3"
                        required>
                        <option value="">-- Pilih Ruangan --</option>
                        @foreach ($ruangs as $ruang)
                            <option value="{{ $ruang->id }}">{{ $ruang->nama }}</option>
                        @endforeach
                    </select>
                </div>
                <div class="w-full sm:col-span-2 lg:col-span-1">
                    <button type="submit"
                        class="text-white bg-gray-800 hover:bg-gray-300 focus:ring-4 focus:outline-none focus:ring-gray-300 font-medium rounded-lg text-sm w-full px-5 py-3 text-center transition duration-300 ease-in-out">
                        Check
                    </button>
                </div>
            </div>
        </form>
    </div>

    @if ($alertMessage)
        <div class="container mx-auto mt-20 sm:mt-22">
            <div class="bg-red-100 border border-red-400 text-red-700 px-4 py-3 rounded relative" role="alert">
                <strong class="font-bold">Perhatian!</strong>
                <span class="block sm:inline">{{ $alertMessage }}</span>
            </div>
        </div>
    @endif

    @if (!$showResults)
        <div class="container mx-auto mt-20 sm:mt-22">
            <h2 class="text-2xl font-bold mb-6 text-center text-black">Ruangan Favorit</h2>
            <div class="grid grid-cols-1 md:grid-cols-2 lg:grid-cols-4 gap-6">
                @foreach ($favoriteRooms as $room)
                    <div
                        class="card shadow-lg rounded-xl overflow-hidden bg-white transition-transform duration-300 hover:scale-105">
                        <img src="{{ Storage::url($room->image) }}" class="w-full h-48 object-cover"
                            alt="{{ $room->nama }}" />
                        <div class="card-body p-4">
                            <h3 class="card-title text-lg font-semibold text-gray-800">{{ $room->nama }}</h3>
                            <p>Lokasi: {{ $room->lokasi }}</p>
                            <p>Banyak Peminjaman: <span
                                    class="text-red-500 font-bold">{{ $room->peminjamans_count }}</span></p>
                            <a href="{{ route('ruangan.detail', $room->id) }}"
                                class="bg-gray-800 text-white px-4 py-2 rounded-lg mt-4 flex justify-center">Lihat
                                Detail</a>
                        </div>
                    </div>
                @endforeach
            </div>
        </div>
    @elseif ($availableRooms->isNotEmpty())
        <div class="container mx-auto mt-20 sm:mt-22">
            <h2 class="text-2xl font-bold mb-6 text-center text-black">Ruangan Tersedia</h2>
            <div class="grid grid-cols-1 md:grid-cols-2 lg:grid-cols-4 gap-6">
                @foreach ($availableRooms as $room)
                    <div
                        class="card shadow-lg rounded-xl overflow-hidden bg-white transition-transform duration-300 hover:scale-105">
                        <img src="{{ Storage::url($room->image) }}" class="w-full h-48 object-cover"
                            alt="{{ $room->nama }}" />
                        <div class="card-body p-4">
                            <h3 class="card-title text-lg font-semibold text-gray-800">{{ $room->nama }}</h3>
                            <p>Lokasi: {{ $room->lokasi }}</p>
                            <p>Lantai: {{ $room->lantai }}</p>
                            <a href="{{ route('ruangan.detail', $room->id) }}"
                                class="bg-gray-800 text-white px-4 py-2 rounded-lg mt-4 flex justify-center">Lihat
                                Detail</a>
                        </div>
                    </div>
                @endforeach
            </div>
        </div>
    @endif
</div>
