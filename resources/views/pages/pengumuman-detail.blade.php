@extends('layouts.pages')

@section('content')
    <div class="container mx-auto px-4 py-8 min-h-screen">
        <article class="prose lg:prose-xl max-w-none bg-white rounded-lg shadow-md p-8">
            <h1 class="text-4xl font-bold text-gray-800 mb-4">{{ $announcement->title }}</h1>
            <p class="text-gray-600 text-sm mb-6">Dipublikasikan pada {{ $announcement->created_at->format('d M Y') }}</p>

            @if ($announcement->photo)
                <div class="mb-8">
                    <img src="{{ Storage::url($announcement->photo) }}" alt="{{ $announcement->title }}"
                        class="w-full max-w-2xl mx-auto rounded-lg shadow-md">
                </div>
            @endif

            <div class="mt-6 text-gray-700 leading-relaxed">
                {!! $announcement->content !!}
            </div>
        </article>

        <div class="mt-8">
            <a href="{{ route('pengumuman.index') }}" class="text-blue-600 hover:underline flex items-center">
                <svg xmlns="http://www.w3.org/2000/svg" class="h-5 w-5 mr-2" viewBox="0 0 20 20" fill="currentColor">
                    <path fill-rule="evenodd" d="M9.707 16.707a1 1 0 01-1.414 0l-6-6a1 1 0 010-1.414l6-6a1 1 0 011.414 1.414L5.414 9H17a1 1 0 110 2H5.414l4.293 4.293a1 1 0 010 1.414z" clip-rule="evenodd" />
                </svg>
                Kembali ke Daftar Pengumuman
            </a>
        </div>
    </div>
@endsection
