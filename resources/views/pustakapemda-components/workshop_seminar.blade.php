<div class="">
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

                                    <img src="{{ $item['image'] }}" alt="{{ $item['title'] }}"
                                        class="w-full h-[200px] md:min-w-[200px] md:h-[220px] xl:min-w-[300px] xl:h-[250px] object-cover rounded" loading="lazy">

                                    <div class="flex flex-col justify-center w-2/3">
                                        <h3 class="text-base font-semibold text-black">{{ $item['title'] }}</h3>
                                        <div class="flex space-x-4 text-sm text-gray-500 mt-1">
                                            <p>{{ $item['publisher'] }}</p>
                                            <p>{{ $item['date'] }}</p>
                                        </div>
                                    </div>
                                    <div class="mt-3">
                                        <p class="text-gray-700 mb-3 text-justify">{{ Str::limit($item['description'], 100) }}</p>
                                    </div>
                                    <a href="#">
                                        <button class="bg-gray-200 text-[#0048FF] px-4 py-2 rounded hover:bg-gray-300 transition">
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
                        @foreach (collect($workshop_seminar)->slice(1) as $item)
                            <a href="#">
                                <div class="p-2 hover:shadow-lg hover:bg-gray-100 transition-all rounded-lg bg-white">
                                    <div class="flex flex-col lg:flex-row gap-4 text-start">
                                        <div class="flex flex-col items-centertext-center">

                                            <img src="{{ $item['image'] }}" alt="{{ $item['title'] }}"
                                                class="w-full h-[100px] md:h-[130px] lg:h-[150px] xl:h-[170px] object-cover rounded" loading="lazy">

                                            <div class="flex flex-col justify-center">
                                                <h3 class="text-base font-semibold text-black">{{ $item['title'] }}</h3>
                                                <div class="flex space-x-4 text-sm text-gray-500 mt-1">
                                                    <p>{{ $item['publisher'] }}</p>
                                                    <p>{{ $item['date'] }}</p>
                                                </div>
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
    </div>
</div>
