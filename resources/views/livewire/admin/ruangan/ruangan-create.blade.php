<div>
    <main class="p-4 sm:ml-64 font-poppins">
        <div class="bg-white p-6 rounded-md shadow-md">
            <form wire:submit.prevent="create">
                <div>
                    <label for="nama" class="block mb-2 text-sm font-medium text-black">Nama Ruangan</label>
                    <input type="text" wire:model="nama"
                        class="border border-gray-300 text-gray-900 text-sm rounded-lg focus:ring-blue-500 focus:border-blue-500 block w-full p-2.5"
                        required />
                </div>
                <div class="flex justify between mt-3 justify-center space-x-6">
                    <div class="w-1/2">
                        <label for="kapasitas"
                            class="block mb-2 text-sm font-medium text-gray-900">Kapasitas</label>
                        <input type="number" wire:model="kapasitas" aria-describedby="helper-text-explanation"
                            class="bg-gray-50 border border-gray-300 text-gray-900 text-sm rounded-lg focus:ring-blue-500 focus:border-blue-500 block w-full p-2.5"
                            required />
                    </div>
                    <div class="w-1/2">
                        <label for="lokasi" class="block mb-2 text-sm font-medium text-gray-900">Lokasi</label>
                        <select wire:model="lokasi"
                            class="bg-gray-50 border border-gray-300 text-gray-900 text-sm rounded-lg focus:ring-blue-500 focus:border-blue-500 block w-full p-2.5">
                            <option selected>Lokasi</option>
                            <option value="Lantai 1">Lantai 1</option>
                            <option value="Lantai 2">Lantai 2</option>
                            <option value="Lantai 3">Lantai 3</option>
                            <option value="Lantai 4">Lantai 4</option>
                        </select>
                    </div>
                </div>
                <div>
                    <label for="deskripsi"
                        class="block mb-2 text-sm font-medium text-gray-900 mt-3">Deskripsi</label>
                    <textarea wire:model="deskripsi" rows="4"
                        class=" h-48 block p-2.5 w-full text-sm text-gray-900 bg-gray-50 rounded-lg border border-gray-300 focus:ring-blue-500 focus:border-blue-500"
                        placeholder="Tambahkan deskripsi..."></textarea>
                </div>
                <div class="mt-3">
                    <label for="kepemilikan"
                        class="block mb-2 text-sm font-medium text-gray-900">Kepemilikan</label>
                    <select wire:model="kepemilikan"
                        class="bg-gray-50 border border-gray-300 text-gray-900 text-sm rounded-lg focus:ring-blue-500 focus:border-blue-500 block w-full p-2.5">
                        <option selected>Kepemilikan</option>
                        @foreach ($bidangs as $item)
                        <option value="{{ $item->id }}">{{ $item->nama }}</option>
                        @endforeach
                    </select>
                </div>
                <div class="mt-4">
                    <label class="block mb-2 text-sm font-medium text-gray-900">Kelengkapan</label>
                    <div class="flex items-center mb-4">
                        <input wire:model="ac" type="checkbox" value="1"
                            class="w-4 h-4 text-blue-600 bg-gray-100 border-gray-300 rounded focus:ring-blue-500 focus:ring-2">
                        <label for="ac" class="ml-2 text-sm font-medium text-gray-900">AC</label>
                    </div>
                    <div class="flex items-center mb-4">
                        <input wire:model="meja" type="checkbox" value="1"
                            class="w-4 h-4 text-blue-600 bg-gray-100 border-gray-300 rounded focus:ring-blue-500 focus:ring-2">
                        <label for="meja" class="ml-2 text-sm font-medium text-gray-900">Meja</label>
                    </div>
                    <div class="flex items-center mb-4">
                        <input wire:model="kursi" type="checkbox" value="1"
                            class="w-4 h-4 text-blue-600 bg-gray-100 border-gray-300 rounded focus:ring-blue-500 focus:ring-2">
                        <label for="kursi" class="ml-2 text-sm font-medium text-gray-900">Kursi</label>
                    </div>
                    <div class="flex items-center mb-4">
                        <input wire:model="projector" type="checkbox" value="1"
                            class="w-4 h-4 text-blue-600 bg-gray-100 border-gray-300 rounded focus:ring-blue-500 focus:ring-2">
                        <label for="projector" class="ml-2 text-sm font-medium text-gray-900">Proyektor</label>
                    </div>
                </div>
                <div class="mt-3">
                    <label for="image" class="block mb-2 text-sm font-medium text-gray-900">Pilih Foto <span class="text-red-500">*</span></label>
                    <input wire:model="image" type="file" id="fileInput" class="hidden" accept="image/*" onchange="previewImage(event)" />
                    <label for="fileInput" id="fileLabel" class="cursor-pointer flex flex-col items-center">
                        <span class="bg-gray-300 p-4 rounded-md">PILIH FILE</span>
                    </label>
                    @if ($thumbnailPreview)
                    <img id="thumbnailPreview" src="{{ $thumbnailPreview }}" class="mt-4 w-full h-full object-contain" />
                    @else
                    <img id="thumbnailPreview" class="hidden mt-4 w-full h-full object-cover" />
                    @endif
                </div>                                    
                <div class="flex justify-end">
                    <button type="submit"
                        class="mt-6 text-white bg-blue-700 hover:bg-blue-800 focus:outline-none focus:ring-4 focus:ring-blue-300 font-medium rounded-lg text-sm px-5 py-2.5 text-center me-2 mb-2 dark:bg-blue-600 dark:hover:bg-blue-700 dark:focus:ring-blue-800">Submit</button>
                </div>
            </form>
        </div>
    </main>
</div>
