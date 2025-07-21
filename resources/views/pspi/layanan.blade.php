@extends('layouts.pspilayout')

@section('content')
    <div class="text-center">
        <div class="relative -mb-[120px] select-none pointer-events-none">
            <img src="/img/pspi/detail_berita.webp" alt="" class="w-full h-[250px] relative">
            <h1 class="absolute text-xl md:text-2xl text-white uppercase font-bold top-5 left-5 md:top-10 md:left-10">Layanan Kami</h1>
        </div>
        <div class="w-full bg-white px-3 py-5 mt-[10px] md:mt-[50px]">

            <div class="max-w-6xl mx-auto">

                <div class="grid grid-cols-1 md:grid-cols-4 gap-4">
                    <div class="md:col-span-1  text-white rounded">
                        @include('pspi-components.kategori')

                        <div class="flex flex-col gap-3">
                            @foreach ($posters as $poster)
                                <a href="{{ $poster->image_path }}" data-lightbox="gallery" data-title="{{ $poster->title }}">
                                    <img src="{{ $poster->image_path }}" alt="{{ $poster->title }}"
                                        class="w-full h-[300px] bg-gray-500 object-cover rounded" loading="lazy">
                                </a>
                            @endforeach
                        </div>
                    </div>

                    <div class="md:col-span-3  text-white rounded">
                        @include('pspi-components.layanan.layanan_select')
                    </div>
                </div>

            </div>

        </div>
    </div>
@endsection
