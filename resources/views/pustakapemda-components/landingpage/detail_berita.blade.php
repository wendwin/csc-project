
@extends('layouts.pustakapemdalayout')

@section('content')
    <div class="text-center ">
        <h1 class="text-2xl md:text-4xl text-[#2C437F] uppercase font-bold mt-10 md:mt-20">{{ $berita->category  }}</h1>
        <div class="w-full bg-white p-5 md:px-10 mt-[10px] md:mt-[50px]">
            <div class="max-w-6xl mx-auto">
                <div class="grid grid-cols-1 md:grid-cols-4 gap-4">
                    <div class="md:col-span-1  text-white rounded order-1 md:order-0">

                        @include('pustakapemda-components.kategori')

                        <div class="flex flex-col gap-3">
                            @foreach ($posters as $poster)
                                <a href="{{ '/storage/'.$poster->image_path }}" data-lightbox="gallery" data-title="{{ $poster->title }}">
                                    <img src="{{ '/storage/'.$poster->image_path }}" alt="{{ $poster->title }}"
                                        class="w-full h-[300px] bg-gray-500 object-cover rounded" loading="lazy">
                                </a>
                            @endforeach
                        </div>

                    </div>
                    <div class="md:col-span-3  text-white rounded order-0 md:order-1">

                        <div class="p-3 md:p-0 md:py-5 md:pl-5 md:pr-0">
                            <h1 class="text-black text-base md:text-xl font-semibold">{{ $berita->title }}</h1>
                            <div class="my-2 md:my-5 justify-center flex flex-row space-x-2 text-sm text-gray-500 ">
                                <p>{{ ucwords(str_replace('-', ' ', $berita['author'])) }}</p>
                                <span>|</span>
                                <p>{{ $berita->created_at }}</p>
                            </div>
                            <img src="{{ '/storage/'.$berita['main_image'] }}" alt="" class="w-full h-auto flex justify-center rounded-lg">
                            <div class="text-black text-justify py-5 text-sm md:text-base">{!! $berita->content !!}</div>\
                            <div class="flex flex-col gap-5">
                                @foreach($gambars as $gambar)
                                        <img src="{{ '/storage/'.$gambar['image_path'] }}" alt="Gambar artikel" class="w-full h-auto rounded-lg object-cover" />
                                @endforeach
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection