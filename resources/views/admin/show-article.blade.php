@extends('layouts.adminlayout')

@section('content')
<div class="flex items-center gap-2 mb-6 mt-14">
    <a href="{{ route('articles.index') }}">
        <div
            class="flex items-center justify-center w-6 h-6 border-2 border-blue-600 rounded-full cursor-pointer hover:border-blue-700">
            <i data-lucide="arrow-left" class="w-4 h-4 text-blue-600 hover:text-blue-700"></i>
        </div>
    </a>
</div>
<div :class="sidebarOpen ? 'max-w-[978px] mx-auto w-full' : 'w-full'" class="transition-all duration-300">

    <div class="p-2 bg-[#FCFDFD] rounded-t-lg shadow border-b-1 border-gray-300 z-20 relative transition-all duration-300"
        :class="sidebarOpen ? 'max-w-[978px] mx-auto w-full' : 'w-full'">
        <h2 class="text-[18px] font-bold ml-6">Preview Article</h2>
    </div>

    <!-- Bagian Konten -->
    <div class="p-4 -mt-2 space-y-4 transition-all duration-300 bg-white shadow-md rounded-xl"
        :class="sidebarOpen ? 'max-w-[978px] mx-auto w-full' : 'w-full'">
        @php
        $words = explode(' ', $article->title);
        $customChunks = [];
        $counts = [9, 8];
        $start = 0;

        foreach ($counts as $count) {
        $customChunks[] = array_slice($words, $start, $count);
        $start += $count;
        }
        while ($start < count($words)) { $customChunks[]=array_slice($words, $start, 7); $start +=7; } @endphp <div
            class="px-4 mt-12 mb-10 text-center">
            <h1 class="text-[18px] md:text-[22px] font-bold leading-snug">
                {!! collect($customChunks)->map(fn($chunk) => implode(' ', $chunk))->implode('<br>') !!}
            </h1>
            <p class="text-[14px] md:text-[16px] text-[#928A8A] mt-2 mb-6">
                {{ $article->author }} | {{ $article->category }} - {{ $article->created_at->format('d M Y') }}
            </p>


            {{-- Gambar Utama --}}
            @if ($article->main_image)
            <div class="flex justify-center px-4 mt-10">
                <img src="{{ asset('storage/' . $article->main_image) }}"
                    class="w-full max-w-[755px] h-auto object-contain rounded-xl shadow border" alt="">
            </div>
            @endif
    </div>

    {{-- Konten --}}
    <div class="flex justify-center">
        <div class="trix-content text-[16px] text-gray-800 w-[755px] font-normal font-sans text-justify">
            {!! $article->content !!}
        </div>
    </div>

    {{-- Gambar Tambahan --}}
    @if ($article->images->count())
    <div class="mx-auto w-full max-w-[755px] grid grid-cols-1 sm:grid-cols-2 gap-4 px-4">
        @foreach ($article->images as $img)
        <div class="flex justify-center">
            <img src="{{ asset('storage/' . $img->image_path) }}"
                class="object-contain w-full h-auto border shadow rounded-xl" alt="">
        </div>
        @endforeach
    </div>
    @endif
</div>
</div>
@endsection

<style>
    .trix-content img {
        display: block;
        margin: 1rem auto;
        max-width: 100%;
        height: auto;
        border-radius: 0.5rem;
    }

    .trix-content ol {
        list-style-type: decimal;
        padding-left: 1.5rem;
        margin-top: 0.5rem;
        margin-bottom: 0.5rem;
    }

    .trix-content ul {
        list-style-type: disc;
        padding-left: 1.5rem;
        margin-top: 0.5rem;
        margin-bottom: 0.5rem;
    }

    .trix-content li {
        margin-bottom: 0.3rem;
    }
</style>