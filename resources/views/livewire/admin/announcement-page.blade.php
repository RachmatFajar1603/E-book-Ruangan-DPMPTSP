<div>
    <div class="container mx-auto px-4 py-8">
        <div class="flex flex-col lg:flex-row">
            <!-- Left Sidebar - Navigation -->
            <div class="w-full lg:w-1/5 lg:pr-8 mb-8 lg:mb-0">
                <nav class="sticky top-8">
                    <h3 class="text-lg font-semibold mb-4 text-gray-700">Navigasi</h3>
                    <ul class="space-y-2">
                        <li><a href="#" class="text-blue-600 hover:underline">Beranda</a></li>
                        <li>
                            <span class="font-medium text-gray-700">Pengumuman</span>
                            <ul class="ml-4 mt-2 space-y-2">
                                <li><a href="#" wire:click.prevent="$set('category', '')"
                                        class="text-blue-600 hover:underline">Semua</a></li>
                                <li><a href="#" wire:click.prevent="$set('category', 'Terbaru')"
                                        class="text-blue-600 hover:underline">Terbaru</a></li>
                                <li><a href="#" wire:click.prevent="$set('category', 'Arsip')"
                                        class="text-blue-600 hover:underline">Arsip</a></li>
                            </ul>
                        </li>
                        <li><a href="#" class="text-blue-600 hover:underline">Tentang Kami</a></li>
                        <li><a href="#" class="text-blue-600 hover:underline">Kontak</a></li>
                    </ul>
                </nav>
            </div>

            <!-- Main Content -->
            <div class="w-full lg:w-3/5 lg:px-8">
                <header class="mb-8">
                    <h1 class="text-4xl font-bold text-gray-800">Pengumuman</h1>
                    <p class="text-gray-600 mt-2">Informasi terbaru dan penting untuk Anda</p>
                </header>

                <div class="mb-6">
                    <input wire:model.debounce.300ms="search" type="text" placeholder="Cari pengumuman..."
                        class="w-full px-4 py-2 border rounded-lg">
                </div>

                <div class="space-y-12">
                    @foreach ($announcements as $announcement)
                        <article class="prose lg:prose-xl max-w-none">
                            @if($announcement->photo)
                                <img src="{{ Storage::url($announcement->photo) }}" alt="{{ $announcement->title }}" class="w-full h-64 object-cover mb-4 rounded-lg">
                            @endif
                            <h2 id="pengumuman-{{ $announcement->id }}" class="text-3xl font-semibold text-gray-800">
                                {{ $announcement->title }}
                            </h2>
                            <p class="text-gray-600 text-sm">Dipublikasikan pada
                                {{ $announcement->created_at->format('d M Y') }}</p>
                            <p>{{ Str::limit($announcement->content, 200) }}</p>
                            <a href="{{ route('pengumuman.show', $announcement->id) }}"
                                class="inline-block bg-gray-700 text-white px-6 py-2 rounded-lg hover:bg-gray-600 transition duration-300 ease-in-out mt-4">
                                Baca Selengkapnya
                            </a>
                        </article>
                    @endforeach
                </div>

                <!-- Pagination -->
                <div class="mt-12">
                    {{ $announcements->links() }}
                </div>
            </div>

            <!-- Right Sidebar - Table of Contents -->
            <div class="w-full lg:w-1/5 lg:pl-8 mt-8 lg:mt-0">
                <div class="sticky top-8">
                    <h3 class="text-lg font-semibold mb-4 text-gray-700">Daftar Isi</h3>
                    <ul class="space-y-2 text-sm">
                        @foreach ($announcements as $announcement)
                            <li><a href="#pengumuman-{{ $announcement->id }}"
                                    class="text-gray-600 hover:text-blue-600 transition duration-300 ease-in-out">{{ Str::limit($announcement->title, 30) }}</a>
                            </li>
                        @endforeach
                    </ul>
                </div>
            </div>
        </div>
    </div>
</div>
