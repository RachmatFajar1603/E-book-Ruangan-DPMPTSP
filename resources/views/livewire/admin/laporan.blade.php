<div>
    <main class="p-2 sm:p-4 sm:ml-64">
        <!-- Date Filter Section -->
        <div
            class="flex flex-col sm:flex-row justify-start items-start sm:items-center mb-8 space-y-4 sm:space-y-0 sm:space-x-4">
            <div class="flex flex-col sm:flex-row space-y-4 sm:space-y-0 sm:space-x-6 mb-4 sm:mb-0">
                <div>
                    <label for="start_date" class="block text-sm font-medium text-gray-700">Tanggal Awal</label>
                    <input type="date" wire:model.live="startDate" id="start_date"
                        class="w-full sm:w-auto border-gray-300 rounded-md px-4 py-2" placeholder="hh/bb/tttt">
                </div>
                <div>
                    <label for="end_date" class="block text-sm font-medium text-gray-700">Tanggal Akhir</label>
                    <input type="date" wire:model.live="endDate" id="end_date"
                        class="w-full sm:w-auto border-gray-300 rounded-md px-4 py-2" placeholder="hh/bb/tttt">
                </div>
            </div>
            <div class="flex space-x-2">
                <button wire:click="clearFilter"
                    class="w-full sm:w-auto bg-red-500 text-white px-4 py-2 rounded-md hover:bg-red-700 flex items-center justify-center">
                    <i class="fas fa-trash-alt h-5 w-5 mr-2"></i>
                    Bersihkan
                </button>
            </div>
        </div>

        <!-- Export Button -->
        <div class="flex justify-start mb-4">
            <button wire:click="exportExcel"
                class="w-full sm:w-auto bg-green-500 text-white px-3 py-2 rounded-md hover:bg-green-700 flex items-center justify-center">
                <svg xmlns="http://www.w3.org/2000/svg" class="h-6 w-6 mr-1" viewBox="0 0 128 128" id="excel-file">
                    <path fill="#FFFFFF"
                        d="M80 96h-8.3l-8-13-8 13H48l11.4-17.7-10.7-16.6h8L64.1 74l7.2-12.3h7.8l-10.8 17L80 96z"></path>
                    <path fill="#FFFFFF"
                        d="M104 126H24c-5.5 0-10-4.5-10-10V12c0-5.5 4.5-10 10-10h40.7c2.7 0 5.2 1 7.1 2.9l39.3 39.3c1.9 1.9 2.9 4.4 2.9 7.1V116c0 5.5-4.5 10-10 10zM24 6c-3.3 0-6 2.7-6 6v104c0 3.3 2.7 6 6 6h80c3.3 0 6-2.7 6-6V51.3c0-1.6-.6-3.1-1.8-4.2L68.9 7.8C67.8 6.6 66.3 6 64.7 6H24z">
                    </path>
                </svg>
                Ekspor Semua
            </button>
        </div>

        <!-- Users Table -->
        <div class="overflow-x-auto bg-white p-4 rounded-md shadow-md mt-6">
            <div
                class="flex flex-col sm:flex-row justify-between items-start sm:items-center mb-4 space-y-4 sm:space-y-0">
                <div class="w-full sm:w-auto">
                    <label class="mr-2">Tampilkan</label>
                    <select wire:model.live="perPage" class="border-gray-300 rounded-md">
                        <option value="10">10</option>
                        <option value="25">25</option>
                        <option value="50">50</option>
                        <option value="100">100</option>
                    </select>
                    <span class="ml-2">entri</span>
                </div>
                <div class="w-full sm:w-auto">
                    <label class="mr-2">Cari:</label>
                    <input type="text" wire:model.live.debounce.300ms="search"
                        class="w-full sm:w-auto border-gray-300 rounded-md" />
                </div>
            </div>

            <table class="min-w-full border-collapse w-full">
                <thead>
                    <tr>
                        <th class="border-b px-2 sm:px-4 py-2 text-left text-xs sm:text-sm">
                            <div class="flex items-center">
                                <span>NO</span>
                                <button wire:click="sortBy('id')" class="ml-1">
                                    @if ($sortField === 'id')
                                        @if ($sortDirection === 'asc')
                                            <i class="fas fa-sort-up"></i>
                                        @else
                                            <i class="fas fa-sort-down"></i>
                                        @endif
                                    @else
                                        <i class="fas fa-sort"></i>
                                    @endif
                                </button>
                            </div>
                        </th>
                        <th class="border-b px-2 sm:px-4 py-2 text-left text-xs sm:text-sm">
                            <div class="flex items-center">
                                <span>USERNAME</span>
                                <button wire:click="sortBy('user_id')" class="ml-1">
                                    @if ($sortField === 'user_id')
                                        @if ($sortDirection === 'asc')
                                            <i class="fas fa-sort-up"></i>
                                        @else
                                            <i class="fas fa-sort-down"></i>
                                        @endif
                                    @else
                                        <i class="fas fa-sort"></i>
                                    @endif
                                </button>
                            </div>
                        </th>
                        <th class="border-b px-2 sm:px-4 py-2 text-left text-xs sm:text-sm">
                            <div class="flex items-center">
                                <span>NIP/NO REG/NIK</span>
                                <button wire:click="sortBy('nip_reg')" class="ml-1">
                                    @if ($sortField === 'nip_reg')
                                        @if ($sortDirection === 'asc')
                                            <i class="fas fa-sort-up"></i>
                                        @else
                                            <i class="fas fa-sort-down"></i>
                                        @endif
                                    @else
                                        <i class="fas fa-sort"></i>
                                    @endif
                                </button>
                            </div>
                        </th>
                        <th class="border-b px-2 sm:px-4 py-2 text-left text-xs sm:text-sm">
                            <div class="flex items-center">
                                <span class="font-bold uppercase">BIDANG</span>
                                <button wire:click="sortBy('bidang')" class="ml-1">
                                    @if ($sortField === 'bidang')
                                        <i class="fas fa-sort-{{ $sortDirection === 'asc' ? 'up' : 'down' }}"></i>
                                    @else
                                        <i class="fas fa-sort"></i>
                                    @endif
                                </button>
                            </div>
                        </th>
                        <th class="border-b px-2 sm:px-4 py-2 text-left text-xs sm:text-sm">
                            <div class="flex items-center">
                                <span class="font-bold uppercase">PENANGGUNG JAWAB</span>
                                <button wire:click="sortBy('penanggung_jawab')" class="ml-1">
                                    @if ($sortField === 'penanggung_jawab')
                                        <i class="fas fa-sort-{{ $sortDirection === 'asc' ? 'up' : 'down' }}"></i>
                                    @else
                                        <i class="fas fa-sort"></i>
                                    @endif
                                </button>
                            </div>
                        </th>
                        <th class="border-b px-2 sm:px-4 py-2 text-left text-xs sm:text-sm">
                            <div class="flex items-center">
                                <span class="font-bold uppercase">RUANGAN</span>
                                <button wire:click="sortBy('ruangan')" class="ml-1">
                                    @if ($sortField === 'ruangan')
                                        <i class="fas fa-sort-{{ $sortDirection === 'asc' ? 'up' : 'down' }}"></i>
                                    @else
                                        <i class="fas fa-sort"></i>
                                    @endif
                                </button>
                            </div>
                        </th>
                        <th class="border-b px-2 sm:px-4 py-2 text-left text-xs sm:text-sm">
                            <div class="flex items-center">
                                <span class="font-bold uppercase">TGL.MULAI PEMINJAMAN</span>
                                <button wire:click="sortBy('tanggal_pinjam')" class="ml-1">
                                    @if ($sortField === 'tanggal_pinjam')
                                        <i class="fas fa-sort-{{ $sortDirection === 'asc' ? 'up' : 'down' }}"></i>
                                    @else
                                        <i class="fas fa-sort"></i>
                                    @endif
                                </button>
                            </div>
                        </th>
                        <th class="border-b px-2 sm:px-4 py-2 text-left text-xs sm:text-sm">
                            <div class="flex items-center">
                                <span class="font-bold uppercase">TGL. SELESAI PEMINJAMAN</span>
                                <button wire:click="sortBy('tanggal_selesai')" class="ml-1">
                                    @if ($sortField === 'tanggal_selesai')
                                        <i class="fas fa-sort-{{ $sortDirection === 'asc' ? 'up' : 'down' }}"></i>
                                    @else
                                        <i class="fas fa-sort"></i>
                                    @endif
                                </button>
                            </div>
                        </th>
                        <th class="border-b px-2 sm:px-4 py-2 text-left text-xs sm:text-sm">
                            <div class="flex items-center">
                                <span class="font-bold uppercase">WAKTU MULAI</span>
                                <button wire:click="sortBy('waktu_mulai')" class="ml-1">
                                    @if ($sortField === 'waktu_mulai')
                                        <i class="fas fa-sort-{{ $sortDirection === 'asc' ? 'up' : 'down' }}"></i>
                                    @else
                                        <i class="fas fa-sort"></i>
                                    @endif
                                </button>
                            </div>
                        </th>
                        <th class="border-b px-2 sm:px-4 py-2 text-left text-xs sm:text-sm">
                            <div class="flex items-center">
                                <span class="font-bold uppercase">WAKTU SELESAI</span>
                                <button wire:click="sortBy('waktu_selesai')" class="ml-1">
                                    @if ($sortField === 'waktu_selesai')
                                        <i class="fas fa-sort-{{ $sortDirection === 'asc' ? 'up' : 'down' }}"></i>
                                    @else
                                        <i class="fas fa-sort"></i>
                                    @endif
                                </button>
                            </div>
                        </th>
                        <th class="border-b px-2 sm:px-4 py-2 text-left text-xs sm:text-sm">
                            <div class="flex items-center">
                                <span class="font-bold uppercase">KEPERLUAN</span>
                                <button wire:click="sortBy('catatan')" class="ml-1">
                                    @if ($sortField === 'catatan')
                                        <i class="fas fa-sort-{{ $sortDirection === 'asc' ? 'up' : 'down' }}"></i>
                                    @else
                                        <i class="fas fa-sort"></i>
                                    @endif
                                </button>
                            </div>
                        </th>
                        <th class="border-b px-2 sm:px-4 py-2 text-left text-xs sm:text-sm">
                            <div class="flex items-center">
                                <span class="font-bold uppercase">JUMLAH YANG HADIR</span>
                                <button wire:click="sortBy('kapasitas')" class="ml-1">
                                    @if ($sortField === 'kapasitas')
                                        <i class="fas fa-sort-{{ $sortDirection === 'asc' ? 'up' : 'down' }}"></i>
                                    @else
                                        <i class="fas fa-sort"></i>
                                    @endif
                                </button>
                            </div>
                        </th>
                        <th class="border-b px-2 sm:px-3 py-2 text-left text-xs sm:text-sm">
                            <div class="flex items-center">
                                <span class="font-bold uppercase">STATUS</span>
                                <button wire:click="sortBy('status')" class="ml-1">
                                    @if ($sortField === 'status')
                                        <i class="fas fa-sort-{{ $sortDirection === 'asc' ? 'up' : 'down' }}"></i>
                                    @else
                                        <i class="fas fa-sort"></i>
                                    @endif
                                </button>
                            </div>
                        </th>
                    </tr>
                </thead>
                <tbody>
                    @foreach ($peminjaman as $item)
                        <tr
                            class="@if ($item->status == 'booked') bg-blue-100 @elseif($item->status == 'verified') bg-green-100 @else bg-red-100 @endif">
                            <td class="border-b px-2 sm:px-4 py-2 text-xs sm:text-sm">{{ $loop->iteration }}</td>
                            <td class="border-b px-2 sm:px-4 py-2 text-xs sm:text-sm">{{ $item->user->nama }}</td>
                            <td class="border-b px-2 sm:px-4 py-2 text-xs sm:text-sm">{{ $item->user->nip_reg }}</td>
                            <td class="border-b px-2 sm:px-4 py-2 text-xs sm:text-sm">{{ $item->user->bidang->nama }}
                            </td>
                            <td class="border-b px-2 sm:px-4 py-2 text-xs sm:text-sm">{{ $item->penanggung_jawab }}
                            </td>
                            <td class="border-b px-2 sm:px-4 py-2 text-xs sm:text-sm">{{ $item->ruangan->nama }}</td>
                            <td class="border-b px-2 sm:px-4 py-2 text-xs sm:text-sm">{{ $item->tanggal_pinjam }}</td>
                            <td class="border-b px-2 sm:px-4 py-2 text-xs sm:text-sm">{{ $item->tanggal_selesai }}
                            </td>
                            <td class="border-b px-2 sm:px-4 py-2 text-xs sm:text-sm">{{ $item->waktu_mulai }}</td>
                            <td class="border-b px-2 sm:px-4 py-2 text-xs sm:text-sm">{{ $item->waktu_selesai }}</td>
                            <td class="border-b px-2 sm:px-4 py-2 text-xs sm:text-sm">{{ $item->catatan }}</td>
                            <td class="border-b px-2 sm:px-4 py-2 text-xs sm:text-sm">{{ $item->kapasitas }}</td>
                            <td
                                class="border-b px-2 sm:px-4 py-2 text-xs sm:text-sm @if ($item->status == 'booked') text-yellow-400 @elseif($item->status == 'verified') text-green-400 @else text-red-400 @endif">
                                {{ ucfirst($item->status) }}
                            </td>
                        </tr>
                    @endforeach
                </tbody>
            </table>

            <!-- Pagination Controls -->
            <div class="mt-4">
                {{ $peminjaman->links() }}
            </div>
        </div>
    </main>
</div>
