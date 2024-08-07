<div>
    <main class="p-4 sm:ml-64">
        <div class="w-full mx-auto font-poppins">
            <div class="flex flex-col sm:flex-row justify-between mb-4">
                <div class="mb-4 sm:mb-0">
                    <label class="mr-2">Cari:</label>
                    <input type="text" class="border-gray-300 rounded-md w-full sm:w-auto" wire:model.live="search" />
                </div>
                <div class="bg-blue-500 w-full sm:w-fit mb-4 text-white rounded-md text-center">
                    <a wire:navigate href="pegawai-create" class="font-semibold block py-2 px-4">Tambah Pegawai</a>
                </div>
            </div>
            <div class="overflow-x-auto">
                <table
                    class="w-full rounded-lg text-sm text-left rtl:text-right text-gray-500 dark:text-gray-400 shadow-md">
                    <thead class="text-xs text-white uppercase bg-gray-500 dark:bg-gray-700 dark:text-gray-400">
                        <tr>
                            <th scope="col" class="px-6 py-3 w-10">
                                No
                            </th>
                            <th scope="col" class="px-6 py-3">
                                NIP
                            </th>
                            <th scope="col" class="px-6 py-3">
                                NAMA
                            </th>
                            <th scope="col" class="py-3">
                                Aksi
                            </th>
                        </tr>
                    </thead>
                    <tbody>
                        @foreach ($pegawais as $pegawai)
                            <tr
                                class="bg-white border-b dark:bg-gray-800 dark:border-gray-700 hover:bg-gray-50 dark:hover:bg-gray-600">
                                <td class="border-b px-4 py-2">
                                    {{ ($pegawais->currentPage() - 1) * $pegawais->perPage() + $loop->iteration }}
                                </td>
                                <td class="px-6 py-4">
                                    {{ $pegawai->nip }}
                                </td>
                                <td class="px-6 py-4">
                                    {{ $pegawai->nama }}
                                </td>
                                <td class="py-4">
                                    <div class="flex flex-col sm:flex-row space-y-2 sm:space-y-0 sm:space-x-2">
                                        <div class="bg-yellow-400 p-2 rounded-md text-white text-center">
                                            <a href="/pegawai/{{ $pegawai->id }}/update" class="block w-full">Edit</a>
                                        </div>
                                        <div class="bg-red-500 p-2 rounded-md text-white text-center">
                                            <button wire:click="delete({{ $pegawai->id }})"
                                                wire:confirm="Apakah anda yakin ingin menghapus pegawai ini?"
                                                class="w-full">
                                                Hapus
                                            </button>
                                        </div>
                                    </div>
                                </td>
                            </tr>
                        @endforeach
                    </tbody>
                </table>
            </div>
            <div class="flex flex-col sm:flex-row justify-between items-center mt-4 space-y-2 sm:space-y-0">
                <span class="text-sm">Menampilkan {{ $pegawais->firstItem() }} hingga {{ $pegawais->lastItem() }} dari
                    {{ $pegawais->total() }} entri</span>
                {{ $pegawais->links('pagination::simple-tailwind') }}
            </div>
        </div>
    </main>
</div>
