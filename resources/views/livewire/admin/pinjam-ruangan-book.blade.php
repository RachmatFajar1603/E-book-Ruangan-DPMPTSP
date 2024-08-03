<div>
   <main class="p-4 sm:ml-64 grid grid-cols-3 space-x-8 font-poppins">
        <div class="bg-white col-span-2 p-8 text-center rounded-lg shadow">
            <p class="text-2xl text-blue-400">
                {{ $ruangan->nama }}
            </p>
            <div class="flex items-center my-4 mt-10">
                <div class="flex-grow border-t border-gray-400"></div>
                <span class="mx-4 text-gray-500">Data Peminjaman</span>
                <div class="flex-grow border-t border-gray-400"></div>
            </div>
            <form wire:submit.prevent="create">
                @csrf
                <div class="grid gap-6 mb-6 md:grid-cols-2">
                    <div>
                        <label for="penanggung_jawab" class="text-start block mb-2 text-sm font-medium text-gray-900 dark:text-white">Penanggung Jawab</label>
                        <input type="text" wire:model="penanggung_jawab" class="bg-gray-50 border border-gray-300 text-gray-900 text-sm rounded-lg focus:ring-blue-500 focus:border-blue-500 block w-full p-2.5 dark:bg-gray-700 dark:border-gray-600 dark:placeholder-gray-400 dark:text-white dark:focus:ring-blue-500 dark:focus:border-blue-500" required />
                    </div>
                    <div>
                        <label for="acara_kegiatan" class="text-start block mb-2 text-sm font-medium text-gray-900 dark:text-white">Acara/Kegiatan</label>
                        <input type="text" wire:model="acara_kegiatan" class="bg-gray-50 border border-gray-300 text-gray-900 text-sm rounded-lg focus:ring-blue-500 focus:border-blue-500 block w-full p-2.5 dark:bg-gray-700 dark:border-gray-600 dark:placeholder-gray-400 dark:text-white dark:focus:ring-blue-500 dark:focus:border-blue-500" required />
                    </div>
                    <div>
                        <label for="kapasitas" class="text-start block mb-2 text-sm font-medium text-gray-900 dark:text-white">Jumlah peserta</label>
                        <input type="number" wire:model="kapasitas" aria-describedby="helper-text-explanation" class="bg-gray-50 border border-gray-300 text-gray-900 text-sm rounded-lg focus:ring-blue-500 focus:border-blue-500 block w-full p-2.5 dark:bg-gray-700 dark:border-gray-600 dark:placeholder-gray-400 dark:text-white dark:focus:ring-blue-500 dark:focus:border-blue-500" required />
                    </div>
                    <div>
                        <label for="nomor_handphone" class="text-start block mb-2 text-sm font-medium text-gray-900 dark:text-white">Nomor Handphone</label>
                        <input type="tel" wire:model="nomor_handphone" pattern="[0-9]{3}-[0-9]{3}-[0-9]{4}" class="bg-gray-50 border border-gray-300 text-gray-900 text-sm rounded-lg focus:ring-blue-500 focus:border-blue-500 block w-full p-2.5 dark:bg-gray-700 dark:border-gray-600 dark:placeholder-gray-400 dark:text-white dark:focus:ring-blue-500 dark:focus:border-blue-500" placeholder="08XX-XXX-XXXX" required />
                    </div>
                    <input type="hidden" wire:model="ruang_id">
                    <div>
                        <label for="tanggal_pinjam" class="text-start block mb-2 text-sm font-medium text-gray-900 dark:text-white">Tanggal Pinjam</label>
                        <input type="date" wire:model="tanggal_pinjam" class="bg-gray-50 border border-gray-300 text-gray-900 text-sm rounded-lg focus:ring-blue-500 focus:border-blue-500 block w-full p-2.5 dark:bg-gray-700 dark:border-gray-600 dark:placeholder-gray-400 dark:text-white dark:focus:ring-blue-500 dark:focus:border-blue-500" placeholder="Pilih tanggal mulai dan selesai" required />
                    </div>
                    <div>
                        <label for="tanggal_selesai" class="text-start block mb-2 text-sm font-medium text-gray-900 dark:text-white">Tanggal Selesai</label>
                        <input type="date" wire:model="tanggal_selesai" class="bg-gray-50 border border-gray-300 text-gray-900 text-sm rounded-lg focus:ring-blue-500 focus:border-blue-500 block w-full p-2.5 dark:bg-gray-700 dark:border-gray-600 dark:placeholder-gray-400 dark:text-white dark:focus:ring-blue-500 dark:focus:border-blue-500" placeholder="Pilih tanggal mulai dan selesai" required />
                    </div>
                    <div>
                        <label for="waktu_mulai" class="text-start block mb-2 text-sm font-medium text-gray-900 dark:text-white">Waktu Mulai:</label>
                        <div class="flex">
                            <input type="time" wire:model="waktu_mulai" class="rounded-none rounded-s-lg bg-gray-50 border text-gray-900 leading-none focus:ring-blue-500 focus:border-blue-500 block flex-1 w-full text-sm border-gray-300 p-2.5 dark:bg-gray-700 dark:border-gray-600 dark:placeholder-gray-400 dark:text-white dark:focus:ring-blue-500 dark:focus:border-blue-500" min="09:00" max="18:00" value="00:00" required>
                            <span class="inline-flex items-center px-3 text-sm text-gray-900 bg-gray-200 border rounded-s-0 border-s-0 border-gray-300 rounded-e-md dark:bg-gray-600 dark:text-gray-400 dark:border-gray-600">
                                <svg class="w-4 h-4 text-gray-500 dark:text-gray-400" aria-hidden="true" xmlns="http://www.w3.org/2000/svg" fill="currentColor" viewBox="0 0 24 24">
                                    <path fill-rule="evenodd" d="M2 12C2 6.477 6.477 2 12 2s10 4.477 10 10-4.477 10-10 10S2 17.523 2 12Zm11-4a1 1 0 1 0-2 0v4a1 1 0 0 0 .293.707l3 3a1 1 0 0 0 1.414-1.414L13 11.586V8Z" clip-rule="evenodd"/>
                                </svg>
                            </span>
                        </div>
                    </div>
                    <div>
                        <label for="waktu_selesai" class="text-start block mb-2 text-sm font-medium text-gray-900 dark:text-white">Waktu Selesai:</label>
                        <div class="flex">
                            <input type="time" wire:model="waktu_selesai" class="rounded-none rounded-s-lg bg-gray-50 border text-gray-900 leading-none focus:ring-blue-500 focus:border-blue-500 block flex-1 w-full text-sm border-gray-300 p-2.5 dark:bg-gray-700 dark:border-gray-600 dark:placeholder-gray-400 dark:text-white dark:focus:ring-blue-500 dark:focus:border-blue-500" min="09:00" max="18:00" value="00:00" required>
                            <span class="inline-flex items-center px-3 text-sm text-gray-900 bg-gray-200 border rounded-s-0 border-s-0 border-gray-300 rounded-e-md dark:bg-gray-600 dark:text-gray-400 dark:border-gray-600">
                                <svg class="w-4 h-4 text-gray-500 dark:text-gray-400" aria-hidden="true" xmlns="http://www.w3.org/2000/svg" fill="currentColor" viewBox="0 0 24 24">
                                    <path fill-rule="evenodd" d="M2 12C2 6.477 6.477 2 12 2s10 4.477 10 10-4.477 10-10 10S2 17.523 2 12Zm11-4a1 1 0 1 0-2 0v4a1 1 0 0 0 .293.707l3 3a1 1 0 0 0 1.414-1.414L13 11.586V8Z" clip-rule="evenodd"/>
                                </svg>
                            </span>
                        </div>
                    </div>
                </div>
                <div class="flex items-center my-4 mt-10">
                    <div class="flex-grow border-t border-gray-400"></div>
                    <span class="mx-4 text-gray-500">Catatan</span>
                    <div class="flex-grow border-t border-gray-400"></div>
                </div>
                <div>
                    <label for="catatan" class="text-start block mb-2 text-sm font-medium text-gray-900 dark:text-white">Tambah pesan</label>
                    <textarea wire:model="catatan" rows="4" class="h-48 block p-2.5 w-full text-sm text-gray-900 bg-gray-50 rounded-lg border border-gray-300 focus:ring-blue-500 focus:border-blue-500 dark:bg-gray-700 dark:border-gray-600 dark:placeholder-gray-400 dark:text-white dark:focus:ring-blue-500 dark:focus:border-blue-500" ></textarea>
                </div>
                <button type="submit" class="my-8 text-white bg-blue-700 hover:bg-blue-800 focus:outline-none focus:ring-4 focus:ring-blue-300 font-medium rounded-lg text-sm px-5 py-2.5 text-center me-2 mb-2 dark:bg-blue-600 dark:hover:bg-blue-700 dark:focus:ring-blue-800">Submit</button>
            </form>
        </div>
        <div class="bg-white col-span p-8 rounded-lg shadow">
            <p class="text-2xl text-blue-400 text-center">
                Info Ruangan
            </p>
            <div class="flex items-center my-4 mt-10">
                <div class="flex-grow border-t border-gray-400"></div>
                <span class="mx-4 text-gray-500">Data Peminjaman</span>
                <div class="flex-grow border-t border-gray-400"></div>
            </div> 
            <img src="{{ $ruangan->image_url }} " alt="" class="w-full h-72 border mx-auto rounded-lg mt-8 object-cover">
            <p class="text-2xl text-gray-500 mt-4">
                {{ $ruangan->nama }}
            </p>
            <div class="mt-2 space-x-2">
                <span class="p-1 bg-gray-200 rounded text-gray-600">{{ $ruangan->lokasi }}</span>
                <span class="p-1 bg-gray-200 rounded text-gray-600">{{ $ruangan->kapasitas }} Orang </span>
            </div>
            <p class="text-gray-600 mt-4 text-xl">
                {{ $ruangan->deskripsi }}
            </p>
        </div>
   </main>
</div>
