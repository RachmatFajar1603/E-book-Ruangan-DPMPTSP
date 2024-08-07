<div>
    <main class="p-4 sm:ml-64">
        <div class="mt-8 grid grid-cols-1 sm:grid-cols-2 lg:grid-cols-4 gap-4 text-gray-600">
            <!-- Peminjaman Card -->
            <div class="bg-white p-4 rounded-md shadow-md flex items-center justify-between">
                <div>
                    <p class="text-xl sm:text-2xl">Peminjaman</p>
                    <p class="text-2xl sm:text-3xl mt-2">{{ $sumall }}</p>
                    <p class="text-lg sm:text-xl mt-1">Total Peminjaman</p>
                </div>
                <div class="flex items-center justify-center bg-blue-300 rounded-md p-3">
                    <img src="https://cdn-icons-png.flaticon.com/512/747/747310.png" class="h-5 w-5" alt="Calendar Icon">
                </div>
            </div>

            <!-- DiSetujui Card -->
            <div class="bg-white p-4 rounded-md shadow-md flex items-center justify-between">
                <div>
                    <p class="text-xl sm:text-2xl">DiSetujui</p>
                    <p class="text-2xl sm:text-3xl mt-2">{{ $sumverified }} <span
                            class="text-sm sm:text-lg text-green-500">(0%)</span></p>
                    <p class="text-lg sm:text-xl mt-1">Total DiSetujui</p>
                </div>
                <div class="flex items-center justify-center bg-green-200 rounded-md p-3">
                    <img src="https://cdn-icons-png.flaticon.com/512/190/190411.png" class="h-5 w-5"
                        alt="Checklist Icon">
                </div>
            </div>

            <!-- DiTolak Card -->
            <div class="bg-white p-4 rounded-md shadow-md flex items-center justify-between">
                <div>
                    <p class="text-xl sm:text-2xl">DiTolak</p>
                    <p class="text-2xl sm:text-3xl mt-2">{{ $sumrejected }} <span
                            class="text-sm sm:text-lg text-red-500">(0%)</span></p>
                    <p class="text-lg sm:text-xl mt-1">Total DiTolak</p>
                </div>
                <div class="flex items-center justify-center bg-red-200 rounded-md p-3">
                    <svg xmlns="http://www.w3.org/2000/svg" enable-background="new 0 0 64 64" viewBox="0 0 64 64"
                        class="h-5 w-5" alt="hand-palm-icon">
                        <!-- SVG path data -->
                    </svg>
                </div>
            </div>
        </div>

        <!-- Users Table -->
        <div class="bg-white p-4 rounded-md shadow-md mt-8 overflow-x-auto">
            <div class="flex flex-col sm:flex-row justify-between items-center mb-4">
                <div class="mb-2 sm:mb-0">
                    <label class="mr-2">Tampilkan</label>
                    <select wire:model.live="perPage" class="border-gray-300 rounded-md">
                        <option value="10">10</option>
                        <option value="25">25</option>
                        <option value="50">50</option>
                        <option value="100">100</option>
                    </select>
                    <span class="ml-2">entri</span>
                </div>
                <div>
                    <label class="mr-2">Cari:</label>
                    <input wire:model.live="search" type="text" class="border-gray-300 rounded-md" />
                </div>
            </div>

            <div class="overflow-x-auto">
                <table class="min-w-full border-collapse w-full">
                    <thead>
                        <tr>
                            <th class="border-b px-4 py-2 text-left">
                                <button wire:click="sortBy('id')" class="flex items-center">
                                    <span>NO</span>
                                    @if ($sortField === 'id')
                                        <i class="fas fa-sort-{{ $sortDirection === 'asc' ? 'up' : 'down' }} ml-1"></i>
                                    @else
                                        <i class="fas fa-sort ml-1"></i>
                                    @endif
                                </button>
                            </th>
                            <th class="border-b px-4 py-2 text-left">
                                <button wire:click="sortBy('user.nama')" class="flex items-center">
                                    <span>USERNAME</span>
                                    @if ($sortField === 'user.nama')
                                        <i class="fas fa-sort-{{ $sortDirection === 'asc' ? 'up' : 'down' }} ml-1"></i>
                                    @else
                                        <i class="fas fa-sort ml-1"></i>
                                    @endif
                                </button>
                            </th>
                            <th class="border-b px-4 py-2 text-left">
                                <button wire:click="sortBy('user.nip_reg')" class="flex items-center">
                                    <span>NIP/NO REG/NIK</span>
                                    @if ($sortField === 'user.nip_reg')
                                        <i class="fas fa-sort-{{ $sortDirection === 'asc' ? 'up' : 'down' }} ml-1"></i>
                                    @else
                                        <i class="fas fa-sort ml-1"></i>
                                    @endif
                                </button>
                            </th>
                            <th class="border-b px-4 py-2 text-left">
                                <button wire:click="sortBy('user.bidang.nama')" class="flex items-center">
                                    <span>BIDANG</span>
                                    @if ($sortField === 'user.bidang.nama')
                                        <i class="fas fa-sort-{{ $sortDirection === 'asc' ? 'up' : 'down' }} ml-1"></i>
                                    @else
                                        <i class="fas fa-sort ml-1"></i>
                                    @endif
                                </button>
                            </th>
                            <th class="border-b px-4 py-2 text-left">
                                <button wire:click="sortBy('penanggung_jawab')" class="flex items-center">
                                    <span>PENANGGUNG JAWAB</span>
                                    @if ($sortField === 'penanggung_jawab')
                                        <i class="fas fa-sort-{{ $sortDirection === 'asc' ? 'up' : 'down' }} ml-1"></i>
                                    @else
                                        <i class="fas fa-sort ml-1"></i>
                                    @endif
                                </button>
                            </th>
                            <th class="border-b px-4 py-2 text-left">
                                <button wire:click="sortBy('ruang.nama')" class="flex items-center">
                                    <span>RUANGAN</span>
                                    @if ($sortField === 'ruang.nama')
                                        <i class="fas fa-sort-{{ $sortDirection === 'asc' ? 'up' : 'down' }} ml-1"></i>
                                    @else
                                        <i class="fas fa-sort ml-1"></i>
                                    @endif
                                </button>
                            </th>
                            <th class="border-b px-4 py-2 text-left">
                                <button wire:click="sortBy('tanggal_pinjam')" class="flex items-center">
                                    <span>TGL.MULAI PEMINJAMAN</span>
                                    @if ($sortField === 'tanggal_pinjam')
                                        <i class="fas fa-sort-{{ $sortDirection === 'asc' ? 'up' : 'down' }} ml-1"></i>
                                    @else
                                        <i class="fas fa-sort ml-1"></i>
                                    @endif
                                </button>
                            </th>
                            <th class="border-b px-4 py-2 text-left">
                                <button wire:click="sortBy('tanggal_selesai')" class="flex items-center">
                                    <span>TGL. SELESAI PEMINJAMAN</span>
                                    @if ($sortField === 'tanggal_selesai')
                                        <i class="fas fa-sort-{{ $sortDirection === 'asc' ? 'up' : 'down' }} ml-1"></i>
                                    @else
                                        <i class="fas fa-sort ml-1"></i>
                                    @endif
                                </button>
                            </th>
                            <th class="border-b px-4 py-2 text-left">
                                <button wire:click="sortBy('waktu_mulai')" class="flex items-center">
                                    <span>WAKTU MULAI</span>
                                    @if ($sortField === 'waktu_mulai')
                                        <i class="fas fa-sort-{{ $sortDirection === 'asc' ? 'up' : 'down' }} ml-1"></i>
                                    @else
                                        <i class="fas fa-sort ml-1"></i>
                                    @endif
                                </button>
                            </th>
                            <th class="border-b px-4 py-2 text-left">
                                <button wire:click="sortBy('waktu_selesai')" class="flex items-center">
                                    <span>WAKTU SELESAI</span>
                                    @if ($sortField === 'waktu_selesai')
                                        <i class="fas fa-sort-{{ $sortDirection === 'asc' ? 'up' : 'down' }} ml-1"></i>
                                    @else
                                        <i class="fas fa-sort ml-1"></i>
                                    @endif
                                </button>
                            </th>
                            <th class="border-b px-4 py-2 text-left">
                                <button wire:click="sortBy('acara_kegiatan')" class="flex items-center">
                                    <span>KEPERLUAN</span>
                                    @if ($sortField === 'acara_kegiatan')
                                        <i
                                            class="fas fa-sort-{{ $sortDirection === 'asc' ? 'up' : 'down' }} ml-1"></i>
                                    @else
                                        <i class="fas fa-sort ml-1"></i>
                                    @endif
                                </button>
                            </th>
                            <th class="border-b px-4 py-2 text-left">
                                <button wire:click="sortBy('kapasitas')" class="flex items-center">
                                    <span>JUMLAH YANG HADIR</span>
                                    @if ($sortField === 'kapasitas')
                                        <i
                                            class="fas fa-sort-{{ $sortDirection === 'asc' ? 'up' : 'down' }} ml-1"></i>
                                    @else
                                        <i class="fas fa-sort ml-1"></i>
                                    @endif
                                </button>
                            </th>
                            <th class="border-b px-3 py-2 text-left">
                                <button wire:click="sortBy('status')" class="flex items-center">
                                    <span>STATUS</span>
                                    @if ($sortField === 'status')
                                        <i
                                            class="fas fa-sort-{{ $sortDirection === 'asc' ? 'up' : 'down' }} ml-1"></i>
                                    @else
                                        <i class="fas fa-sort ml-1"></i>
                                    @endif
                                </button>
                            </th>
                            @if (auth()->user()->can('approve_peminjaman') || auth()->user()->can('reject_peminjaman'))
                                <th class="border-b px-4 py-2 text-left">AKSI</th>
                            @endif
                        </tr>
                    </thead>
                    <tbody>
                        @foreach ($peminjaman as $item)
                            <tr
                                class="@if ($item->status == 'booked') bg-blue-100 @elseif ($item->status == 'verified') bg-green-100 @else bg-red-100 @endif">
                                <td class="border-b px-4 py-2">
                                    {{ ($peminjaman->currentPage() - 1) * $peminjaman->perPage() + $loop->iteration }}
                                </td>
                                <td class="border-b px-4 py-2">{{ $item->user->nama }}</td>
                                <td class="border-b px-4 py-2">{{ $item->user->nip_reg }}</td>
                                <td class="border-b px-4 py-2">{{ $item->user->bidang->nama }}</td>
                                <td class="border-b px-4 py-2">{{ $item->penanggung_jawab }}</td>
                                <td class="border-b px-4 py-2">{{ $item->ruang->nama }}</td>
                                <td class="border-b px-4 py-2">{{ $item->tanggal_pinjam }}</td>
                                <td class="border-b px-4 py-2">{{ $item->tanggal_selesai }}</td>
                                <td class="border-b px-4 py-2">{{ $item->waktu_mulai }}</td>
                                <td class="border-b px-4 py-2">{{ $item->waktu_selesai }}</td>
                                <td class="border-b px-4 py-2">{{ $item->acara_kegiatan }}</td>
                                <td class="border-b px-4 py-2">{{ $item->kapasitas }}</td>
                                <td
                                    class="border-b px-4 py-2 @if ($item->status == 'booked') text-yellow-400 @elseif ($item->status == 'verified') text-green-400 @else text-red-400 @endif">
                                    {{ ucfirst($item->status) }}
                                </td>
                                @if (auth()->user()->can('approve_peminjaman') || auth()->user()->can('reject_peminjaman'))
                                    <td class="border-b px-4 py-2">
                                        <div class="flex flex-col items-start space-y-2">
                                            @if ($item->status == 'booked')
                                                <button wire:click="approve({{ $item->id }})"
                                                    class="bg-green-500 text-white hover:bg-green-600 flex items-center px-2 py-1 rounded-lg">
                                                    <svg xmlns="http://www.w3.org/2000/svg" class="h-4 w-4"
                                                        fill="none" viewBox="0 0 24 24" stroke="currentColor">
                                                        <path stroke-linecap="round" stroke-linejoin="round"
                                                            stroke-width="2" d="M5 13l4 4L19 7" />
                                                    </svg>
                                                    <span class="ml-1">Approve</span>
                                                </button>
                                                <button wire:click="reject({{ $item->id }})"
                                                    class="bg-red-500 text-white hover:bg-red-600 flex items-center px-2 py-1 rounded-lg">
                                                    <svg xmlns="http://www.w3.org/2000/svg" class="h-4 w-4"
                                                        fill="none" viewBox="0 0 24 24" stroke="currentColor">
                                                        <path stroke-linecap="round" stroke-linejoin="round"
                                                            stroke-width="2" d="M6 18L18 6M6 6l12 12" />
                                                    </svg>
                                                    <span class="ml-1">Reject</span>
                                                </button>
                                            @elseif($editingId === $item->id)
                                                <select wire:model="editStatus" class="border-gray-300 rounded-md">
                                                    <option value="booked">Booked</option>
                                                    <option value="verified">Verified</option>
                                                    <option value="rejected">Rejected</option>
                                                </select>
                                                <button wire:click="saveEdit"
                                                    class="bg-blue-500 text-white hover:bg-blue-600 flex items-center px-2 py-1 rounded-lg mt-2">
                                                    <span class="ml-1">Save</span>
                                                </button>
                                                <button wire:click="cancelEdit"
                                                    class="bg-gray-500 text-white hover:bg-gray-600 flex items-center px-2 py-1 rounded-lg mt-2">
                                                    <span class="ml-1">Cancel</span>
                                                </button>
                                            @else
                                                <button wire:click="startEdit({{ $item->id }})"
                                                    class="bg-yellow-500 text-white hover:bg-yellow-600 flex items-center px-2 py-1 rounded-lg">
                                                    <svg xmlns="http://www.w3.org/2000/svg" class="h-4 w-4"
                                                        fill="none" viewBox="0 0 24 24" stroke="currentColor">
                                                        <path stroke-linecap="round" stroke-linejoin="round"
                                                            stroke-width="2"
                                                            d="M11 5H6a2 2 0 00-2 2v11a2 2 0 002 2h11a2 2 0 002-2v-5m-1.414-9.414a2 2 0 112.828 2.828L11.828 15H9v-2.828l8.586-8.586z" />
                                                    </svg>
                                                    <span class="ml-1">Edit</span>
                                                </button>
                                            @endif
                                        </div>
                                    </td>
                                @endif
                            </tr>
                        @endforeach
                    </tbody>
                </table>
            </div>
            <div class="flex flex-col sm:flex-row justify-between items-center mt-4">
                <span class="mb-2 sm:mb-0">Menampilkan {{ $peminjaman->firstItem() }} hingga
                    {{ $peminjaman->lastItem() }} dari {{ $peminjaman->total() }} entri</span>
                {{ $peminjaman->links('pagination::simple-tailwind') }}
            </div>
        </div>
    </main>
</div>
