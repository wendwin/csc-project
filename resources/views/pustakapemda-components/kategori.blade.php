<div class="py-5">
    <div class="flex items-center gap-5">
        <h2 class="text-lg md:text-2xl text-[#2C437F]  font-bold mb-4 px-2">Kategori Layanan</h2>
        <span class="h-[2px] flex-1 bg-[#EF0000] -mt-2"></span>
    </div>
    <div class="px-2 md:px-0 flex flex-col gap-2">
       @foreach ($kategori_layanan as $kategori)
            <div class="
                w-full px-2 py-1 transition-all
                {{ isset($selected_category) && $selected_category === $kategori ? 'bg-blue-600 hover:bg-blue-700 text-white' : 'text-black bg-gray-200 hover:bg-gray-300' }}
            ">
                <a href="{{ route('website2.layanan', Str::lower($kategori)) }}">
                    <p class="text-sm md:text-base text-start font-semibold truncate overflow-hidden whitespace-nowrap">
                        {{ $kategori }}
                    </p>
                </a>
            </div>
        @endforeach
    </div>
</div>