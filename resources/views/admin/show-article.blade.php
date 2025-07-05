@extends('layouts.adminlayout')

@section('content')
    <div class="p-6 bg-white rounded-lg shadow-lg">
        <h1 class="text-2xl font-semibold mb-2">{{ $article->title }}</h1>
        <p class="text-sm text-gray-500 mb-4">{{ $article->category }} | {{ $article->author }}</p>

        {{-- Gambar Utama --}}
        @if ($article->main_image)
            <img src="{{ asset('storage/' . $article->main_image) }}" class="w-full h-64 object-cover rounded mb-4"
                alt="">
        @endif

        {{-- Konten --}}
        <div class="prose max-w-none text-sm text-gray-800 mb-6">
            {!! $article->content !!}
        </div>

        {{-- Gambar Tambahan --}}
        @if ($article->images->count())
            <h2 class="text-lg font-semibold mb-2">Gambar Tambahan</h2>
            <div class="grid grid-cols-2 md:grid-cols-4 gap-4">
                @foreach ($article->images as $img)
                    <img src="{{ asset('storage/' . $img->image_path) }}" class="w-full h-32 object-cover rounded shadow">
                @endforeach
            </div>
        @endif
    </div>
@endsection
