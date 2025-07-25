{{-- <div class="">
    <div class="container mx-auto p-6 bg-white">
        <div class="flex items-center gap-5">
            <h2 class="text-lg md:text-2xl text-[#2C437F] font-bold mb-4 px-2">Workshop & Seminar</h2>
            <span class="h-[2px] flex-1 bg-[#EF0000] -mt-2"></span>
        </div>

        <div class="grid grid-cols-1 md:grid-cols-2 gap-4">
            <div class="text-white rounded">
                @if (count($workshop_seminar) > 0)
                    @php $item = $workshop_seminar[0]; @endphp
                    <a href="#">
                        <div class="p-2 hover:shadow-lg hover:bg-gray-100 transition-all rounded-lg bg-white">
                            <div class="flex flex-col lg:flex-row text-start">
                                <div class="flex flex-col items-start">

                                    <img src="{{ '/storage/'.$item['main_image'] }}" alt="{{ $item['title'] }}"
                                        class="w-full h-[200px] md:min-w-[200px] md:h-[220px] xl:min-w-[300px] xl:h-[250px] object-cover rounded"
                                        loading="lazy">

                                    <div class="flex flex-col justify-center w-2/3">
                                        <h3 class="text-base font-semibold text-black">{{ $item['title'] }}</h3>
                                        <div class="flex space-x-4 text-sm text-gray-500 mt-1">
                                            <p>{{ $item['author'] }}</p>
                                            <p>{{ $item->created_at->format('d/m/Y') }}</p>
                                        </div>
                                    </div>
                                    <div class="mt-3">
                                        <p class="text-gray-700 mb-3 text-justify">
                                            {{ Str::limit($item['description'], 100) }}</p>
                                    </div>
                                    <a href="#">
                                        <button
                                            class="bg-gray-200 text-[#0048FF] px-4 py-2 rounded hover:bg-gray-300 transition">
                                            Read More
                                        </button>
                                    </a>

                                </div>
                            </div>
                        </div>
                    </a>
                @endif
            </div>

            <div class="text-white rounded">
                <div class="flex flex-col gap-3">
                    @if (count($workshop_seminar) > 1)
                        @foreach ($workshop_seminar->slice(1) as $item)
                            <a href="#">
                                <div
                                    class="p-2 hover:shadow-lg hover:bg-gray-100 transition-all rounded-lg">
                                    <div class="flex flex-col lg:flex-row gap-4 text-start">
                                        <!-- Gambar -->
                                        <img src="{{ '/storage/'.$item['main_image'] }}" alt="{{ $item['title'] }}"
                                            class="w-full lg:w-[40%] h-[150px] object-cover rounded" loading="lazy">

                                        <!-- Konten -->
                                        <div class="flex flex-col justify-center flex-1">
                                            <h3 class="text-base font-semibold text-black">{{ $item['title'] }}</h3>
                                            <div class="flex space-x-4 text-sm text-gray-500 mt-1">
                                                <p>{{ $item['author'] }}</p>
                                                <p>{{ $item->created_at->format('d/m/Y') }}</p>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </a>
                        @endforeach
                    @endif
                </div>
            </div>
        </div>
        <!-- Pagination-->
        <div class="mt-6 pagination">
            {!! $workshop_seminar->links() !!}
        </div>
    </div>
</div> --}}

