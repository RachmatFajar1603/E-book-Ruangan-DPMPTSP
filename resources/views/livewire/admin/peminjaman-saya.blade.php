<div>
    <main class="p-4 sm:ml-64">

<div class="mt-8 grid grid-cols-1 md:grid-cols-4 gap-8 text-gray-600">
    <div class="bg-white p-8 rounded-md shadow-md flex items-center justify-between">
        <div>
            <p class="text-2xl">Peminjaman</p>
            <p class="text-3xl mt-3">0</p>
            <p class="text-xl mt-2">Total Peminjaman</p>
        </div>
        <div>
            <img src="/images/database-line.png" class="p-4 bg-blue-200 rounded-md" alt="">
        </div>
    </div>
    <div class="bg-white p-6 rounded-md shadow-md flex items-center justify-between">
        <div>
            <p class="text-2xl">Dibatalkan</p>
            <p class="text-3xl mt-3">0</p>
            <p class="text-xl mt-2">Total Dibatalkan</p>
        </div>
        <div>
            <img src="/images/database-line.png" class="p-4 bg-blue-200 rounded-md" alt="">
        </div>
    </div>
    <div class="bg-white p-6 rounded-md shadow-md flex items-center justify-between">
        <div>
            <p class="text-2xl">DiSetujui</p>
            <p class="text-3xl mt-3">0</p>
            <p class="text-xl mt-2">Total DiSetujui</p>
        </div>
        <div>
            <img src="/images/database-line.png" class="p-4 bg-blue-200 rounded-md" alt="">
        </div>
    </div>

    <div class="bg-white p-6 rounded-md shadow-md flex items-center justify-between">
        <div>
            <p class="text-2xl">DiTolak</p>
            <p class="text-3xl mt-3">0</p>
            <p class="text-xl mt-2">Total DiTolak</p>
        </div>
        <div>
            <img src="/images/database-line.png" class="p-4 bg-blue-200 rounded-md" alt="">
        </div>
    </div>

</div>

            <!-- Add User Button -->
        <div class="flex justify-start mt-7">
            <a href="/datapenggunacreate" class="bg-green-500 text-white px-3 py-2 rounded-md hover:bg-green-700 flex items-center">
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
                    <input type="text" class="border-gray-300 rounded-md" />
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
                    <tr class="bg-green-100">
                        <td class="border-b px-4 py-2">1</td>
                        <td class="border-b px-4 py-2 flex items-center">bg gafar</td>
                        <td class="border-b px-4 py-2">OPPROOM</td>
                        <td class="border-b px-4 py-2">12-02-2004</td>
                        <td class="border-b px-4 py-2">12-02-2004</td>
                        <td class="border-b px-4 py-2">10.00</td>
                        <td class="border-b px-4 py-2">12.00</td>
                        <td class="border-b px-4 py-2">RAPAT KERJA BIDANG SISTEM INFORMASI</td>
                        <td class="border-b px-4 py-2">12 Orang</td>
                        <td class="border-b px-4 py-2 text-yellow-400">PENDING</td>
                        <td class="border-b px-4 py-2 flex space-x-2 mt-3">
                         -
                        </td>
                    </tr>
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
