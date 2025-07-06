<div class="">
    <div class="container mx-auto p-6 bg-white">
        <div class="flex items-center gap-5">
            <h2 class="text-lg md:text-2xl text-[#2C437F]  font-bold mb-4 px-2">Berita Terbaru</h2>
            <span class="h-[2px] flex-1 bg-[#EF0000] -mt-2"></span>
        </div>
        <div class="flex flex-col gap-4">
            @foreach ($berita_terbaru as $item)
                <a href="#">
                    <div class="p-2 hover:shadow-lg hover:bg-gray-100 transition-all rounded-lg bg-white">
                        <div class="flex flex-col lg:flex-row gap-4 text-start">
                            {{-- ====================== Mobile Layout ====================== --}}
                            <div class="flex flex-row items-center lg:hidden">
                                <img src="{{ $item['image'] }}" alt="{{ $item['title'] }}"
                                    class="w-1/3 h-[100px] object-cover rounded">
                                
                                <div class="flex flex-col justify-center px-3 w-2/3">
                                    <h3 class="text-base font-semibold text-black">{{ $item['title'] }}</h3>
                                    <div class="flex space-x-4 text-sm text-gray-500 mt-1">
                                        <p>{{ $item['publisher'] }}</p>
                                        <p>{{ $item['date'] }}</p>
                                    </div>
                                </div>
                            </div>

                            <div class="lg:hidden mt-3 px-1">
                                <p class="text-gray-700 mb-3 text-justify">{{ Str::limit($item['description'], 100) }}</p>
                            </div>

                            {{-- ====================== Desktop Layout ====================== --}}
                            <div class="hidden lg:flex flex-row w-full">
                                <!-- Gambar -->
                                <img src="{{ $item['image'] }}" alt="{{ $item['title'] }}"
                                    class="min-w-[200px] h-[130px] xl:min-w-[300px] xl:h-[200px] object-cover rounded">

                                <!-- Konten -->
                                <div class="flex flex-col justify-center px-4 w-full">
                                    <h3 class="text-xl font-semibold text-black">{{ $item['title'] }}</h3>
                                    <div class="flex space-x-4 text-sm text-gray-500 mt-1">
                                        <p>{{ $item['publisher'] }}</p>
                                        <p>{{ $item['date'] }}</p>
                                    </div>
                                    <p class="text-gray-700 mt-3 mb-3 text-justify">{{ Str::limit($item['description'], 150) }}</p>
                                </div>
                            </div>
                        </div>
                    </div>
                </a>
            @endforeach
        </div>
    </div>
</div>