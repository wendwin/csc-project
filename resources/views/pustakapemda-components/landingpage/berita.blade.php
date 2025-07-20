<div class="max-w-6xl mx-auto p-3 my-5 bg-white shadow-md rounded-lg">
    <div class="grid grid-cols-1 md:grid-cols-4 gap-4">
        <div class="md:col-span-1  text-white rounded" >

            @if ($posters->count())
                {{-- <img src="{{ $posters[0]->image_path }}" alt="{{ $posters[0]->title }}"
                    class="w-full h-[300px] bg-gray-500 object-cover rounded" loading="lazy"> --}}
                <a href="{{ $posters[0]->image_path }}" data-lightbox="gallery" data-title="{{ $posters[0]->title }}" >
                    <img src="{{ $posters[0]->image_path }}" alt="{{ $posters[0]->title }}"
                        class="w-full h-[300px] bg-gray-500 object-cover rounded" loading="lazy">
                </a>

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
                    @foreach ($posters->skip(1) as $poster)
                        <a href="{{ $poster->image_path }}" data-lightbox="gallery" data-title="{{ $poster->title }}">
                            <img src="{{ $poster->image_path }}" alt="{{ $poster->title }}"
                                class="w-full h-[300px] bg-gray-500 object-cover rounded" loading="lazy">
                        </a>
                    @endforeach
                </div>
            @endif

        </div>
        <div class="md:col-span-3  text-white rounded">
            {{-- @include('pustakapemda-components.landingpage.berita-terbaru') --}}
            <div x-data="beritaPagination()" x-init="loadBerita()" x-cloak>
                <div class="my-10 md:my-0">
                    <div class="container mx-auto md:p-6 bg-white">
                        <div x-show="loading" class="flex items-center gap-5">
                            <h2 class="text-lg md:text-2xl text-[#2C437F] font-bold mb-4 px-2">Berita Terbaru</h2>
                            <span class="h-[2px] flex-1 bg-[#EF0000] -mt-2"></span>
                        </div>
                        <!-- Skeleton loading -->
                        <div x-show="loading" class="flex flex-col gap-4 animate-pulse" x-cloak>
                            <template x-for="i in 5" :key="i">
                                <div class="p-2 rounded-lg bg-white">
                                    <div class="flex flex-col lg:flex-row gap-0 text-start">
                                        <!-- Mobile -->
                                        <div class="flex flex-row items-center lg:hidden">
                                            <div class="w-1/3 h-[100px] bg-gray-300/50 rounded"></div>
                                            <div class="flex flex-col justify-center px-3 w-2/3 gap-2">
                                                <div class="h-4 bg-gray-300/50 rounded w-3/4"></div>
                                                <div class="flex space-x-2 text-sm">
                                                    <div class="h-3 bg-gray-300/50 rounded w-1/2"></div>
                                                    <div class="h-3 bg-gray-300/50 rounded w-1/4"></div>
                                                </div>
                                            </div>
                                        </div>

                                        <!-- Desktop -->
                                        <div class="hidden lg:flex flex-row w-full gap-4">
                                            <div
                                                class="min-w-[200px] xl:min-w-[300px] h-[130px] xl:h-[200px] bg-gray-300/50 rounded">
                                            </div>
                                            <div class="flex flex-col justify-center w-full space-y-3">
                                                <div class="h-6 bg-gray-300/50 rounded w-1/2"></div>
                                                <div class="flex space-x-4">
                                                    <div class="h-3 bg-gray-300/50 rounded w-1/4"></div>
                                                    <div class="h-3 bg-gray-300/50 rounded w-1/4"></div>
                                                </div>
                                                <div class="h-4 bg-gray-300/50 rounded w-full"></div>
                                                <div class="h-4 bg-gray-300/50 rounded w-5/6"></div>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </template>
                        </div>

                        <div id="berita-container" x-show="!loading" x-cloak></div>
                    </div>
                </div>
            </div>

            {{-- @include('pustakapemda-components.landingpage.bimbingan-teknis') --}}
            <div x-data="bimtekPagination()" x-init="loadBimtek()" x-ref="bimtekRoot">
                <div class="my-10 md:my-0">
                    <div class="container mx-auto md:p-6 bg-white">
                        <div x-show="loading" class="flex items-center gap-5">
                            <h2 class="text-lg md:text-2xl text-[#2C437F] font-bold mb-4 px-2">Bimbingan Teknis</h2>
                            <span class="h-[2px] flex-1 bg-[#EF0000] -mt-2"></span>
                        </div>

                        <!-- Skeleton saat loading -->
                        <div x-show="loading" class="grid grid-cols-1 md:grid-cols-2 gap-4 animate-pulse" x-cloak>
                            <!-- Card utama kiri -->
                            <div class="bg-white rounded-lg p-4 space-y-4">
                                <div class="aspect-video bg-gray-200 rounded"></div>
                                <div class="h-4 bg-gray-300 rounded w-3/4"></div>
                                <div class="h-3 bg-gray-300 rounded w-1/2"></div>
                                <div class="h-3 bg-gray-300 rounded w-1/4"></div>
                                <div class="h-4 bg-gray-300 rounded w-full"></div>
                                <div class="w-1/4 h-8 bg-gray-300 rounded"></div>
                            </div>

                            <!-- List kanan  -->
                            <div class="flex flex-col gap-4">
                                <template x-for="i in 4" :key="i">
                                    <div class="flex gap-4">
                                        <div class="w-1/3 h-[100px] bg-gray-200 rounded"></div>
                                        <div class="flex-1 space-y-2">
                                            <div class="h-4 bg-gray-300 rounded w-3/4"></div>
                                            <div class="h-3 bg-gray-300 rounded w-1/2"></div>
                                            <div class="h-3 bg-gray-300 rounded w-1/4"></div>
                                        </div>
                                    </div>
                                </template>
                            </div>
                        </div>

                        <div id="bimtek-container" x-show="!loading" x-cloak></div>
                    </div>
                </div>
            </div>

            {{-- @include('pustakapemda-components.landingpage.workshop_seminar') --}}
            <div x-data="workshopPagination()" x-init="loadWorkshop()" x-ref="workshopRoot">

                <div class="my-10 md:my-0">
                    <div class="container mx-auto md:p-6 bg-white">
                        <div x-show="loading" class="flex items-center gap-5">
                            <h2 class="text-lg md:text-2xl text-[#2C437F] font-bold mb-4 px-2">Workshop & Seminar</h2>
                            <span class="h-[2px] flex-1 bg-[#EF0000] -mt-2"></span>
                        </div>

                        <!-- Skeleton Loading -->
                        <div x-show="loading" class="grid grid-cols-1 md:grid-cols-2 gap-4 animate-pulse" x-cloak>
                            <!-- Card kiri  -->
                            <div class="rounded-lg p-4 space-y-4 bg-transparent">
                                <div class="aspect-video bg-gray-200 rounded"></div>
                                <div class="h-4 bg-gray-300 rounded w-3/4"></div>
                                <div class="h-3 bg-gray-300 rounded w-1/2"></div>
                                <div class="h-3 bg-gray-300 rounded w-1/4"></div>
                                <div class="h-4 bg-gray-300 rounded w-full"></div>
                                <div class="w-1/4 h-8 bg-gray-300 rounded"></div>
                            </div>

                            <!-- Daftar kanan -->
                            <div class="flex flex-col gap-4">
                                <template x-for="i in 4" :key="i">
                                    <div class="flex gap-4">
                                        <div class="w-1/3 h-[100px] bg-gray-200 rounded"></div>
                                        <div class="flex-1 space-y-2">
                                            <div class="h-4 bg-gray-300 rounded w-3/4"></div>
                                            <div class="h-3 bg-gray-300 rounded w-1/2"></div>
                                            <div class="h-3 bg-gray-300 rounded w-1/4"></div>
                                        </div>
                                    </div>
                                </template>
                            </div>
                        </div>

                        <div id="workshop-container" x-show="!loading" x-cloak></div>
                    </div>
                </div>
            </div>
        </div>

    </div>
</div>
