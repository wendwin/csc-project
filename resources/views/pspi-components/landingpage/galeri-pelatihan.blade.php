<div class="max-w-6xl mx-auto  bg-white rounded-lg">
    <div class="flex items-center gap-5">
        <h2 class="text-lg md:text-xl text-white bg-[#002789] py-1 font-bold mb-4 px-2">Galeri Pelatihan</h2>
        <span class="h-[2px] flex-1 bg-[#FFD900] -mt-2"></span>
    </div>
    @if($galeri_pelatihan->isEmpty())
            <div class="flex flex-col items-center justify-center py-16 px-4 bg-gray-50 rounded-lg">
                <div class="text-center">
                    <!-- Icon -->
                    <svg class="mx-auto h-16 w-16 text-gray-400" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" 
                              d="M12 6.253v13m0-13C10.832 5.477 9.246 5 7.5 5S4.168 5.477 3 6.253v13C4.168 18.477 5.754 18 7.5 18s3.332.477 4.5 1.253m0-13C13.168 5.477 14.754 5 16.5 5c1.746 0 3.332.477 4.5 1.253v13C19.832 18.477 18.246 18 16.5 18c-1.746 0-3.332.477-4.5 1.253">
                        </path>
                    </svg>
                    
                    <!-- Pesan -->
                    <h3 class="mt-4 text-xl font-semibold text-gray-900">Belum Ada galeri</h3>
                    <p class="mt-2 text-sm text-gray-500">
                        Saat ini belum ada materi galeri yang tersedia. 
                        Silakan cek kembali nanti.
                    </p>
                </div>
            </div>
    @else
        <div class="grid grid-cols-1 md:grid-cols-3 lg:grid-cols-4 gap-5">
            @foreach ($galeri_pelatihan as $item)
            <a href="{{ route('website3.detail_berita', $item['id_slug']) }}">
                <div class=" hover:shadow-lg hover:bg-gray-100 transition-all rounded-lg bg-white">
                    <img src="{{ '/storage/'.$item['main_image'] }}" alt="{{ $item['title'] }}"
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
    @endif    
</div>
