<main class="p-4 sm:ml-64 min-h-screen">
    <div class="container mx-auto py-6">
        <h1 class="text-3xl font-bold text-gray-800 mb-8">Update Pengumuman</h1>

        @if (session()->has('message'))
            <div class="bg-green-100 border-l-4 border-green-500 text-green-700 p-4 mb-6" role="alert">
                <p class="font-bold">Sukses!</p>
                <p>{{ session('message') }}</p>
            </div>
        @endif

        <div class="bg-white rounded-lg shadow-md p-6 mb-8">
            <h2 class="text-2xl font-semibold text-gray-700 mb-6">
                Edit Pengumuman</h2>
            <form wire:submit.prevent='update' class="space-y-6">
                <div>
                    <label for="title" class="block text-sm font-medium text-gray-700 mb-1">Judul</label>
                    <input type="text" id="title" wire:model="title"
                        class="w-full px-3 py-2 border border-gray-300 rounded-md shadow-sm focus:outline-none focus:ring-2 focus:ring-blue-500 focus:border-blue-500">
                    @error('title')
                        <p class="mt-1 text-sm text-red-600">{{ $message }}</p>
                    @enderror
                </div>

                <div>
                    <label for="content" class="block text-sm font-medium text-gray-700 mb-1">Konten</label>
                    <textarea id="content" wire:model="content" rows="6"
                        class="w-full px-3 py-2 border border-gray-300 rounded-md shadow-sm focus:outline-none focus:ring-2 focus:ring-blue-500 focus:border-blue-500"></textarea>
                    @error('content')
                        <p class="mt-1 text-sm text-red-600">{{ $message }}</p>
                    @enderror
                </div>

                <div>
                    <label for="photo" class="block text-sm font-medium text-gray-700">Foto</label>
                    <input type="file" id="photo" wire:model="photo" value="" class="mt-1 block w-full">
                    @error('photo')
                        <span class="text-red-500">{{ $message }}</span>
                    @enderror
                    @if ($photo)
                        <img src="{{ $photo->temporaryUrl() }}" alt="Preview" class="mt-2 h-20 w-20 object-cover">
                    @endif
                </div>

                <div class="flex justify-end space-x-3">
                    <button type="submit"
                        class="px-4 py-2 border border-transparent rounded-md shadow-sm text-sm font-medium text-white bg-blue-600 hover:bg-blue-700 focus:outline-none focus:ring-2 focus:ring-offset-2 focus:ring-blue-500">
                        Update
                    </button>
                </div>
            </form>
        </div>
    </div>
</main>
