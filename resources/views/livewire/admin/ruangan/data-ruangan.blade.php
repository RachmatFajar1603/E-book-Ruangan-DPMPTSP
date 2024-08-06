<div>
    <main class="p-4 sm:ml-64 font-poppins">
        <div class="mt-4 grid grid-cols-3 gap-8 text-gray-600">
            <div class="bg-white p-6 rounded-md shadow-md flex items-center justify-between">
                <div>
                    <p class="text-2xl">Ruangan</p>
                    <p class="text-3xl mt-3">{{ $ruangs->total() }}</p>
                    <p class="text-xl mt-2">Total ruangan keseluruhan</p>
                </div>
                <div class="">
                    <img src="/images/database-line.png" class="p-4 bg-blue-200 rounded-md" alt="">
                </div>
            </div>
            <div class="bg-white p-6 rounded-md shadow-md flex items-center justify-between">
                <div>
                    <p class="text-2xl">Tersedia</p>
                    <p class="text-3xl mt-3">{{ $ruangtersedia }}</p>
                    <p class="text-xl mt-2">Ruangan yang tersedia</p>
                </div>
                <div class="">
                    <img src="/images/database-line.png" class="p-4 bg-green-300 rounded-md text-green-300"
                        alt="">
                </div>
            </div>
            <div class="bg-white p-6 rounded-md shadow-md flex items-center justify-between">
                <div>
                    <p class="text-2xl">Tidak tersedia</p>
                    <p class="text-3xl mt-3">{{ $ruangtidaktersedia }}</p>
                    <p class="text-xl mt-2">Ruangan yang sedang dipinjam</p>
                </div>
                <div class="">
                    <img src="/images/database-line.png" class="p-4 bg-red-300 rounded-md text-red-7000" alt="">
                </div>
            </div>
            <div class="w-full col-span-3">
                <div class="bg-white p-4 rounded-md shadow-md">
                    <div class="flex justify-between items-center mb-4">
                        <div>
                            <label class="mr-2">Tampilkan</label>
                            <select wire:model.live="perPage" class="border-gray-300 rounded-md">
                                <option value="10">10</option>
                                <option value="25">25</option>
                                <option value="50">50</option>
                                <option value="100">100</option>
                            </select>
                            <span class="ml-2">entri</span>
                        </div>
                        <div class="bg-blue-500 text-white p-2 rounded-md">
                            <a wire:navigate href="/ruangancreate"> Tambah Ruangan</a>
                        </div>
                        <div>
                            <label class="mr-2">Cari:</label>
                            <input type="text" class="border-gray-300 rounded-md" wire:model.live="search"/>
                        </div>
                    </div>
                    <table class="border-collapse min-w-full w-full">
                        <thead>
                            <tr>
                                <th class="border-b px-4 py-4 text-left">NO</th>
                                <th class="border-b px-4 py-4 text-left">THUMBNAIL</th>
                                <th class="border-b px-4 py-4 text-left">NAMA</th>
                                <th class="border-b px-4 py-4 text-left">BIDANG</th>
                                <th class="border-b px-4 py-4 text-left">LOKASI</th>
                                <th class="border-b px-4 py-4 text-left">KAPASITAS</th>
                                <th class="border-b px-4 py-4 text-left">STATUS</th>
                                <th class="border-b px-4 py-4 text-left">AKSI</th>
                            </tr>
                        </thead>
                        <tbody>
                            @foreach ($ruangs as $ruang)
                            <tr class="">
                                <td class="border-b px-4 py-2">
                                    {{ ($ruangs->currentPage() - 1) * $ruangs->perPage() + $loop->iteration }}
                                </td>
                                <td class="border-b px-2 py-2">
                                    <img src="{{ $ruang->image_url}}" class="w-28 h-12 object-contain" alt="">
                                </td>
                                <td class="border-b px-4 py-2 w-4">
                                    {{ $ruang->nama }}
                                </td>
                                <td class="border-b px-4 py-2 w-4">
                                </td>
                                    {{ $ruang->bidang->nama }}
                                <td class="border-b px-4 py-2">
                                    {{ $ruang->lokasi }}
                                <td class="border-b px-4 py-2">
                                </td>
                                    {{ $ruang->kapasitas }}
                                </td>
                                <td class="border-b px-4 py-2">
                                    <span class="p-2 bg-green-500 rounded text-white text-center">
                                        {{ $ruang->status }}
                                    </span>
                                </td>
                                <td class="border-b px-4 py-2 flex space-x-2">
                                    <span class="p-2 rounded text-white text-center">
                                        <button wire:click="delete({{ $ruang->id }})"
                                            <img src="/images/trash.svg" class="h-6 w-6" fill="none" viewBox="0 0 24 24"
                                            wire:confirm="Apakah anda yakin ingin menghapus ruangan ini?">
                                                stroke="currentColor">
                                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                                                d="M5 13l4 4L19 7" />
                                        </button>
                                        <button class="text-red-600 hover:text-red-800">
                                            <a href="/ruangan/{{ $ruang->id }}/edit"
                                                class="text-blue-600 hover:text-blue-800">
                                                <img src="/images/edit.svg" class="h-6 w-6" fill="none"
                                                    viewBox="0 0 24 24" stroke="currentColor">
                                                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                                                    d="M5 13l4 4L19 7" />
                                            </button>
                                            <button class="text-red-600 hover:text-red-800">
                                                <a href="/ruangan/{{ $ruang->id }}/edit"
                                                    class="text-blue-600 hover:text-blue-800">
                                                    <img src="/images/edit.svg" class="h-6 w-6" fill="none"
                                                        viewBox="0 0 24 24" stroke="currentColor">
                                                    <path stroke-linecap="round" stroke-linejoin="round"
                                                        stroke-width="2" d="M6 18L18 6M6 6l12 12" />
                                                    </svg>
                                                </a>
                                            </button>
                                        </span>
                                    </td>
                                </tr>
                            @endforeach
                        </tbody>
                    </table>
                    <div class="flex justify-between items-center mt-4">
                        <span>Menampilkan {{ $ruangs->firstItem() }} hingga {{ $ruangs->lastItem() }} dari {{ $ruangs->total() }} entri</span>
                        {{ $ruangs->links('pagination::simple-tailwind') }}
                    </div>
                </div>
            </div>
        </div>
    </main>
</div>

<script>
    function previewImage(event) {
        const reader = new FileReader();
        reader.onload = function() {
            const imgElement = document.getElementById('pilih');
            if (imgElement) {
                imgElement.src = reader.result;
                imgElement.classList.remove('hidden');
            }
        }
        reader.readAsDataURL(event.target.files[0]);
    }
</script>
