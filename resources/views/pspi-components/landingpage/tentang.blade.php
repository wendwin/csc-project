<section class="max-w-6xl mx-auto p-3 my-5 md:my-10 bg-white ">
    <div class="flex flex-col md:flex-row justify-between items-center gap-5">
        <div class="">
            <div class="flex items-center">
                <h1 class="text-white bg-[#002789] p-2 text-lg md:text-xl font-bold text-start">Tentang Kami</h1>
                <span class="h-[2px] flex-1 bg-[#FFD900]"></span>
            </div>
            <p class="text-justify py-2 px-3 text-slate-700">
                    Dalam menghadapi kompleksitas tata kelola pemerintahan yang semakin dinamis dan berorientasi pada pelayanan publik yang profesional, kebutuhan akan aparatur yang kompeten dan tersertifikasi menjadi semakin mendesak. Baik di tingkat Organisasi Perangkat Daerah (OPD) maupun hingga ke tingkat pemerintahan desa, kapasitas sumber daya manusia menjadi penentu keberhasilan program pembangunan dan pelayanan masyarakat.
                    <br><br>
                    Pusat Sertifikasi Profesi Indonesia (PSPI) hadir sebagai solusi strategis dalam menjawab tantangan tersebut. Kami berkomitmen untuk menjadi lembaga terpercaya dalam peningkatan kapasitas dan sertifikasi kompetensi bagi aparatur pemerintahan di seluruh Indonesia. Dengan pendekatan yang terstruktur, terukur, dan berstandar nasional, PSPI memfasilitasi penguatan kapasitas SDM agar selaras dengan tuntutan reformasi birokrasi, akuntabilitas, dan profesionalisme.
            </p>
        </div>
        <div class="w-full md:min-w-[400px] mx-auto px-2 md:px-5 col-span-1 lg:col-span-3">
            <div id="default-carousel" class="relative w-full" data-carousel="slide">
                <!-- Carousel wrapper -->
                <div class="relative w-full h-[350px] md:h-[325px] overflow-hidden rounded-xl shadow-md">
                    <!-- Slides -->
                    @foreach ($tentangItems as $index => $item)
                        <div class="carousel-slide-tentang absolute inset-0 w-full h-full transition-opacity duration-700 ease-in-out 
                            {{ $index === 0 ? 'opacity-100 pointer-events-auto' : 'opacity-0 pointer-events-none' }}"
                            data-index="{{ $index }}">
                            <img src="{{ $item['image'] }}" class="w-full h-full object-cover" alt="Slide {{ $index + 1 }}" loading="lazy">
                        </div>
                    @endforeach

                    <!-- Controls -->
                    <button id="prevSlideTentang"
                        class="flex absolute top-1/2 left-3 z-40 items-center justify-center w-10 h-10 bg-gray-100/50 rounded-full hover:bg-gray-300 focus:outline-none transition">
                        <svg class="w-5 h-5 text-gray-600" fill="none" stroke="currentColor" viewBox="0 0 24 24"
                            xmlns="http://www.w3.org/2000/svg">
                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M15 19l-7-7 7-7" />
                        </svg>
                    </button>
                    <button id="nextSlideTentang"
                        class="flex absolute top-1/2 right-3 z-40 items-center justify-center w-10 h-10 bg-gray-100/50 rounded-full hover:bg-gray-300 focus:outline-none transition">
                        <svg class="w-5 h-5 text-gray-600" fill="none" stroke="currentColor" viewBox="0 0 24 24"
                            xmlns="http://www.w3.org/2000/svg">
                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M9 5l7 7-7 7" />
                        </svg>
                    </button>
                </div>
            </div>
        </div>
</section>

<script type="module">
    import {
        initCarousel
    } from '/js/carousel.js';

    document.addEventListener('DOMContentLoaded', function() {
        initCarousel({
            slideClass: 'carousel-slide-tentang',
            prevId: 'prevSlideTentang',
            nextId: 'nextSlideTentang',
        });
    });
</script>
