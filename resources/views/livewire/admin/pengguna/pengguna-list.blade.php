<div>
    <main class="p-4 sm:ml-64 font-poppins">
        <div class="mt-8 grid grid-cols-1 sm:grid-cols-2 lg:grid-cols-4 gap-4 text-gray-600">
            <!-- Pegawai Card -->
            <div class="bg-white p-4 sm:p-6 rounded-md shadow-md flex items-center justify-between">
                <div>
                    <p class="text-xl sm:text-2xl">Pegawai</p>
                    <p class="text-2xl sm:text-3xl mt-2">0</p>
                    <p class="text-lg sm:text-xl mt-1">Total Pegawai</p>
                </div>
                <div class="flex items-center justify-center bg-blue-200 rounded-md p-3 sm:p-4">
                    <svg xmlns="http://www.w3.org/2000/svg" class="h-5 w-5" viewBox="0 0 24 24" fill="none"
                        stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round">
                        <path
                            d="M12 14c2.21 0 4-1.79 4-4s-1.79-4-4-4-4 1.79-4 4 1.79 4 4 4zM12 14c-4.42 0-8 3.58-8 8h16c0-4.42-3.58-8-8-8z">
                        </path>
                    </svg>
                </div>
            </div>

            <!-- Admin Card -->
            <div class="bg-white p-4 sm:p-6 rounded-md shadow-md flex items-center justify-between">
                <div>
                    <p class="text-xl sm:text-2xl">Admin</p>
                    <p class="text-2xl sm:text-3xl mt-2">0</p>
                    <p class="text-lg sm:text-xl mt-1">Total Admin</p>
                </div>
                <div class="flex items-center justify-center bg-blue-400 rounded-md p-3 sm:p-4">
                    <img src="https://cdn-icons-png.flaticon.com/512/149/149071.png" class="h-5 w-5" alt="Admin Icon">
                </div>
            </div>

            <!-- Admin Bidang Card -->
            <div class="bg-white p-4 sm:p-6 rounded-md shadow-md flex items-center justify-between">
                <div>
                    <p class="text-xl sm:text-2xl">Admin Bidang</p>
                    <p class="text-2xl sm:text-3xl mt-2">0</p>
                    <p class="text-lg sm:text-xl mt-1">Total Admin Bidang</p>
                </div>
                <div class="flex items-center justify-center bg-blue-400 rounded-md p-3 sm:p-4">
                    <img src="https://cdn-icons-png.flaticon.com/512/149/149071.png" class="h-5 w-5"
                        alt="Admin Bidang Icon">
                </div>
            </div>

            <!-- Kepala Dinas Card -->
            <div class="bg-white p-4 sm:p-6 rounded-md shadow-md flex items-center justify-between">
                <div>
                    <p class="text-xl sm:text-2xl">Kepala Dinas</p>
                    <p class="text-2xl sm:text-3xl mt-2">0</p>
                    <p class="text-lg sm:text-xl mt-1">Total Kepala Dinas</p>
                </div>
                <div class="flex items-center justify-center bg-blue-400 rounded-md p-3 sm:p-4">
                    <img src="https://cdn-icons-png.flaticon.com/512/149/149071.png" class="h-5 w-5"
                        alt="Kepala Dinas Icon">
                </div>
            </div>
        </div>

        <!-- Users Table -->
        <div class="bg-white p-4 rounded-md shadow-md mt-8">
            <div class="flex flex-col sm:flex-row justify-between items-center mb-4 space-y-2 sm:space-y-0">
                <!-- Add User Button -->
                <div class="w-full sm:w-auto mb-2 sm:mb-0">
                    <a wire:navigate href="/datapenggunacreate"
                        class="bg-green-500 text-white px-4 py-2 rounded-md hover:bg-green-700 inline-block w-full sm:w-auto text-center">
                        + Tambah Pengguna
                    </a>
                </div>
                <div class="flex flex-col sm:flex-row items-center space-y-2 sm:space-y-0 sm:space-x-4">
                    <div class="flex items-center">
                        <label class="mr-2">Tampilkan</label>
                        <select class="border-gray-300 rounded-md">
                            <option value="10">10</option>
                            <option value="25">25</option>
                            <option value="50">50</option>
                            <option value="100">100</option>
                        </select>
                        <span class="ml-2">entri</span>
                    </div>
                    <div class="flex items-center">
                        <label class="mr-2">Cari:</label>
                        <input type="text" class="border-gray-300 rounded-md" wire:model.live="search" />
                    </div>
                </div>
            </div>

            <div class="overflow-x-auto">
                <table class="min-w-full border-collapse w-full">
                    <thead>
                        <tr>
                            <th class="border-b px-4 py-2 text-left">NO</th>
                            <th class="border-b px-4 py-2 text-left">PENGGUNA</th>
                            <th class="border-b px-4 py-2 text-left">EMAIL</th>
                            <th class="border-b px-4 py-2 text-left">NO. TELEPON</th>
                            <th class="border-b px-4 py-2 text-left">BIDANG</th>
                            <th class="border-b px-4 py-2 text-left">KET</th>
                            <th class="border-b px-4 py-2 text-left">ROLE</th>
                            <th class="border-b px-4 py-2 text-left">AKSI</th>
                        </tr>
                    </thead>
                    <tbody>
                        @foreach ($users as $user)
                            <tr class="bg-green-100">
                                <td class="border-b px-4 py-2">
                                    {{ ($users->currentPage() - 1) * $users->perPage() + $loop->iteration }}</td>
                                <td class="border-b px-4 py-2 flex items-center">
                                    {{ $user->nama }}
                                </td>
                                <td class="border-b px-4 py-2">{{ $user->email }}</td>
                                <td class="border-b px-4 py-2">{{ $user->telepon }}</td>
                                <td class="border-b px-4 py-2">{{ $user->bidang->nama }}</td>
                                <td class="border-b px-4 py-2">{{ $user->keterangan }}</td>
                                <td class="border-b px-4 py-2">
                                    @if ($user->hasRole('admin'))
                                        Admin
                                    @elseif($user->hasRole('admin_bidang'))
                                        Admin Bidang
                                    @elseif($user->hasRole('kepala_dinas'))
                                        Kepala Dinas
                                    @else
                                        User
                                    @endif
                                </td>
                                <td class="border-b px-4 py-2 flex space-x-2">
                                    <button wire:click="delete({{ $user->id }})"
                                        class="text-green-600 hover:text-green-800">
                                        <img src="/images/trash.svg" class="h-6 w-6" alt="Delete">
                                    </button>
                                    <a href="/pengguna/{{ $user->id }}/update"
                                        class="text-red-600 hover:text-red-800">
                                        <img src="/images/edit.svg" class="h-6 w-6" alt="Edit">
                                    </a>
                                </td>
                            </tr>
                        @endforeach
                    </tbody>
                </table>
            </div>

            <!-- Pagination Controls -->
            <div class="flex flex-col sm:flex-row justify-between items-center mt-4 space-y-2 sm:space-y-0">
                <span class="text-sm">Menampilkan {{ $users->firstItem() }} hingga {{ $users->lastItem() }} dari
                    {{ $users->total() }} entri</span>
                {{ $users->links('pagination::simple-tailwind') }}
            </div>
        </div>
    </main>
</div>
