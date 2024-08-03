<div>
    <main class="p-4 sm:ml-64">
        <div class="grid grid-cols-4 space-y-8 font-poppins">
            @foreach ($ruangans as $items)
            <div class="w-fit bg-white p-4 shadow  mt-8">
                <img src="{{ $items->image_url }}" alt="" class="w-full h-48 object-cover">
                <div class="flex justify-beetween mt-4">
                    <p class="mx-2 text-xl">
                        {{ $items->nama }}
                    </p>
                    <span class="bg-gray-300 px-2 rounded-lg text-xs flex items-center">
                        {{ $items->bidang->nama }}
                    </span>
                </div>
                <div class="flex justify-beetween space-x-4 p-2 text-xs">
                    <span class="p-2 bg-green-200 text-green-700 rounded-lg text-center">
                        {{ $items->status }}
                    </span>
                    <span class="p-2 bg-purple-200 text-purple-700 rounded-lg text-center">
                        {{ $items->lokasi }}
                    </span>
                    <span class="p-2 bg-purple-200 text-purple-700 rounded-lg text-center">
                        {{$items->kapasitas}} ORANG
                    </span>
                </div>
                <div class="flex justify-center space-x-2 my-4">
                    <a wire:navigate href="{{ route('pinjam-ruangan', $items->id) }}" type="button" class="flex justify-center items-center w-1/2 h-16 text-white bg-blue-500 hover:bg-blue-800 focus:outline-none focus:ring-4 focus:ring-blue-300 font-medium rounded-lg text-sm px-5 text-center me-2 dark:bg-blue-600 dark:hover:bg-blue-700 dark:focus:ring-blue-800">
                        Pinjam<br>Sekarang
                    </a>                
                    <button type="button" class="h-16 w-32 text-white bg-gray-500 hover:bg-blue-800 focus:outline-none focus:ring-4 focus:ring-blue-300 font-medium rounded-lg text-sm px-5 text-center dark:bg-blue-600 dark:hover:bg-blue-700 dark:focus:ring-blue-800">Detail</button>
                </div>
                <div class="p-2 flex justify-end mt-4">
                    <i class="ri-calendar-check-line text-gray-500"></i>
                    <span class="text-gray-500 mr-1">{{ $items->total_peminjaman }}</span>
                    <span class="text-gray-500">dipinjam</span>
                </div>
            </div>
            @endforeach
        </div>
    </main>
</div>
