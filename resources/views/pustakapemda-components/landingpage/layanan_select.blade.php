<div class="">
    <div class="container mx-auto p-6 bg-white">
        <div class="flex flex-col gap-4">
            @if($layanan_select->isEmpty())
                <p class="text-black">Tidak ada data dengan layanan <span class="font-semibold">{{ $selected_category }}</span></p>
            @else
                @foreach ($layanan_select as $item)
                        <div class="p-2 transition-all rounded-lg bg-white">
                            <div class="flex flex-col lg:flex-row gap-4 text-start">
                                <!-- Mobile -->
                                <div class="rounded-lg shadow-lg p-2 lg:hidden">
                                    <div class="flex flex-row items-center lg:hidden ">
                                        <img src="{{ $item['main_image'] }}" alt="{{ $item['title'] }}"
                                        class="w-1/3 h-[100px] object-cover rounded" loading="lazy">
                                        
                                        <div class="flex flex-col justify-center px-3 w-2/3 ">
                                            <div class="bg-[#0048FF] px-3 py-1 text-center font-semibold rounded-lg -mt-3 mb-3 ">
                                                <p class="truncate overflow-hidden whitespace-nowrap">{{ $item['category'] }}</p>
                                            </div>
                                            <h3 class="text-base font-semibold text-black">{{ $item['title'] }}</h3>
                                            <div class="mt-1 mt-md:flex text-sm text-gray-500 ">
                                                <p>{{ $item['author'] }}</p>
                                                <p>{{ $item['created_at'] }}</p>
                                            </div>
                                        </div>
                                    </div>
                                    
                                    <div class="lg:hidden mt-3 px-1">
                                        <p class="text-gray-700 mb-3 text-justify"> {{ Str::limit(strip_tags($item['content']), 100) }}
                                        </p>
                                        <a href="{{ route('website2.detail_berita', $item['id_encrypt']) }}">
                                            <button class="bg-gray-200 text-[#0048FF] px-4 py-2 rounded hover:bg-gray-300 transition mb-2">
                                                Read More
                                            </button>
                                        </a>
                                    </div>
                                </div>

                                


                                <!-- Desktop -->
                                <div class="hidden lg:flex flex-row w-full gap-5">
                                    <!-- Gambar -->
                                    <img src="{{ $item['main_image'] }}" alt="{{ $item['title'] }}"
                                        class="min-w-[200px] h-[130px] xl:min-w-[300px] xl:h-[200px] object-cover rounded"
                                        loading="lazy">

                                    <!-- Konten -->
                                    <div class="flex flex-col justify-center px-4 w-full rounded-lg shadow-lg">
                                        <div class="bg-[#0048FF] px-3 py-1 text-center font-semibold rounded-lg -mt-3 mb-3">
                                            <p class="truncate overflow-hidden whitespace-nowrap">{{ $item['category'] }}</p>
                                        </div>
                                        <h3 class="text-xl font-semibold text-black text-center">{{ $item['title'] }}</h3>
                                        <div class="flex space-x-4 text-sm text-gray-500 mt-1">
                                            <p>{{ $item['author'] }}</p>
                                            <p>{{ $item['created_at']->format('d/m/Y') }}</p>
                                        </div>
                                        <p class="text-gray-700 mt-3 mb-3 text-justify">
                                            {{ Str::limit(strip_tags($item['content']), 150) }}
                                        </p>
                                        <a href="{{ route('website2.detail_berita', $item['id_encrypt']) }}">
                                            <button class="bg-gray-200 text-[#0048FF] px-4 py-2 rounded hover:bg-gray-300 transition mb-5">
                                                Read More
                                            </button>
                                        </a>
                                    </div>
                                </div>
                            </div>
                        </div>
                @endforeach
            @endif
        </div>
        <!-- Tambahkan pagination di sini -->
        <div class="mt-6 pagination">
            {!! $layanan_select->links() !!}
        </div>
    </div>
</div>
