<div class="py-5">
    <div class="flex items-center gap-5">
        <h2 class="text-lg md:text-xl text-white bg-[#002789]  font-bold mb-4 p-2 px-3">Kategori Layanan</h2>
        <span class="h-[2px] flex-1 bg-[#FFD900] -mt-2"></span>
    </div>
    <div class="px-2 md:px-0 flex flex-col gap-2">
       @foreach ($kategori_layanan as $kategori)
            <div class="
                w-full px-2 py-1 transition-all
                {{ isset($selected_category) && Str::lower($selected_category) === Str::lower($kategori) ? 'bg-[#002789] hover:bg-[#000b89] text-white' : 'text-black bg-gray-200 hover:bg-gray-300' }}
            ">
                <a href="{{ route('website3.layanan', Str::lower($kategori)) }}">
                    <p class="text-sm md:text-base text-start font-semibold truncate overflow-hidden whitespace-nowrap">
                        {{ $kategori }}
                    </p>
                </a>
            </div>
        @endforeach
    </div>
</div>