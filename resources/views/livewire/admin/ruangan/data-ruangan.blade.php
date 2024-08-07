<div>
    <main class="p-4 sm:ml-64 font-poppins">
        <div class="mt-4 grid grid-cols-1 sm:grid-cols-2 lg:grid-cols-3 gap-4 text-gray-600">
            <!-- Ruangan Card -->
            <div class="bg-white p-4 sm:p-6 rounded-md shadow-md flex items-center justify-between">
                <div>
                    <p class="text-xl sm:text-2xl">Ruangan</p>
                    <p class="text-2xl sm:text-3xl mt-2">{{ $ruangs->total() }}</p>
                    <p class="text-lg sm:text-xl mt-1">Total ruangan keseluruhan</p>
                </div>
                <div class="flex-shrink-0">
                    <img src="/images/database-line.png" class="p-3 sm:p-4 bg-blue-200 rounded-md" alt="">
                </div>
            </div>

            <!-- Tersedia Card -->
            <div class="bg-white p-4 sm:p-6 rounded-md shadow-md flex items-center justify-between">
                <div>
                    <p class="text-xl sm:text-2xl">Tersedia</p>
                    <p class="text-2xl sm:text-3xl mt-2">{{ $ruangtersedia }}</p>
                    <p class="text-lg sm:text-xl mt-1">Ruangan yang tersedia</p>
                </div>
                <div class="flex-shrink-0">
                    <img src="/images/database-line.png" class="p-3 sm:p-4 bg-green-300 rounded-md" alt="">
                </div>
            </div>

            <!-- Tidak tersedia Card -->
            <div class="bg-white p-4 sm:p-6 rounded-md shadow-md flex items-center justify-between">
                <div>
                    <p class="text-xl sm:text-2xl">Tidak tersedia</p>
                    <p class="text-2xl sm:text-3xl mt-2">{{ $ruangtidaktersedia }}</p>
                    <p class="text-lg sm:text-xl mt-1">Ruangan yang sedang dipinjam</p>
                </div>
                <div class="flex-shrink-0">
                    <img src="/images/database-line.png" class="p-3 sm:p-4 bg-red-300 rounded-md" alt="">
                </div>
            </div>
        </div>

        <!-- Table Section -->
        <div class="mt-8">
            <div class="bg-white p-4 rounded-md shadow-md">
                <div class="flex flex-col sm:flex-row justify-between items-center mb-4 space-y-2 sm:space-y-0">
                    <div class="flex items-center space-x-2">
                        <label>Tampilkan</label>
                        <select wire:model.live="perPage" class="border-gray-300 rounded-md">
                            <option value="10">10</option>
                            <option value="25">25</option>
                            <option value="50">50</option>
                            <option value="100">100</option>
                        </select>
                        <span>entri</span>
                    </div>
                    <div class="w-full sm:w-auto">
                        <a wire:navigate href="/ruangancreate"
                            class="bg-blue-500 text-white p-2 rounded-md block text-center">Tambah Ruangan</a>
                    </div>
                    <div class="w-full sm:w-auto">
                        <label class="mr-2">Cari:</label>
                        <input type="text" class="border-gray-300 rounded-md w-full sm:w-auto"
                            wire:model.live="search" />
                    </div>
                </div>

                <div class="overflow-x-auto">
                    <table class="min-w-full border-collapse w-full">
                        <thead>
                            <tr>
                                <th class="border-b px-4 py-2 text-left">
                                    <div class="flex items-center">
                                        <span>NO</span>
                                        <button wire:click="sortBy('id')" class="ml-1">
                                            @if ($sortField === 'id')
                                                <i
                                                    class="fas fa-sort-{{ $sortDirection === 'asc' ? 'up' : 'down' }}"></i>
                                            @else
                                                <i class="fas fa-sort"></i>
                                            @endif
                                        </button>
                                    </div>
                                </th>
                                <th class="border-b px-4 py-2 text-left">THUMBNAIL</th>
                                <th class="border-b px-4 py-2 text-left">
                                    <div class="flex items-center">
                                        <span>NAMA</span>
                                        <button wire:click="sortBy('nama')" class="ml-1">
                                            @if ($sortField === 'nama')
                                                <i
                                                    class="fas fa-sort-{{ $sortDirection === 'asc' ? 'up' : 'down' }}"></i>
                                            @else
                                                <i class="fas fa-sort"></i>
                                            @endif
                                        </button>
                                    </div>
                                </th>
                                <th class="border-b px-4 py-2 text-left">
                                    <div class="flex items-center">
                                        <span>BIDANG</span>
                                        <button wire:click="sortBy('bidang')" class="ml-1">
                                            @if ($sortField === 'bidang')
                                                <i
                                                    class="fas fa-sort-{{ $sortDirection === 'asc' ? 'up' : 'down' }}"></i>
                                            @else
                                                <i class="fas fa-sort"></i>
                                            @endif
                                        </button>
                                    </div>
                                </th>
                                <th class="border-b px-4 py-2 text-left">
                                    <div class="flex items-center">
                                        <span>LOKASI</span>
                                        <button wire:click="sortBy('lokasi')" class="ml-1">
                                            @if ($sortField === 'lokasi')
                                                <i
                                                    class="fas fa-sort-{{ $sortDirection === 'asc' ? 'up' : 'down' }}"></i>
                                            @else
                                                <i class="fas fa-sort"></i>
                                            @endif
                                        </button>
                                    </div>
                                </th>
                                <th class="border-b px-4 py-2 text-left">
                                    <div class="flex items-center">
                                        <span>KAPASITAS</span>
                                        <button wire:click="sortBy('kapasitas')" class="ml-1">
                                            @if ($sortField === 'kapasitas')
                                                <i
                                                    class="fas fa-sort-{{ $sortDirection === 'asc' ? 'up' : 'down' }}"></i>
                                            @else
                                                <i class="fas fa-sort"></i>
                                            @endif
                                        </button>
                                    </div>
                                </th>
                                <th class="border-b px-4 py-2 text-left">
                                    <div class="flex items-center">
                                        <span>STATUS</span>
                                        <button wire:click="sortBy('status')" class="ml-1">
                                            @if ($sortField === 'status')
                                                <i
                                                    class="fas fa-sort-{{ $sortDirection === 'asc' ? 'up' : 'down' }}"></i>
                                            @else
                                                <i class="fas fa-sort"></i>
                                            @endif
                                        </button>
                                    </div>
                                </th>
                                <th class="border-b px-4 py-2 text-left">AKSI</th>
                            </tr>
                        </thead>
                        <tbody>
                            @foreach ($ruangs as $ruang)
                                <tr>
                                    <td class="border-b px-4 py-2">
                                        {{ ($ruangs->currentPage() - 1) * $ruangs->perPage() + $loop->iteration }}
                                    </td>
                                    <td class="border-b px-2 py-2">
                                        <img src="{{ $ruang->image_url }}" class="w-28 h-12 object-contain"
                                            alt="">
                                    </td>
                                    <td class="border-b px-4 py-2">{{ $ruang->nama }}</td>
                                    <td class="border-b px-4 py-2">{{ $ruang->bidang->nama }}</td>
                                    <td class="border-b px-4 py-2">{{ $ruang->lokasi }}</td>
                                    <td class="border-b px-4 py-2">{{ $ruang->kapasitas }}</td>
                                    <td class="border-b px-4 py-2">
                                        <span class="p-2 bg-green-500 rounded text-white text-center">
                                            {{ $ruang->status }}
                                        </span>
                                    </td>
                                    <td class="border-b px-4 py-2">
                                        <div class="flex space-x-2">
                                            <button wire:click="delete({{ $ruang->id }})"
                                                wire:confirm="Apakah anda yakin ingin menghapus ruangan ini?">
                                                <img src="/images/trash.svg" class="h-6 w-6" alt="Delete">
                                            </button>
                                            <a href="/ruangan/{{ $ruang->id }}/edit"
                                                class="text-blue-600 hover:text-blue-800">
                                                <img src="/images/edit.svg" class="h-6 w-6" alt="Edit">
                                            </a>
                                        </div>
                                    </td>
                                </tr>
                            @endforeach
                        </tbody>
                    </table>
                </div>

                <div class="flex flex-col sm:flex-row justify-between items-center mt-4 space-y-2 sm:space-y-0">
                    <span class="text-sm">Menampilkan {{ $ruangs->firstItem() }} hingga {{ $ruangs->lastItem() }}
                        dari
                        {{ $ruangs->total() }} entri</span>
                    {{ $ruangs->links('pagination::simple-tailwind') }}
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
