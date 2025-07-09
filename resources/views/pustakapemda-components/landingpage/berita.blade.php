<div class="max-w-6xl mx-auto p-3 my-5 bg-white shadow-md rounded-lg">
    <div class="grid grid-cols-1 md:grid-cols-4 gap-4">
        <div class="md:col-span-1  text-white rounded">

            <img src="/img/asean-bac.jpg" alt="" class="w-full h-[300px] bg-gray-500 object-cover rounded"
                loading="lazy">

            {{-- Search --}}
            <label for="Search">
                <div class="relative pt-5">
                    <input type="text" id="Search" placeholder="Cari Info Bimtek..."
                        class="mt-0.5 w-full p-2 text-[#0048FF] rounded border border-gray-300 bg-gray-200 pe-10 shadow-sm sm:text-sm 
                        focus:border-gray-500 focus:ring-0 active:border-gray-500 active:ring-0 placeholder:text-[#0048FF]" />

                    <span class="absolute inset-y-0 mt-5 right-2 grid w-8 place-content-center">
                        <button type="button" aria-label="Submit"
                            class="rounded-full p-1.5 text-gray-700 transition-colors hover:bg-gray-100">
                            <svg xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24"
                                stroke-width="1.5" stroke="currentColor" class="size-4">
                                <path stroke-linecap="round" stroke-linejoin="round"
                                    d="m21 21-5.197-5.197m0 0A7.5 7.5 0 1 0 5.196 5.196a7.5 7.5 0 0 0 10.607 10.607Z" />
                            </svg>
                        </button>
                    </span>
                </div>
            </label>

            @include('pustakapemda-components.kategori')

            <div class="flex flex-col gap-3">
                <img src="/img/asean-bac.jpg" alt="" class="w-full h-[300px] bg-gray-500 object-cover rounded"
                    loading="lazy">
                <img src="/img/asean-bac.jpg" alt="" class="w-full h-[300px] bg-gray-500 object-cover rounded"
                    loading="lazy">
                <img src="/img/asean-bac.jpg" alt="" class="w-full h-[300px] bg-gray-500 object-cover rounded"
                    loading="lazy">
            </div>

        </div>
        <div class="md:col-span-3  text-white rounded">
            {{-- @include('pustakapemda-components.landingpage.berita-terbaru') --}}
            <div x-data="beritaPagination()" x-init="loadBerita()" x-ref="beritaRoot">
                <div id="berita-container"></div> {{-- isi berita di sini --}}
            </div>
            @include('pustakapemda-components.landingpage.bimbingan-teknis')
            
            @include('pustakapemda-components.landingpage.workshop_seminar')
        </div>
    </div>
</div>