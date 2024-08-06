<div>
    <main class="p-4 sm:ml-64">

<div class="mt-8 grid grid-cols-1 md:grid-cols-4 gap-20 text-gray-600 ">
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
        <div class="flex items-center justify-center bg-green-200 rounded-md p-4">
            <img src="https://cdn-icons-png.flaticon.com/512/190/190411.png" class="h-5 w-5" alt="Checklist Icon">
        </div>
    </div>

    <div class="bg-white p-6 rounded-md shadow-md flex items-center justify-between">
        <div>
            <p class="text-2xl">DiTolak</p>
            <p class="text-3xl mt-3">{{ $sumrejected }} <span class="text-lg text-red-500">(0%)</span></p>
            <p class="text-xl mt-2">Total DiTolak</p>
        </div>
        <div class="flex items-center justify-center bg-red-200 rounded-md p-4">
            <svg xmlns="http://www.w3.org/2000/svg" enable-background="new 0 0 64 64" viewBox="0 0 64 64" class="h-5 w-5" alt="hand-palm-icon">
                <path fill="#34495c" d="M34.16,57.53H1.43C0.64,57.53,0,56.89,0,56.1V3.15c0-0.79,0.64-1.43,1.43-1.43h53.84c0.79,0,1.43,0.64,1.43,1.43V33c0,0.79-0.64,1.43-1.43,1.43s-1.43-0.64-1.43-1.43V4.58H2.87v50.08h31.29c0.79,0,1.43,0.64,1.43,1.43C35.59,56.89,34.95,57.53,34.16,57.53z"></path>
                <path fill="#34495c" d="M18.5 23.24H8.87c-.79 0-1.43-.64-1.43-1.43s.64-1.43 1.43-1.43h9.63c.79 0 1.43.64 1.43 1.43S19.29 23.24 18.5 23.24zM33.17 23.24h-9.63c-.79 0-1.43-.64-1.43-1.43s.64-1.43 1.43-1.43h9.63c.79 0 1.43.64 1.43 1.43S33.96 23.24 33.17 23.24zM47.84 23.24h-9.63c-.79 0-1.43-.64-1.43-1.43s.64-1.43 1.43-1.43h9.63c.79 0 1.43.64 1.43 1.43S48.63 23.24 47.84 23.24zM18.5 31.94H8.87c-.79 0-1.43-.64-1.43-1.43s.64-1.43 1.43-1.43h9.63c.79 0 1.43.64 1.43 1.43S19.29 31.94 18.5 31.94zM33.17 31.94h-9.63c-.79 0-1.43-.64-1.43-1.43s.64-1.43 1.43-1.43h9.63c.79 0 1.43.64 1.43 1.43S33.96 31.94 33.17 31.94zM47.84 31.94h-9.63c-.79 0-1.43-.64-1.43-1.43s.64-1.43 1.43-1.43h9.63c.79 0 1.43.64 1.43 1.43S48.63 31.94 47.84 31.94z"></path>
                <g>
                    <path fill="#34495c" d="M18.5 40.64H8.87c-.79 0-1.43-.64-1.43-1.43 0-.79.64-1.43 1.43-1.43h9.63c.79 0 1.43.64 1.43 1.43C19.93 40 19.29 40.64 18.5 40.64zM33.17 40.64h-9.63c-.79 0-1.43-.64-1.43-1.43 0-.79.64-1.43 1.43-1.43h9.63c.79 0 1.43.64 1.43 1.43C34.6 40 33.96 40.64 33.17 40.64z"></path>
                </g>
                <g>
                    <path fill="#34495c" d="M18.5 49.35H8.87c-.79 0-1.43-.64-1.43-1.43s.64-1.43 1.43-1.43h9.63c.79 0 1.43.64 1.43 1.43S19.29 49.35 18.5 49.35zM33.17 49.35h-9.63c-.79 0-1.43-.64-1.43-1.43s.64-1.43 1.43-1.43h9.63c.79 0 1.43.64 1.43 1.43S33.96 49.35 33.17 49.35z"></path>
                </g>
                <g>
                    <path fill="#00aeef" d="M62.57,62.28c-0.37,0-0.73-0.14-1.01-0.42L38,38.31c-0.56-0.56-0.56-1.47,0-2.03c0.56-0.56,1.47-0.56,2.03,0l23.55,23.55c0.56,0.56,0.56,1.47,0,2.03C63.3,62.14,62.93,62.28,62.57,62.28z"></path>
                    <path fill="#00aeef" d="M62.57,62.28c-0.37,0-0.73-0.14-1.01-0.42L38,38.31c-0.56-0.56-0.56-1.47,0-2.03c0.56-0.56,1.47-0.56,2.03,0l23.55,23.55c0.56,0.56,0.56,1.47,0,2.03C63.3,62.14,62.93,62.28,62.57,62.28z"></path>
                    <path fill="#00aeef" d="M39.02,62.28c-0.37,0-0.73-0.14-1.01-0.42c-0.56-0.56-0.56-1.47,0-2.03l23.55-23.55c0.56-0.56,1.47-0.56,2.03,0c0.56,0.56,0.56,1.47,0,2.03L40.03,61.86C39.75,62.14,39.38,62.28,39.02,62.28z"></path>
                    <path fill="#00aeef" d="M39.02,62.28c-0.37,0-0.73-0.14-1.01-0.42c-0.56-0.56-0.56-1.47,0-2.03l23.55-23.55c0.56-0.56,1.47-0.56,2.03,0c0.56,0.56,0.56,1.47,0,2.03L40.03,61.86C39.75,62.14,39.38,62.28,39.02,62.28z"></path>
                </g>
                <g>
                    <path fill="#34495c" d="M55.27,14.52H1.43C0.64,14.52,0,13.88,0,13.09s0.64-1.43,1.43-1.43h53.84c0.79,0,1.43,0.64,1.43,1.43S56.07,14.52,55.27,14.52z"></path>
                </g>
            </svg>
        </div>
    </div>

</div>
            <!-- Add Riwayat Button -->
        <div class="flex justify-start mt-7">
            <a href="#" class="bg-green-500 text-white px-3 py-2 rounded-md hover:bg-green-700 flex items-center">
                <svg xmlns="http://www.w3.org/2000/svg" class="h-6 w-6 mr-1" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round" id="history-icon">
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
                    <input type="text" class="border-gray-300 rounded-md" wire:model.live="search"/>
                </div>
            </div>
            
            <table class="min-w-full border-collapse w-full">
                <thead>
                    <tr>
                        <th class="border-b px-4 py-4 text-left">NO</th>
                        <th class="border-b px-4 py-4 text-left">PENANGGUNG JAWAB</th>
                        <th class="border-b px-4 py-4 text-left">RUANGAN</th>
                        <th class="border-b px-4 py-4 text-left">TGL.MULAI PEMIJAMAN</th>
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
                            </button>
                        </td>
                    </tr>
                    @endforeach
                </tbody>
            </table>
            
            <!-- Pagination Controls -->
            <div class="flex justify-between items-center mt-4">
                <span>Menampilkan 1 hingga 1 dari 1 entri</span>
                <div class="flex space-x-1">
                    <button class="bg-gray-200 text-gray-600 px-3 py-1 rounded-md">Sebelumnya</button>
                    <button class="bg-green-500 text-white px-3 py-1 rounded-md">1</button>
                    <button class="bg-gray-200 text-gray-600 px-3 py-1 rounded-md">Selanjutnya</button>
                </div>
            </div>
        </div>
       
        </main>
    </div>
