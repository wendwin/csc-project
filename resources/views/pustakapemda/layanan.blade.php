@extends('layouts.pustakapemdalayout')

@section('content')
    <div class="text-center">
        <h1 class="text-2xl md:text-4xl text-[#2C437F] uppercase font-bold mt-10 md:mt-20">Layanan Kami</h1>
        <div class="w-full bg-white px-3 py-5 mt-[10px] md:mt-[50px]">

            <div class="max-w-6xl mx-auto">

                <div class="grid grid-cols-1 md:grid-cols-4 gap-4">
                    <div class="md:col-span-1  text-white rounded">
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

                    <div class="md:col-span-3  text-white rounded">
                        @include('pustakapemda-components.landingpage.layanan_select')
                    </div>
                </div>

            </div>

        </div>
    </div>
@endsection
