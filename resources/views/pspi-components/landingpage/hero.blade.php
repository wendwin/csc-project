<div class=" mx-auto mt-4 p-3 md:mt-16">
    <div class="grid grid-cols-1 lg:grid-cols-5 gap-5 items-center rounded-lg">
        <div class="w-full md:max-w-[85%] mx-auto px-2 md:px-5 col-span-1 lg:col-span-3">
            <div id="default-carousel" class="relative w-full" data-carousel="slide">
                <!-- Carousel wrapper -->
                <div class="relative w-full h-[550px] md:h-[450px] overflow-hidden rounded-xl shadow-md">
                    <!-- Slides -->
                    @foreach ($carouselItems as $index => $item)
                        <div class="carousel-slide absolute inset-0 w-full h-full transition-opacity duration-700 ease-in-out 
                            {{ $index === 0 ? 'opacity-100 pointer-events-auto' : 'opacity-0 pointer-events-none' }}"
                            data-index="{{ $index }}">
                            <img src="{{ $item['main_image'] }}" class="w-full h-full object-cover" alt="Slide {{ $index + 1 }}" loading="lazy">
                            <div
                                class="absolute text-start px-20 md:px-13 inset-y-0 left-0 w-full md:w-2/3 bg-blue-800/70 text-white p-6 flex flex-col justify-center items-start space-y-4">
                                <p class="text-sm font-semibold">Terbaru</p>
                                <h1 class="text-2xl font-bold">{{ $item['title'] }}</h1>
                                <div class="flex flex-col text-start text-sm text-gray-200">
                                    <p>{{ $item['author'] }}</p>
                                    <p>{{ $item['updated_at'] }}</p>
                                </div>
                                <p class="text-sm md:text-base text-gray-100 md:pr-7">{{ Str::limit(strip_tags($item['content']), 125) }}</p>
                                <a href="{{ route('website2.detail_berita', $item['id_encrypt']) }}">
                                    <button class="bg-white text-blue-600 px-4 py-2 rounded hover:bg-blue-100 transition">Read
                                        More</button>
                                </a>
                            </div>
                        </div>
                    @endforeach

                    <!-- Controls -->
                    <button id="prevSlide"
                        class="flex absolute top-1/2 left-3 z-40 items-center justify-center w-10 h-10 bg-gray-100/50 rounded-full hover:bg-gray-300 focus:outline-none transition">
                        <svg class="w-5 h-5 text-gray-600" fill="none" stroke="currentColor" viewBox="0 0 24 24"
                            xmlns="http://www.w3.org/2000/svg">
                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M15 19l-7-7 7-7" />
                        </svg>
                    </button>
                    <button id="nextSlide"
                        class="flex absolute top-1/2 right-3 z-40 items-center justify-center w-10 h-10 bg-gray-100/50 rounded-full hover:bg-gray-300 focus:outline-none transition">
                        <svg class="w-5 h-5 text-gray-600" fill="none" stroke="currentColor" viewBox="0 0 24 24"
                            xmlns="http://www.w3.org/2000/svg">
                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M9 5l7 7-7 7" />
                        </svg>
                    </button>
                </div>
            </div>
        </div>

        <div class="grid grid-rows-4 gap-5 h-[600px] md:h-[500px] col-span-1 lg:col-span-2">
            <div class="row-span-1 flex items-center justify-center">
                <div class="w-full">
                    <div class="flex items-center">
                        <h1 class="text-white bg-[#002789] p-2 text-lg md:text-xl font-bold text-start">Dipercaya Oleh:</h1>
                        <span class="h-[2px] flex-1 bg-[#FFD900]"></span>
                    </div>
                </div>
            </div>

            <div class="row-span-2 flex items-center justify-center mt-10 md:mt-0 mx-auto lg:mx-0">
                <div class="w-full px-5">
                    <div class="flex flex-col md:flex-row gap-10 justify-start items-center h-full">
                        <div class="flex flex-col gap-3 items-center">
                            <img src="/img/pustakapemda/profil/kemendes.png" alt="" loading="lazy" class="w-full min-h-[100px] max-h-[150px] md:max-h-40 object-contain select-none pointer-events-none">
                            <p class="text-black font-bold">KEMENDES</p>
                        </div>
                        <div class="flex flex-col gap-3 items-center">
                            <img src="/img/pustakapemda/profil/kemendagri.png" alt="" loading="lazy" class="w-full min-h-[100px] max-h-[150px] md:max-h-40 object-contain select-none pointer-events-none">
                            <p class="text-black font-bold">KEMENDAGRI</p>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>

{{-- <script>
    const slides = document.querySelectorAll('.carousel-slide');
    let currentSlide = 0;

    function showSlide(index) {
        slides.forEach((slide, i) => {
            slide.classList.toggle('opacity-100', i === index);
            slide.classList.toggle('pointer-events-auto', i === index);
            slide.classList.toggle('opacity-0', i !== index);
            slide.classList.toggle('pointer-events-none', i !== index);
        });
    }

    function nextSlide() {
        currentSlide = (currentSlide + 1) % slides.length;
        showSlide(currentSlide);
    }

    function prevSlide() {
        currentSlide = (currentSlide - 1 + slides.length) % slides.length;
        showSlide(currentSlide);
    }

    document.getElementById('nextSlide').addEventListener('click', () => {
        nextSlide();
        resetAutoSlide();
    });

    document.getElementById('prevSlide').addEventListener('click', () => {
        prevSlide();
        resetAutoSlide();
    });

    let autoSlide = setInterval(nextSlide, 5000);
    function resetAutoSlide() {
        clearInterval(autoSlide);
        autoSlide = setInterval(nextSlide, 5000);
    }

    showSlide(currentSlide); 
</script> --}}


<script type="module">
    import { initCarousel } from '/js/carousel.js';

    document.addEventListener('DOMContentLoaded', function () {
        initCarousel({
            slideClass: 'carousel-slide',
            prevId: 'prevSlide',
            nextId: 'nextSlide',
        });
    });
</script>
