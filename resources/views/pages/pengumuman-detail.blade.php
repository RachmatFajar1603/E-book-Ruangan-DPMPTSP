@extends('layouts.pages')

@section('content')
    <div class="container mx-auto px-4 py-8 min-h-screen">
        <article class="prose lg:prose-xl max-w-none">
            <h1 class="text-4xl font-bold text-gray-800">{{ $announcement->title }}</h1>
            <p class="text-gray-600 text-sm">Dipublikasikan pada {{ $announcement->created_at->format('d M Y') }}</p>

            @if ($announcement->photo)
                <div class="mt-6 mb-8">
                    <img src="{{ Storage::url($announcement->photo) }}" alt="{{ $announcement->title }}"
                        class="w-full max-w-2xl mx-auto rounded-lg shadow-md">
                </div>
            @endif

            <div class="mt-6">
                {!! $announcement->content !!}
            </div>
        </article>

        <div class="mt-8">
            <a href="{{ route('pengumuman.index') }}" class="text-blue-600 hover:underline">&larr; Kembali ke Daftar
                Pengumuman</a>
        </div>
    </div>
@endsection
