<div>
    <main class="p-4 sm:ml-64">
        <div class="grid grid-cols-1 sm:grid-cols-2 md:grid-cols-3 lg:grid-cols-4 gap-6 font-poppins">
            @foreach ($ruangans as $item)
            <div class="bg-white p-4 shadow rounded-lg">
                <img src="{{ $item->image_url }}" alt="{{ $item->nama }}" class="w-full h-48 object-cover rounded-t-lg">
                <div class="flex justify-between items-center mt-4">
                    <p class="text-xl font-semibold">
                        {{ $item->nama }}
                    </p>
                    <span class="bg-gray-300 px-2 py-1 rounded-lg text-xs">
                        {{ $item->bidang->nama }}
                    </span>
                </div>
                <div class="flex flex-wrap gap-2 mt-2">
                    <!-- <span class="p-2 text-xs rounded-lg {{ $item->status == 'Tersedia' ? 'bg-green-200 text-green-700' : 'bg-red-200 text-red-700' }}">
                        {{ $item->status }}
                    </span> -->
                    @if ($item->status == 'Tersedia')
                    <span class="p-2 bg-green-200 text-green-700 rounded-lg text-xs">
                        {{ $item->status }}
                    </span>
                    @elseif ($item->status == 'Tidak Tersedia')
                    <span class="p-2 bg-red-200 text-red-700 rounded-lg text-xs">
                        Sedang Dibooking
                    </span>
                    @endif
                    <span class="p-2 bg-purple-200 text-purple-700 rounded-lg text-xs">
                        {{ $item->lokasi }}
                    </span>
                    <span class="p-2 bg-purple-200 text-purple-700 rounded-lg text-xs">
                        {{$item->kapasitas}} ORANG
                    </span>
                </div>
                <div class="flex justify-between space-x-2 my-4">
                    <a wire:navigate href="{{ route('pinjam-ruangan', $item->id) }}" class="flex-1 flex justify-center items-center h-12 text-white bg-blue-500 hover:bg-blue-600 focus:ring-4 focus:ring-blue-300 font-medium rounded-lg text-sm px-5 py-2.5 text-center transition duration-300 ease-in-out">
                        Pinjam Sekarang
                    </a>
                    <a wire:navigate href="{{ route('pinjam-ruangan.detail', $item->id) }}" class="flex-1 flex justify-center items-center h-12 text-white bg-gray-500 hover:bg-gray-600 focus:ring-4 focus:ring-gray-300 font-medium rounded-lg text-sm px-5 py-2.5 text-center transition duration-300 ease-in-out">
                        Detail
                    </a>
                </div>
                <div class="flex justify-end items-center mt-4 text-sm text-gray-500">
                    <i class="ri-calendar-check-line mr-1"></i>
                    <span>{{ $item->total_peminjaman }} dipinjam</span>
                </div>
            </div>
            @endforeach
        </div>
    </main>
</div>
