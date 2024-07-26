<div>
    <main class="p-4 sm:ml-64">

<div class="mt-8 grid grid-cols-1 md:grid-cols-4 gap-8 text-gray-600">
    <div class="bg-white p-8 rounded-md shadow-md flex items-center justify-between">
        <div>
            <p class="text-2xl">Pegawai</p>
            <p class="text-3xl mt-3">0</p>
            <p class="text-xl mt-2">Total Pegawai</p>
        </div>
        <div class="flex items-center justify-center bg-blue-200 rounded-md p-4">
            <svg xmlns="http://www.w3.org/2000/svg" class="h-5 w-5" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round">
                <path d="M12 14c2.21 0 4-1.79 4-4s-1.79-4-4-4-4 1.79-4 4 1.79 4 4 4zM12 14c-4.42 0-8 3.58-8 8h16c0-4.42-3.58-8-8-8z"></path>
            </svg>
        </div>
    </div>


    <div class="bg-white p-6 rounded-md shadow-md flex items-center justify-between">
        <div>
            <p class="text-2xl">Admin</p>
            <p class="text-3xl mt-3">0</p>
            <p class="text-xl mt-2">Total Admin</p>
        </div>
        <div class="flex items-center justify-center bg-blue-400 rounded-md p-4">
            <img src="https://cdn-icons-png.flaticon.com/512/149/149071.png" class="h-5 w-5" alt="Admin Bidang Icon">
        </div>
    </div>
    <div class="bg-white p-6 rounded-md shadow-md flex items-center justify-between">
        <div>
            <p class="text-2xl">Admin Bidang</p>
            <p class="text-3xl mt-3">0</p>
            <p class="text-xl mt-2">Total Admin Bidang</p>
        </div>
        <div class="flex items-center justify-center bg-blue-400 rounded-md p-4">
            <img src="https://cdn-icons-png.flaticon.com/512/149/149071.png" class="h-5 w-5" alt="Admin Bidang Icon">
        </div>
    </div>
    <div class="bg-white p-6 rounded-md shadow-md flex items-center justify-between">
        <div>
            <p class="text-2xl">Kepala Dinas</p>
            <p class="text-3xl mt-3">0</p>
            <p class="text-xl mt-2">Total Kepala Dinas</p>
        </div>
        <div class="flex items-center justify-center bg-blue-400 rounded-md p-4">
            <img src="https://cdn-icons-png.flaticon.com/512/149/149071.png" class="h-5 w-5" alt="Admin Bidang Icon">
        </div>
    </div>
</div>




        <!-- Users Table -->
        <div class="bg-white p-4 rounded-md shadow-md mt-8">
            <div class="flex justify-between items-center mb-4">

                 <!-- Add User Button -->
        <div class="flex justify-end mb-4">
            <a href="/datapenggunacreate" class="bg-green-500 text-white px-4 py-2 rounded-md hover:bg-green-700">
                + Tambah Pengguna
            </a>
        </div>
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
                        <th class="border-b px-4 py-4 text-left">PENGGUNA</th>
                        <th class="border-b px-4 py-4 text-left">EMAIL</th>
                        <th class="border-b px-4 py-4 text-left">NO. TELEPON</th>
                        <th class="border-b px-4 py-4 text-left">BIDANG</th>
                        <th class="border-b px-4 py-4 text-left">ROLE</th>
                        <th class="border-b px-4 py-4 text-left">AKSI</th>
                    </tr>
                </thead>
                <tbody>
                    <tr class="bg-green-100">
                        <td class="border-b px-4 py-2">1</td>
                        <td class="border-b px-4 py-2 flex items-center">
                            <span class="bg-purple-200 text-purple-700 rounded-full h-8 w-8 flex items-center justify-center mr-2">A5</span>
                            Admin Siparu
                        </td>
                        <td class="border-b px-4 py-2">admin@gmail.com</td>
                        <td class="border-b px-4 py-2">081314697305</td>
                        <td class="border-b px-4 py-2">-</td>
                        <td class="border-b px-4 py-2">ADMIN</td>
                        <td class="border-b px-4 py-2 flex space-x-2">
                            <button class="text-green-600 hover:text-green-800">
                                <img src ="/images/trash.svg" class="h-6 w-6" fill="none" viewBox="0 0 24 24" stroke="currentColor">
                                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M5 13l4 4L19 7" />
                                </=>
                            </button>
                            <button class="text-red-600 hover:text-red-800">
                                <img src ="/images/edit.svg"  class="h-6 w-6" fill="none" viewBox="0 0 24 24" stroke="currentColor">
                                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M6 18L18 6M6 6l12 12" />
                                </svg>
                            </button>
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