<div class="">
    <div class="container mx-auto bg-white">
        <div class="flex items-center gap-5">
            <h2 class="text-lg md:text-xl text-white bg-[#002789] py-1 font-bold mb-4 px-2">Workshop & Seminar</h2>
            <span class="h-[2px] flex-1 bg-[#FFD900] -mt-2"></span>
        </div>
        @if($workshop_seminar->isEmpty())
            <div class="flex flex-col items-center justify-center py-16 px-4 bg-gray-50 rounded-lg">
                <div class="text-center">
                    <!-- Icon -->
                    <svg class="mx-auto h-16 w-16 text-gray-400" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" 
                              d="M12 6.253v13m0-13C10.832 5.477 9.246 5 7.5 5S4.168 5.477 3 6.253v13C4.168 18.477 5.754 18 7.5 18s3.332.477 4.5 1.253m0-13C13.168 5.477 14.754 5 16.5 5c1.746 0 3.332.477 4.5 1.253v13C19.832 18.477 18.246 18 16.5 18c-1.746 0-3.332.477-4.5 1.253">
                        </path>
                    </svg>
                    
                    <!-- Pesan -->
                    <h3 class="mt-4 text-xl font-semibold text-gray-900">Belum Ada Workshop & Seminar</h3>
                    <p class="mt-2 text-sm text-gray-500">
                        Saat ini belum ada materi workshop & seminar yang tersedia. 
                        Silakan cek kembali nanti.
                    </p>
                </div>
            </div>
        @else
            <div class="grid grid-cols-1 md:grid-cols-2 gap-4">
                <div class="text-white rounded">
                    @if (count($workshop_seminar) > 0)
                        @php $item = $workshop_seminar[0]; @endphp
                            <div class="p-2 hover:shadow-lg hover:bg-gray-100 transition-all rounded-lg bg-white">
                                <div class="flex flex-col lg:flex-row text-start">
                                    <div class="flex flex-col items-start">

                                        <!-- Gambar utama dengan aspect-video -->
                                        <div class="w-full aspect-video overflow-hidden rounded">
                                            <img src="{{ '/storage/'.$item['main_image'] }}" alt="{{ $item['title'] }}"
                                                class="w-full h-full object-cover" loading="lazy">
                                        </div>

                                        <!-- Konten utama -->
                                        <div class="flex flex-col justify-center w-2/3">
                                            <h3 class="text-base mt-3 font-semibold text-black">{{ $item['title'] }}</h3>
                                            <div class="flex gap-4 text-sm text-gray-500 mt-1">
                                                <p>{{ $item['author'] }}</p>
                                                <p>{{ $item->created_at->format('d/m/Y') }}</p>
                                            </div>
                                        </div>

                                        <div class="mt-3">
                                            <p class="text-gray-700 mb-3 text-justify">
                                                {{ Str::limit($item['description'], 100) }}</p>
                                        </div>

                                        <a href="{{ route('website3.detail_berita', $item['id_slug']) }}">
                                            <button
                                                class="bg-gray-200 text-[#0048FF] px-4 py-2 rounded hover:bg-gray-300 transition">
                                                Read More
                                            </button>
                                        </a>
                                    </div>
                                </div>
                            </div>
                    @endif
                </div>

                <div class="text-white rounded">
                    <div class="flex flex-col gap-4 text-start">
                        @if (count($workshop_seminar) > 1)
                            @foreach ($workshop_seminar->slice(1) as $item)
                                <a href="{{ route('website3.detail_berita', $item['id_slug']) }}">
                                    <div class="p-2 hover:shadow-lg hover:bg-gray-100 transition-all rounded-lg">
                                        <div class="flex flex-row md:flex-col lg:flex-row gap-4 text-start w-full">
                                            <!-- Gambar responsive -->
                                            <img src="{{ '/storage/'.$item['main_image'] }}" alt="{{ $item['title'] }}"
                                                class="w-1/3 md:w-full h-[100px] md:h-[150px] lg:w-[40%] object-cover rounded" loading="lazy">

                                            <!-- Konten -->
                                            <div class="flex flex-col justify-center w-2/3">
                                                <h3 class="text-base font-semibold text-black">{{ $item['title'] }}</h3>
                                                <div class="mt-1 text-sm text-gray-500">
                                                    <p>{{ $item['author'] }}</p>
                                                    <p>{{ $item->created_at->format('d/m/Y') }}</p>
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                </a>
                            @endforeach
                        @endif
                    </div>
                </div>
            </div>

            <!-- Pagination-->
            <div class="mt-6 pagination">
                {!! $workshop_seminar->links() !!}
            </div>
        @endif
    </div>
</div>

