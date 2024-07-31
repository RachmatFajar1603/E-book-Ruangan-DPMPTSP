<div>
    <main class="p-4 sm:ml-64 font-poppins">
        <div class="mt-4 grid grid-cols-3 gap-8 text-gray-600">
            <div class="bg-white p-6 rounded-md shadow-md flex items-center justify-between">
                <div>
                    <p class="text-2xl">
                        Ruangan
                    </p>
                    <p class="text-3xl mt-3">
                        0
                    </p>
                    <p class="text-xl mt-2">
                        Total ruangan keseluruhan
                    </p>
                </div>
                <div class="">
                    <img src="/images/database-line.png" class="p-4 bg-blue-200 rounded-md" alt="">
                </div>
            </div>
            <div class="bg-white p-6 rounded-md shadow-md flex items-center justify-between">
                <div>
                    <p class="text-2xl">
                        Tersedia
                    </p>
                    <p class="text-3xl mt-3">
                        0
                    </p>
                    <p class="text-xl mt-2">
                        Ruangan yang tersedia
                    </p>
                </div>
                <div class="">
                    <img src="/images/database-line.png" class="p-4 bg-green-300 rounded-md text-green-300" alt="">
                </div>
            </div>
            <div class="bg-white p-6 rounded-md shadow-md flex items-center justify-between">
                <div>
                    <p class="text-2xl">
                        Tidak tersedia
                    </p>
                    <p class="text-3xl mt-3">
                        0
                    </p>
                    <p class="text-xl mt-2">
                        Ruangan yang sedang dipinjam
                    </p>
                </div>
                <div class="">
                    <img src="/images/database-line.png" class="p-4 bg-red-300 rounded-md text-red-7000" alt="">
                </div>
            </div>
            <div class="bg-white p-6 rounded-md shadow-md">
                <form wire:submit.prevent="create">
                    @csrf
                    <div>
                        <label for="nama" class="block mb-2 text-sm font-medium text-black">Nama Ruangan</label>
                        <input type="text" wire:model="nama"
                            class="border border-gray-300 text-gray-900 text-sm rounded-lg focus:ring-blue-500 focus:border-blue-500 block w-full p-2.5"
                            required />
                    </div>
                    <div class="flex justify between mt-3 justify-center space-x-6">
                        <div class="w-1/2">
                            <label for="kapasitas"
                                class="block mb-2 text-sm font-medium text-gray-900">Kapasitas</label>
                            <input type="number" wire:model="kapasitas" aria-describedby="helper-text-explanation"
                                class="bg-gray-50 border border-gray-300 text-gray-900 text-sm rounded-lg focus:ring-blue-500 focus:border-blue-500 block w-full p-2.5"
                                required />
                        </div>
                        <div class="w-1/2">
                            <label for="lokasi" class="block mb-2 text-sm font-medium text-gray-900">Lokasi</label>
                            <select wire:model="lokasi"
                                class="bg-gray-50 border border-gray-300 text-gray-900 text-sm rounded-lg focus:ring-blue-500 focus:border-blue-500 block w-full p-2.5">
                                <option selected>Lokasi</option>
                                <option value="Lantai 1">Lantai 1</option>
                                <option value="Lantai 2">Lantai 2</option>
                                <option value="Lantai 3">Lantai 3</option>
                                <option value="Lantai 4">Lantai 4</option>
                            </select>
                        </div>
                    </div>
                    <div>
                        <label for="deskripsi"
                            class="block mb-2 text-sm font-medium text-gray-900 mt-3">Deskripsi</label>
                        <textarea wire:model="deskripsi" rows="4"
                            class=" h-48 block p-2.5 w-full text-sm text-gray-900 bg-gray-50 rounded-lg border border-gray-300 focus:ring-blue-500 focus:border-blue-500"
                            placeholder="Tambahkan deskripsi..."></textarea>
                    </div>
                    <div class="mt-3">
                        <label for="kepemilikan"
                            class="block mb-2 text-sm font-medium text-gray-900">Kepemilikan</label>
                        <select wire:model="kepemilikan"
                            class="bg-gray-50 border border-gray-300 text-gray-900 text-sm rounded-lg focus:ring-blue-500 focus:border-blue-500 block w-full p-2.5">
                            <option selected>Kepemilikan</option>
                            @foreach ($bidangs as $item)
                            <option value="{{ $item->id }}">{{ $item->nama }}</option>
                            @endforeach
                        </select>
                    </div>
                    <div class="mt-4">
                        <label class="block mb-2 text-sm font-medium text-gray-900">Kelengkapan</label>
                        <div class="flex items-center mb-4">
                            <input wire:model="ac" type="checkbox" value="1"
                                class="w-4 h-4 text-blue-600 bg-gray-100 border-gray-300 rounded focus:ring-blue-500 focus:ring-2">
                            <label for="ac" class="ml-2 text-sm font-medium text-gray-900">AC</label>
                        </div>
                        <div class="flex items-center mb-4">
                            <input wire:model="meja" type="checkbox" value="1"
                                class="w-4 h-4 text-blue-600 bg-gray-100 border-gray-300 rounded focus:ring-blue-500 focus:ring-2">
                            <label for="meja" class="ml-2 text-sm font-medium text-gray-900">Meja</label>
                        </div>
                        <div class="flex items-center mb-4">
                            <input wire:model="kursi" type="checkbox" value="1"
                                class="w-4 h-4 text-blue-600 bg-gray-100 border-gray-300 rounded focus:ring-blue-500 focus:ring-2">
                            <label for="kursi" class="ml-2 text-sm font-medium text-gray-900">Kursi</label>
                        </div>
                        <div class="flex items-center mb-4">
                            <input wire:model="projector" type="checkbox" value="1"
                                class="w-4 h-4 text-blue-600 bg-gray-100 border-gray-300 rounded focus:ring-blue-500 focus:ring-2">
                            <label for="projector" class="ml-2 text-sm font-medium text-gray-900">Proyektor</label>
                        </div>
                    </div>
                    <div class="mt-3">
                        <label for="image" class="block mb-2 text-sm font-medium text-gray-900">Pilih Foto <span class="text-red-500">*</span></label>
                        <input wire:model="image" type="file" id="fileInput" class="hidden" accept="image/*" onchange="previewImage(event)" />
                        <label for="fileInput" id="fileLabel" class="cursor-pointer flex flex-col items-center">
                            <span class="bg-gray-300 p-4 rounded-md">PILIH FILE</span>
                        </label>
                        @if ($thumbnailPreview)
                        <img id="thumbnailPreview" src="{{ $thumbnailPreview }}" class="mt-4 w-full h-full object-contain" />
                        @else
                        <img id="thumbnailPreview" class="hidden mt-4 w-full h-full object-cover" />
                        @endif
                    </div>                                    
                    <div class="flex justify-end">
                        <button type="submit"
                            class="mt-6 text-white bg-blue-700 hover:bg-blue-800 focus:outline-none focus:ring-4 focus:ring-blue-300 font-medium rounded-lg text-sm px-5 py-2.5 text-center me-2 mb-2 dark:bg-blue-600 dark:hover:bg-blue-700 dark:focus:ring-blue-800">Submit</button>
                    </div>
                </form>
            </div>
            <div class="w-full col-span-2">
                <div class="bg-white p-4 rounded-md shadow-md">
                    <div class="flex justify-between items-center mb-4">
                        <div>
                            <label class="mr-2">Tampilkan</label>
                            <select class="border-gray-300 rounded-md">
                                <option value="10">10</option>
                                <option value="25">25</option>
                                <option value="50">50</option>
                                <option value="100">100</option>
                            </select>
                            <span class="ml-2">entri</span>
                        </div>
                        <div>
                            <label class="mr-2">Cari:</label>
                            <input type="text" class="border-gray-300 rounded-md" />
                        </div>
                    </div>
                    <table class="border-collapse min-w-full w-full">
                        <thead>
                            <tr>
                                <th class="border-b px-4 py-4 text-left">NO</th>
                                <th class="border-b px-4 py-4 text-left">THUMBNAIL</th>
                                <th class="border-b px-4 py-4 text-left">NAMA</th>
                                <th class="border-b px-4 py-4 text-left">LOKASI</th>
                                <th class="border-b px-4 py-4 text-left">KAPASITAS</th>
                                <th class="border-b px-4 py-4 text-left">STATUS</th>
                                <th class="border-b px-4 py-4 text-left">AKSI</th>
                            </tr>
                        </thead>
                        <tbody>
                            @foreach ($ruangs as $ruang)
                            <tr class="">
                                <td class="border-b px-4 py-2 text-wrap w-6">
                                    {{ $loop->iteration }}
                                </td>
                                <td class="border-b px-2 py-2">
                                    <img src="{{ $ruang->image_url }}" class="w-28 h-12 object-contain" alt="">
                                </td>
                                <td class="border-b px-4 py-2 w-4">
                                    {{ $ruang->nama }}
                                </td>
                                <td class="border-b px-4 py-2">
                                    {{ $ruang->lokasi }}
                                </td>
                                <td class="border-b px-4 py-2">
                                    {{ $ruang->kapasitas }}
                                </td>
                                <td class="border-b px-4 py-2">
                                    <span class="p-2 bg-green-500 rounded text-white text-center">
                                        {{ $ruang->status }}
                                    </span>
                                </td>
                                <td class="border-b px-4 py-2 flex space-x-2">
                                    <span class="p-2 rounded text-white text-center">
                                        <button class="text-green-600 hover:text-green-800">
                                            <img src="/images/trash.svg" class="h-6 w-6" fill="none" viewBox="0 0 24 24"
                                                stroke="currentColor">
                                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                                                d="M5 13l4 4L19 7" />
                                            </=>
                                        </button>
                                        <button class="text-red-600 hover:text-red-800">
                                            <img src="/images/edit.svg" class="h-6 w-6" fill="none" viewBox="0 0 24 24"
                                                stroke="currentColor">
                                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                                                d="M6 18L18 6M6 6l12 12" />
                                            </svg>
                                        </button>
                                    </span>
                                </td>
                            </tr>
                            @endforeach
                    </table>
                </div>
            </div>
    </main>
</div>

<script>
    function previewImage(event) {
        const reader = new FileReader();
        reader.onload = function () {
            const imgElement = document.getElementById('pilih');
            if (imgElement) {
                imgElement.src = reader.result;
                imgElement.classList.remove('hidden');
            }
        }
        reader.readAsDataURL(event.target.files[0]);
    }
</script>
