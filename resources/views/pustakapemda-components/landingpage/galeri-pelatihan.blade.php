<div class="max-w-6xl mx-auto  bg-white rounded-lg">
    <div class="flex items-center gap-5">
        <h2 class="text-lg md:text-2xl text-[#2C437F] font-bold mb-4 px-2">Galeri Pelatihan</h2>
        <span class="h-[2px] flex-1 bg-[#EF0000] -mt-2"></span>
    </div>

    <div class="grid grid-cols-1 md:grid-cols-3 lg:grid-cols-4 gap-5">
        @foreach ($galeri_pelatihan as $item)
        <a href="">
            <div class=" hover:shadow-lg hover:bg-gray-100 transition-all rounded-lg bg-white">
                <img src="{{ $item['main_image'] }}" alt="{{ $item['title'] }}"
                    class="w-full h-[200px] object-cover rounded mb-3" loading="lazy">

                <div class="flex flex-col justify-center p-2 text-left">
                    <h3 class="text-base font-semibold text-black">{{ $item['title'] }}</h3>
                    <div class="flex space-x-4 text-sm text-gray-500 mt-1">
                        <p>{{ $item['author'] }}</p>
                        <p>{{ $item->created_at->format('d/m/Y') }}</p>
                    </div>
                    <p class="text-gray-700 mb-3 mt-2 text-justify">
                        {{ Str::limit($item['description'], 100) }}
                    </p>
                </div>
            </div>
        </a>
        @endforeach
    </div>
    <div class="mt-6 pagination">
        {!! $galeri_pelatihan->links() !!}
    </div>
</div>
