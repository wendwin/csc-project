<div class="py-5">
    <div class="flex items-center gap-5">
        <h2 class="text-lg md:text-2xl text-[#2C437F]  font-bold mb-4 px-2">Kategori Layanan</h2>
        <span class="h-[2px] flex-1 bg-[#EF0000] -mt-2"></span>
    </div>
    <div class="px-2 md:px-0 flex flex-col gap-2">
        @foreach ($kategori_layanan as $kategori)
            <div class="bg-gray-200 w-full px-2 py-1 transition-all hover:bg-gray-300">
                <a href="#">
                    <p class="text-black text-sm md:text-base text-start font-semibold truncate overflow-hidden whitespace-nowrap">
                        {{ $kategori }}
                    </p>
                </a>
            </div>
        @endforeach
    </div>
</div>