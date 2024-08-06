<div>
    <main class="p-4 sm:ml-64">
        <div class="mt-8 grid grid-cols-1 md:grid-cols-4 gap-8 text-gray-600">
            <div class="bg-white p-6 rounded-md shadow-md flex items-center justify-between">
                <div>
                    <p class="text-2xl">Peminjaman</p>
                    <p class="text-3xl mt-3">{{ $sumall }}</p>
                    <p class="text-xl mt-2">Total Peminjaman</p>
                </div>
                <div class="flex items-center justify-center bg-blue-300 rounded-md p-4">
                    <img src="https://cdn-icons-png.flaticon.com/512/747/747310.png" class="h-5 w-5" alt="Calendar Icon">
                </div>
            </div>       
            <div class="bg-white p-6 rounded-md shadow-md flex items-center justify-between">
                    <div>
                        <p class="text-2xl">Peminjaman</p>
                        <p class="text-3xl mt-3">{{ $sumall }}</p>
                        <p class="text-xl mt-2">Total Peminjaman</p>
                    </div>
                    <div class="flex items-center justify-center bg-blue-300 rounded-md p-4">
                        <img src="https://cdn-icons-png.flaticon.com/512/747/747310.png" class="h-5 w-5" alt="Calendar Icon">
                    </div>
            </div>    
            <div class="bg-white p-6 rounded-md shadow-md flex items-center justify-between">
                    <div>
                        <p class="text-2xl">DiSetujui</p>
                        <p class="text-3xl mt-3">{{ $sumverified }} <span class="text-lg text-green-500">(0%)</span></p>
                        <p class="text-xl mt-2">Total DiSetujui</p>
                    </div>
                    <div class="flex items-center justify-center bg-blue-300 rounded-md p-4">
                        <img src="https://cdn-icons-png.flaticon.com/512/747/747310.png" class="h-5 w-5" alt="Calendar Icon">
                </div>
            </div>
        </div>
        <!-- Add Riwayat Button -->
        <div class="flex justify-start mt-7">
            <a href="#" class="bg-green-500 text-white px-3 py-2 rounded-md hover:bg-green-700 flex items-center">
                <svg xmlns="http://www.w3.org/2000/svg" class="h-6 w-6 mr-1" viewBox="0 0 24 24" fill="none"
                    stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round"
                    id="history-icon">
                    <path d="M12 8v4l2 2M12 2a10 10 0 1 0 10 10A10 10 0 0 0 12 2z"></path>
                </svg>
                Riwayat
            </a>
        </div>

        <!-- Users Table -->
        <div class="bg-white p-4 rounded-md shadow-md mt-8">
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
                <div>
                    <label class="mr-2">Cari:</label>
                    <input type="text" class="border-gray-300 rounded-md" wire:model.live="search"/>
                </div>
            </div>

            <table class="min-w-full border-collapse w-full">
                <thead>
                    <tr>
                        <th class="border-b px-4 py-4 text-left">NO</th>
                        <th class="border-b px-4 py-4 text-left">PENANGGUNG JAWAB</th>
                        <th class="border-b px-4 py-4 text-left">RUANGAN</th>
                        <th class="border-b px-4 py-4 text-left">TGL.MULAI PEMINJAMAN</th>
                        <th class="border-b px-4 py-4 text-left">TGL. SELESAI PEMINJAMAN</th>
                        <th class="border-b px-4 py-4 text-left">WAKTU MULAI</th>
                        <th class="border-b px-4 py-4 text-left">WAKTU SELESAI</th>
                        <th class="border-b px-4 py-4 text-left">KEPERLUAN</th>
                        <th class="border-b px-4 py-4 text-left">JUMLAH YANG HADIR</th>
                        <th class="border-b px-3 py-4 text-left">STATUS</th>
                        <th class="border-b px-4 py-4 text-left">AKSI</th>
                    </tr>
                </thead>
                <tbody>
                    @foreach($peminjaman as $item)
                    @if ($item->status == 'booked')
                        <tr class="bg-blue-100">
                        @elseif ($item->status == 'verified')
                        <tr class="bg-green-100">
                        @else
                        <tr class="bg-red-100">
                        @endif
                        <td class="border-b px-4 py-2">
                            {{ ($peminjaman->currentPage() - 1) * $peminjaman->perPage() + $loop->iteration }}
                        </td>
                        <td class="border-b px-4 py-2 flex items-center">{{ $item->penanggung_jawab }}</td>
                        <td class="border-b px-4 py-2">{{ $item->ruang->nama}}
                        <td class="border-b px-4 py-2">{{ $item->tanggal_pinjam }}
                        <td class="border-b px-4 py-2">{{ $item->tanggal_selesai }}
                        <td class="border-b px-4 py-2">{{ $item->waktu_mulai }}
                        <td class="border-b px-4 py-2">{{ $item->waktu_selesai }}
                        <td class="border-b px-4 py-2">{{ $item->acara_kegiatan }}</td>
                        <td class="border-b px-4 py-2">{{ $item->kapasitas }}
                        @if ($item->status == 'booked')
                        <td class="border-b px-4 py-2 text-yellow-400">Booked</td>
                        @elseif ($item->status == 'verified')
                        <td class="border-b px-4 py-2 text-green-400">Verified</td>
                        @elseif ($item->status == 'rejected')
                        <td class="border-b px-4 py-2 text-red-400">Rejected</td>
                        @endif
                        <td class="border-b px-4 py-2 flex space-x-2 mt-2">
                            <button class="text-red-600 hover:text-red-800">
                            <a href="/peminjamansaya/{{ $item->id }}/edit">
                            <img src ="/images/edit.svg"  class="h-6 w-6" fill="none" viewBox="0 0 24 24" stroke="currentColor">
                                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M6 18L18 6M6 6l12 12" />
                                </svg>
                                </a>
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
