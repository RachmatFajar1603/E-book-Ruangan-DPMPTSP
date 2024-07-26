<div>
    <main class="p-4 sm:ml-64">

         <!-- Date Filter Section -->
         <div class="flex flex-col sm:flex-row justify-start items-center mb-8 space-y-4 sm:space-y-0 sm:space-x-4">
            <div class="flex flex-col sm:flex-row space-x-6 mb-8 mt-6">
                <div>
                    <label for="start_date" class="block text-sm font-medium text-gray-700">Tanggal Awal</label>
                    <input type="date" id="start_date" class="border-gray-300 rounded-md px-8" placeholder="hh/bb/tttt">
                </div>
                <div>
                    <label for="end_date" class="block text-sm font-medium text-gray-700">Tanggal Akhir</label>
                    <input type="date" id="end_date" class="border-gray-300 rounded-md px-8 mr-3" placeholder="hh/bb/tttt">
                </div>
            </div>
            
            <div class="flex space-x-2">
               <!-- Include Font Awesome CDN -->
                <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.0.0-beta3/css/all.min.css">

                <!-- Buttons with Font Awesome Icons -->
                <div class="flex space-x-2">
                    <button class="bg-blue-500 text-white px-4 py-2 rounded-md hover:bg-blue-700 flex items-center mt-3">
                        <i class="fas fa-filter h-5 w-5 mr-2"></i>
                        Filter
                    </button>
                    <button class="bg-red-500 text-white px-4 py-2 rounded-md hover:bg-red-700 flex items-center mt-3">
                        <i class="fas fa-trash-alt h-5 w-5 mr-2"></i>
                        Bersihkan
                    </button>
            </div>

            </div>
        </div>

                <!-- Add User Button -->
        <div class="flex justify-start mb-4">
            <a href="/datapenggunacreate" class="bg-green-500 text-white px-3 py-2 rounded-md hover:bg-green-700 flex items-center">
                <svg xmlns="http://www.w3.org/2000/svg" class="h-6 w-6 mr-1" viewBox="0 0 128 128" id="excel-file">
                    <path fill="#FFFFFF" d="M80 96h-8.3l-8-13-8 13H48l11.4-17.7-10.7-16.6h8L64.1 74l7.2-12.3h7.8l-10.8 17L80 96z"></path>
                    <path fill="#FFFFFF" d="M104 126H24c-5.5 0-10-4.5-10-10V12c0-5.5 4.5-10 10-10h40.7c2.7 0 5.2 1 7.1 2.9l39.3 39.3c1.9 1.9 2.9 4.4 2.9 7.1V116c0 5.5-4.5 10-10 10zM24 6c-3.3 0-6 2.7-6 6v104c0 3.3 2.7 6 6 6h80c3.3 0 6-2.7 6-6V51.3c0-1.6-.6-3.1-1.8-4.2L68.9 7.8C67.8 6.6 66.3 6 64.7 6H24z"></path>
                </svg>
                Ekspor Semua
            </a>
        </div>

        <!-- Users Table -->
        <div class="bg-white p-4 rounded-md shadow-md mt-6">
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
                        <th class="border-b px-4 py-4 text-left">TGL. MULAI PEMINJAMAN</th>
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
                        <td class="border-b px-4 py-2">bg gafar</td>
                        <td class="border-b px-4 py-2">OPPROOM</td>
                        <td class="border-b px-4 py-2">12-02-2004</td>
                        <td class="border-b px-4 py-2">12-02-2004</td>
                        <td class="border-b px-4 py-2">10.00</td>
                        <td class="border-b px-4 py-2">12.00</td>
                        <td class="border-b px-4 py-2">RAPAT KERJA BIDANG SISTEM INFORMASI</td>
                        <td class="border-b px-4 py-2">12 Orang</td>
                        <td class="border-b px-4 py-2 text-green-500">DITERIMA</td>
                        <td class="border-b px-4 py-2 flex space-x-2 mt-3">-</td>
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
