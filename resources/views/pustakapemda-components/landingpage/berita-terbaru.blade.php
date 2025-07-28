<div class="">
    <div class="container mx-auto bg-white">
        <div class="flex items-center gap-5">
            <h2 class="text-lg md:text-2xl text-[#2C437F]  font-bold mb-4 px-2">Berita Terbaru</h2>
            <span class="h-[2px] flex-1 bg-[#EF0000] -mt-2"></span>
        </div>
        <div class="flex flex-col gap-4">
            @if($berita_terbaru->isEmpty())
                <div class="flex flex-col items-center justify-center py-16 px-4 bg-gray-50 rounded-lg">
                    <div class="text-center">
                        <!-- Icon -->
                        <svg class="mx-auto h-16 w-16 text-gray-400" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" 
                                d="M12 6.253v13m0-13C10.832 5.477 9.246 5 7.5 5S4.168 5.477 3 6.253v13C4.168 18.477 5.754 18 7.5 18s3.332.477 4.5 1.253m0-13C13.168 5.477 14.754 5 16.5 5c1.746 0 3.332.477 4.5 1.253v13C19.832 18.477 18.246 18 16.5 18c-1.746 0-3.332.477-4.5 1.253">
                            </path>
                        </svg>
                        
                        <!-- Pesan -->
                        <h3 class="mt-4 text-xl font-semibold text-gray-900">Belum Ada Berita Terbaru</h3>
                        <p class="mt-2 text-sm text-gray-500">
                            Saat ini belum ada berita yang tersedia. 
                            Silakan cek kembali nanti.
                        </p>
                    </div>
                </div>
            @else
            @foreach ($berita_terbaru as $item)
                <a href="{{ route('website2.detail_berita', $item['id_slug']) }}">
                    <div class="p-2 hover:shadow-lg hover:bg-gray-100 transition-all rounded-lg bg-white">
                        <div class="flex flex-col lg:flex-row gap-0 text-start">
                            <!-- Mobile -->
                            <div class="flex flex-row items-center lg:hidden">
                                <img src="{{ '/storage/'.$item['main_image'] }}" alt="{{ $item['title'] }}"
                                    class="w-1/3 h-[100px] object-cover rounded" loading="lazy">

                                <div class="flex flex-col justify-center px-3 w-2/3">
                                    <h3 class="text-base font-semibold text-black">{{ $item['title'] }}</h3>
                                    <div class="mt-1 mt-md:flex text-sm text-gray-500 ">
                                        <p>{{ ucwords(str_replace('-', ' ', $item['author'])) }}</p>
                                        <p>{{ $item->created_at->format('d/m/Y') }}</p>
                                    </div>
                                </div>
                            </div>

                            <div class="lg:hidden mt-3 px-1">
                                <p class="text-gray-700 mb-3 text-justify"> {{ Str::limit(strip_tags($item['content']), 100) }}
                                </p>
                            </div>


                            <!-- Desktop -->
                            <div class="hidden lg:flex flex-row w-full">
                                <!-- Gambar -->
                                <img src="{{ '/storage/'.$item['main_image'] }}" alt="{{ $item['title'] }}"
                                    class="min-w-[200px] h-[130px] xl:min-w-[300px] xl:h-[200px] object-cover rounded"
                                    loading="lazy">

                                <!-- Konten -->
                                <div class="flex flex-col justify-center px-4 w-full">
                                    <h3 class="text-xl font-semibold text-black">{{ $item['title'] }}</h3>
                                    <div class="flex space-x-4 text-sm text-gray-500 mt-1">
                                        <p>{{ ucwords(str_replace('-', ' ', $item['author'])) }}</p>
                                        <p>{{ $item['created_at']->format('d/m/Y') }}</p>
                                    </div>
                                    <p class="text-gray-700 mt-3 mb-3 text-justify">
                                        {{ Str::limit(strip_tags($item['content']), 150) }}
                                    </p>
                                </div>
                            </div>
                        </div>
                    </div>
                </a>
            @endforeach
        @endif
        </div>
        <!-- Tambahkan pagination di sini -->
        <div class="mt-6 pagination">
            {!! $berita_terbaru->links() !!}
        </div>

    </div>
</div>
