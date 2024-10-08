<main class="p-4 sm:ml-64 min-h-screen">
    <div class="container mx-auto py-6">
        <h1 class="text-3xl font-bold text-gray-800 mb-8">Manajemen Pengumuman</h1>

        @if (session()->has('message'))
            <div class="bg-green-100 border-l-4 border-green-500 text-green-700 p-4 mb-6" role="alert">
                <p class="font-bold">Sukses!</p>
                <p>{{ session('message') }}</p>
            </div>
        @endif

        <div class="bg-white rounded-lg shadow-md p-6 mb-8">
            <h2 class="text-2xl font-semibold text-gray-700 mb-6">
                {{ $isEditing ? 'Edit Pengumuman' : 'Buat Pengumuman Baru' }}</h2>
            <form wire:submit.prevent="{{ $isEditing ? 'update' : 'store' }}" class="space-y-6">
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
                    <input type="file" id="photo" wire:model="photo" class="mt-1 block w-full">
                    @error('photo')
                        <span class="text-red-500">{{ $message }}</span>
                    @enderror
                    @if ($photo)
                        <img src="{{ $photo->temporaryUrl() }}" alt="Preview" class="mt-2 h-20 w-20 object-cover">
                    @endif
                </div>

                <div class="flex justify-end space-x-3">
                    @if ($isEditing)
                        <button type="button" wire:click="create"
                            class="px-4 py-2 border border-gray-300 rounded-md text-sm font-medium text-gray-700 bg-white hover:bg-gray-50 focus:outline-none focus:ring-2 focus:ring-offset-2 focus:ring-blue-500">
                            Batal
                        </button>
                    @endif
                    <button type="submit"
                        class="px-4 py-2 border border-transparent rounded-md shadow-sm text-sm font-medium text-white bg-blue-600 hover:bg-blue-700 focus:outline-none focus:ring-2 focus:ring-offset-2 focus:ring-blue-500">
                        {{ $isEditing ? 'Update' : 'Simpan' }}
                    </button>
                </div>
            </form>
        </div>

        <div class="bg-white rounded-lg shadow-md overflow-hidden">
            <h2 class="text-2xl font-semibold text-gray-700 p-6 bg-gray-50 border-b">Daftar Pengumuman</h2>
            <ul class="divide-y divide-gray-200">
                @foreach ($announcements as $announcement)
                    <li class="p-4 sm:p-6 hover:bg-gray-50 transition duration-150 ease-in-out">
                        <div class="flex flex-col sm:flex-row items-start space-y-4 sm:space-y-0 sm:space-x-4">
                            @if ($announcement->photo)
                                <img src="{{ Storage::url($announcement->photo) }}" alt="{{ $announcement->title }}"
                                    class="w-full sm:w-24 h-48 sm:h-24 object-cover rounded-md flex-shrink-0">
                            @else
                                <div
                                    class="w-full sm:w-24 h-48 sm:h-24 bg-gray-200 flex items-center justify-center rounded-md flex-shrink-0">
                                    <svg class="w-12 h-12 text-gray-400" fill="none" stroke="currentColor"
                                        viewBox="0 0 24 24" xmlns="http://www.w3.org/2000/svg">
                                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                                            d="M4 16l4.586-4.586a2 2 0 012.828 0L16 16m-2-2l1.586-1.586a2 2 0 012.828 0L20 14m-6-6h.01M6 20h12a2 2 0 002-2V6a2 2 0 00-2-2H6a2 2 0 00-2 2v12a2 2 0 002 2z">
                                        </path>
                                    </svg>
                                </div>
                            @endif
                            <div class="flex-1 min-w-0">
                                <h3 class="text-lg font-semibold text-gray-800 truncate">{{ $announcement->title }}
                                </h3>
                                <p class="mt-1 text-sm text-gray-600">{{ Str::limit($announcement->content, 100) }}</p>
                                <div class="mt-2 flex items-center text-sm text-gray-500">
                                    <svg class="flex-shrink-0 mr-1.5 h-5 w-5 text-gray-400" fill="currentColor"
                                        viewBox="0 0 20 20">
                                        <path fill-rule="evenodd"
                                            d="M6 2a1 1 0 00-1 1v1H4a2 2 0 00-2 2v10a2 2 0 002 2h12a2 2 0 002-2V6a2 2 0 00-2-2h-1V3a1 1 0 10-2 0v1H7V3a1 1 0 00-1-1zm0 5a1 1 0 000 2h8a1 1 0 100-2H6z"
                                            clip-rule="evenodd" />
                                    </svg>
                                    Dipublikasikan pada {{ $announcement->created_at->format('d M Y') }}
                                </div>
                                <div class="mt-4 flex flex-wrap gap-2">
                                    <a href="/pengumuman-update/{{ $announcement->id }}"
                                        class="inline-flex items-center px-3 py-1 border border-transparent text-sm leading-5 font-medium rounded-md text-white bg-indigo-600 hover:bg-indigo-500 focus:outline-none focus:border-indigo-700 focus:shadow-outline-indigo active:bg-indigo-700 transition ease-in-out duration-150">
                                        Edit
                                    </a>
                                    <button wire:click="delete({{ $announcement->id }})"
                                        class="inline-flex items-center px-3 py-1 border border-transparent text-sm leading-5 font-medium rounded-md text-white bg-red-600 hover:bg-red-500 focus:outline-none focus:border-red-700 focus:shadow-outline-red active:bg-red-700 transition ease-in-out duration-150">
                                        Hapus
                                    </button>
                                </div>
                            </div>
                        </div>
                    </li>
                @endforeach
            </ul>
        </div>
    </div>
</main>
