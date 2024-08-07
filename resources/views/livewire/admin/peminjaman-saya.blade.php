<div>
    <main class="p-4 sm:ml-64">
        <div class="mt-8 grid grid-cols-1 sm:grid-cols-2 lg:grid-cols-3 gap-4 text-gray-600">
            <div class="bg-white p-4 sm:p-6 rounded-md shadow-md flex items-center justify-between">
                <div>
                    <p class="text-lg sm:text-2xl">Peminjaman</p>
                    <p class="text-2xl sm:text-3xl mt-2 sm:mt-3">{{ $sumall }}</p>
                    <p class="text-base sm:text-xl mt-1 sm:mt-2">Total Peminjaman</p>
                </div>
                <div class="flex items-center justify-center bg-blue-300 rounded-md p-3 sm:p-4">
                    <img src="https://cdn-icons-png.flaticon.com/512/747/747310.png" class="h-4 w-4 sm:h-5 sm:w-5"
                        alt="Calendar Icon">
                </div>
            </div>
            <div class="bg-white p-4 sm:p-6 rounded-md shadow-md flex items-center justify-between">
                <div>
                    <p class="text-lg sm:text-2xl">Peminjaman</p>
                    <p class="text-2xl sm:text-3xl mt-2 sm:mt-3">{{ $sumall }}</p>
                    <p class="text-base sm:text-xl mt-1 sm:mt-2">Total Peminjaman</p>
                </div>
                <div class="flex items-center justify-center bg-blue-300 rounded-md p-3 sm:p-4">
                    <img src="https://cdn-icons-png.flaticon.com/512/747/747310.png" class="h-4 w-4 sm:h-5 sm:w-5"
                        alt="Calendar Icon">
                </div>
            </div>
            <div class="bg-white p-4 sm:p-6 rounded-md shadow-md flex items-center justify-between">
                <div>
                    <p class="text-lg sm:text-2xl">DiSetujui</p>
                    <p class="text-2xl sm:text-3xl mt-2 sm:mt-3">{{ $sumverified }} <span
                            class="text-sm sm:text-lg text-green-500">(0%)</span></p>
                    <p class="text-base sm:text-xl mt-1 sm:mt-2">Total DiSetujui</p>
                </div>
                <div class="flex items-center justify-center bg-blue-300 rounded-md p-3 sm:p-4">
                    <img src="https://cdn-icons-png.flaticon.com/512/747/747310.png" class="h-4 w-4 sm:h-5 sm:w-5"
                        alt="Calendar Icon">
                </div>
            </div>
        </div>

        <!-- Add Riwayat Button -->
        <div class="flex justify-start mt-7">
            <a href="#" class="bg-green-500 text-white px-3 py-2 rounded-md hover:bg-green-700 flex items-center">
                <svg xmlns="http://www.w3.org/2000/svg" class="h-5 w-5 mr-1" viewBox="0 0 24 24" fill="none"
                    stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round"
                    id="history-icon">
                    <path d="M12 8v4l2 2M12 2a10 10 0 1 0 10 10A10 10 0 0 0 12 2z"></path>
                </svg>
                Riwayat
            </a>
        </div>

        <!-- Users Table -->
        <div class="bg-white p-4 rounded-md shadow-md mt-8 overflow-x-auto">
            <div
                class="flex flex-col sm:flex-row justify-between items-start sm:items-center mb-4 space-y-2 sm:space-y-0">
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
                <div class="w-full sm:w-auto mt-2 sm:mt-0">
                    <label class="mr-2">Cari:</label>
                    <input type="text" class="border-gray-300 rounded-md w-full sm:w-auto"
                        wire:model.live="search" />
                </div>
            </div>

            <div class="overflow-x-auto">
                <table class="min-w-full border-collapse w-full">
                    <thead>
                        <tr>
                            <th class="border-b px-2 sm:px-4 py-2 text-left text-xs sm:text-sm">NO</th>
                            <th class="border-b px-2 sm:px-4 py-2 text-left text-xs sm:text-sm">
                                <div class="flex items-center">
                                    <span>PENANGGUNG JAWAB</span>
                                    <button wire:click="sortBy('penanggung_jawab')" class="ml-1">
                                        @if ($sortField === 'penanggung_jawab')
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
                                    <span>RUANGAN</span>
                                    <button wire:click="sortBy('ruang_id')" class="ml-1">
                                        @if ($sortField === 'ruang_id')
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
                                    <span>TGL.MULAI</span>
                                    <button wire:click="sortBy('tanggal_pinjam')" class="ml-1">
                                        @if ($sortField === 'tanggal_pinjam')
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
                                    <span>TGL.SELESAI</span>
                                    <button wire:click="sortBy('tanggal_selesai')" class="ml-1">
                                        @if ($sortField === 'tanggal_selesai')
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
                                    <span>WAKTU MULAI</span>
                                    <button wire:click="sortBy('waktu_mulai')" class="ml-1">
                                        @if ($sortField === 'waktu_mulai')
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
                                    <span>WAKTU SELESAI</span>
                                    <button wire:click="sortBy('waktu_selesai')" class="ml-1">
                                        @if ($sortField === 'waktu_selesai')
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
                                    <span>KEPERLUAN</span>
                                    <button wire:click="sortBy('acara_kegiatan')" class="ml-1">
                                        @if ($sortField === 'acara_kegiatan')
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
                                    <span>JUMLAH HADIR</span>
                                    <button wire:click="sortBy('kapasitas')" class="ml-1">
                                        @if ($sortField === 'kapasitas')
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
                            <th class="border-b px-2 sm:px-3 py-2 text-left text-xs sm:text-sm">
                                <div class="flex items-center">
                                    <span>STATUS</span>
                                    <button wire:click="sortBy('status')" class="ml-1">
                                        @if ($sortField === 'status')
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
                            <th class="border-b px-2 sm:px-4 py-2 text-left text-xs sm:text-sm">AKSI</th>
                        </tr>
                    </thead>
                    <tbody>
                        @foreach ($peminjaman as $item)
                            <tr
                                class="@if ($item->status == 'booked') bg-blue-100 @elseif($item->status == 'verified') bg-green-100 @else bg-red-100 @endif">
                                <td class="border-b px-2 sm:px-4 py-2 text-xs sm:text-sm">
                                    {{ ($peminjaman->currentPage() - 1) * $peminjaman->perPage() + $loop->iteration }}
                                </td>
                                <td class="border-b px-2 sm:px-4 py-2 text-xs sm:text-sm flex items-center">
                                    {{ $item->penanggung_jawab }}</td>
                                <td class="border-b px-2 sm:px-4 py-2 text-xs sm:text-sm">{{ $item->ruang->nama }}</td>
                                <td class="border-b px-2 sm:px-4 py-2 text-xs sm:text-sm">{{ $item->tanggal_pinjam }}
                                </td>
                                <td class="border-b px-2 sm:px-4 py-2 text-xs sm:text-sm">{{ $item->tanggal_selesai }}
                                </td>
                                <td class="border-b px-2 sm:px-4 py-2 text-xs sm:text-sm">{{ $item->waktu_mulai }}</td>
                                <td class="border-b px-2 sm:px-4 py-2 text-xs sm:text-sm">{{ $item->waktu_selesai }}
                                </td>
                                <td class="border-b px-2 sm:px-4 py-2 text-xs sm:text-sm">{{ $item->acara_kegiatan }}
                                </td>
                                <td class="border-b px-2 sm:px-4 py-2 text-xs sm:text-sm">{{ $item->kapasitas }}</td>
                                <td
                                    class="border-b px-2 sm:px-4 py-2 text-xs sm:text-sm
                                @if ($item->status == 'booked') text-yellow-400
                                @elseif ($item->status == 'verified') text-green-400
                                @else text-red-400 @endif">
                                    {{ ucfirst($item->status) }}
                                </td>
                                <td class="border-b px-2 sm:px-4 py-2 text-xs sm:text-sm">
                                    <a href="/peminjamansaya/{{ $item->id }}/edit"
                                        class="text-red-600 hover:text-red-800">
                                        <img src="/images/edit.svg" class="h-4 w-4 sm:h-6 sm:w-6" alt="Edit">
                                    </a>
                                </td>
                            </tr>
                        @endforeach
                    </tbody>
                </table>
            </div>

            <!-- Pagination Controls -->
            <div class="mt-4">
                {{ $peminjaman->links() }}
            </div>
        </div>
    </main>
</div>
