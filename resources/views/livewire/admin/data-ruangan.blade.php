<div>
    <main class="p-4 sm:ml-64 font-poppins" >
       <div class="mt-4 grid grid-cols-3 gap-8 text-gray-600">
            <div class="bg-white p-6 rounded-md shadow-md flex items-center justify-between">
                <div>
                    <p class="text-2xl">
                        Ruangan
                    </p>
                    <p class="text-3xl mt-3">
                        0
                    </p>
                    <p class="text-xl mt-2">
                        Total ruangan keseluruhan
                    </p>
                </div>
                <div class="">
                    <img src="/images/database-line.png" class="p-4 bg-blue-200 rounded-md" alt="">
                </div>
            </div>
            <div class="bg-white p-6 rounded-md shadow-md flex items-center justify-between">
                <div>
                    <p class="text-2xl">
                        Tersedia
                    </p>
                    <p class="text-3xl mt-3">
                        0
                    </p>
                    <p class="text-xl mt-2">
                        Ruangan yang tersedia
                    </p>
                </div>
                <div class="">
                    <img src="/images/database-line.png" class="p-4 bg-green-300 rounded-md text-green-300" alt="">
                </div>
            </div>
            <div class="bg-white p-6 rounded-md shadow-md flex items-center justify-between">
                <div>
                    <p class="text-2xl">
                        Tidak tersedia
                    </p>
                    <p class="text-3xl mt-3">
                        0
                    </p>
                    <p class="text-xl mt-2">
                        Ruangan yang sedang dipinjam
                    </p>
                </div>
                <div class="">
                    <img src="/images/database-line.png" class="p-4 bg-red-300 rounded-md text-red-7000" alt="">
                </div>
            </div>
            <div class="bg-white p-6 rounded-md shadow-md">
                <form>
                    <div>
                        <label for="first_name" class="block mb-2 text-sm font-medium text-black">Nama Ruangan</label>
                        <input type="text" id="first_name" class="border border-gray-300 text-gray-900 text-sm rounded-lg focus:ring-blue-500 focus:border-blue-500 block w-full p-2.5"  required />
                    </div>
                    <div class="flex justify between mt-3 justify-center space-x-6">
                        <div class="w-1/2">
                            <label for="number-input" class="block mb-2 text-sm font-medium text-gray-900">Kapasitas</label>
                            <input type="number" id="number-input" aria-describedby="helper-text-explanation" class="bg-gray-50 border border-gray-300 text-gray-900 text-sm rounded-lg focus:ring-blue-500 focus:border-blue-500 block w-full p-2.5" required />
                        </div>
                        <div class="w-1/2">
                            <label for="countries" class="block mb-2 text-sm font-medium text-gray-900">Lokasi</label>
                            <select id="countries" class="bg-gray-50 border border-gray-300 text-gray-900 text-sm rounded-lg focus:ring-blue-500 focus:border-blue-500 block w-full p-2.5">
                              <option selected>Lokasi</option>
                              <option value="US">Lantai 1</option>
                              <option value="CA">Lantai 2</option>
                              <option value="FR">Lantai 3</option>
                              <option value="DE">Lantai 4</option>
                            </select>
                        </div>
                    </div>
                    <div>
                        <label for="message" class="block mb-2 text-sm font-medium text-gray-900 mt-3">Deskripsi</label>
                        <textarea id="message" rows="4" class=" h-48 block p-2.5 w-full text-sm text-gray-900 bg-gray-50 rounded-lg border border-gray-300 focus:ring-blue-500 focus:border-blue-500" placeholder="Tambahkan deskripsi..."></textarea>
                    </div>
                    <div class="mt-3">
                        <label for="countries" class="block mb-2 text-sm font-medium text-gray-900">Kepemilikan</label>
                        <select id="countries" class="bg-gray-50 border border-gray-300 text-gray-900 text-sm rounded-lg focus:ring-blue-500 focus:border-blue-500 block w-full p-2.5">
                          <option selected>Kepemilikan</option>
                          <option value="US">DATIN</option>
                          <option value="CA">DALAK</option>
                          <option value="FR">SEKRETARIAT</option>
                          <option value="DE">PROMOSI</option>
                        </select>
                    </div>
                    <div class="mt-4">
                        <label class="block mb-2 text-sm font-medium text-gray-900">Kelengkapan</label>
                        <div class="flex items-center mb-4">
                            <input id="ac" type="checkbox" value="AC" class="w-4 h-4 text-blue-600 bg-gray-100 border-gray-300 rounded focus:ring-blue-500 focus:ring-2">
                            <label for="ac" class="ml-2 text-sm font-medium text-gray-900">AC</label>
                        </div>
                        <div class="flex items-center mb-4">
                            <input id="table" type="checkbox" value="Meja" class="w-4 h-4 text-blue-600 bg-gray-100 border-gray-300 rounded focus:ring-blue-500 focus:ring-2">
                            <label for="table" class="ml-2 text-sm font-medium text-gray-900">Meja</label>
                        </div>
                        <div class="flex items-center mb-4">
                            <input id="chair" type="checkbox" value="Kursi" class="w-4 h-4 text-blue-600 bg-gray-100 border-gray-300 rounded focus:ring-blue-500 focus:ring-2">
                            <label for="chair" class="ml-2 text-sm font-medium text-gray-900">Kursi</label>
                        </div>
                        <div class="flex items-center mb-4">
                            <input id="projector" type="checkbox" value="Proyektor" class="w-4 h-4 text-blue-600 bg-gray-100 border-gray-300 rounded focus:ring-blue-500 focus:ring-2">
                            <label for="projector" class="ml-2 text-sm font-medium text-gray-900">Proyektor</label>
                        </div>
                    </div>
                    <div class="mt-3">
                        <label for="thumbnail" class="block mb-2 text-sm font-medium text-gray-900">THUMBNAIL <span class="text-red-500">*</span></label>
                        <div class="border-2 border-dashed border-gray-300 rounded-lg p-4 flex justify-center items-center">
                            <input id="thumbnail" type="file" class="hidden" accept="image/*" onchange="previewImage(event)" />
                            <label for="thumbnail" class="cursor-pointer flex flex-col items-center">
                                <span id="thumbnail-label" class="bg-gray-300 p-4 rounded-md">PILIH FILE</span>
                            </label>
                            <img id="thumbnail-preview" class="mt-4 hidden w-full h-full object-contain" />
                        </div>
                    </div>
                    <div class="flex justify-end">
                        <button type="button" class=" mt-6 text-white bg-blue-700 hover:bg-blue-800 focus:outline-none focus:ring-4 focus:ring-blue-300 font-medium rounded-lg text-sm px-5 py-2.5 text-center me-2 mb-2 dark:bg-blue-600 dark:hover:bg-blue-700 dark:focus:ring-blue-800">Submit</button>
                    </div>
                </form>
            </div>
            <div class="w-full col-span-2">
                <div class="bg-white p-4 rounded-md shadow-md">
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
                    <table class="border-collapse min-w-full w-full">
                        <thead>
                            <tr>
                                <th class="border-b px-4 py-4 text-left">NO</th>
                                <th class="border-b px-4 py-4 text-left">THUMBNAIL</th>
                                <th class="border-b px-4 py-4 text-left">NAMA</th>
                                <th class="border-b px-4 py-4 text-left">LOKASI</th>
                                <th class="border-b px-4 py-4 text-left">KAPASITAS</th>
                                <th class="border-b px-4 py-4 text-left">STATUS</th>
                            </tr>
                        </thead>
                        <tbody>
                            <tr class="">
                                <td class="border-b px-4 py-2 text-wrap w-6">
                                    1
                                </td>
                                <td class="border-b px-2 py-2">
                                    <img src="images/logo-dmptsp.png" class="w-28 h-12" alt="">
                                </td>
                                <td class="border-b px-4 py-2 w-4">
                                    Ruang rapat
                                </td>
                                <td class="border-b px-4 py-2">
                                    Lantai 2
                                </td>
                                <td class="border-b px-4 py-2">
                                    15 Orang
                                </td>
                                <td class="border-b px-4 py-2">
                                    <span class="p-2 bg-green-500 rounded text-white text-center">
                                        TERSEDIA
                                    </span>
                                </td>
                            </tr>
                    </table>
            </div>
       </div>
    </main>
 </div>
 
<script>
    function previewImage(event) {
        const input = event.target;
        const preview = document.getElementById('thumbnail-preview');
        const label = document.getElementById('thumbnail-label');
        const reader = new FileReader();
    
        reader.onload = function() {
            preview.src = reader.result;
            preview.classList.remove('hidden');
            label.classList.add('hidden');
        };
    
        if (input.files && input.files[0]) {
            reader.readAsDataURL(input.files[0]);
        }
    }
    </script>