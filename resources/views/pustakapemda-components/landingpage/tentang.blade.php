<div class="max-w-6xl mx-auto p-0 my-14 bg-white {{ $extraClass ?? '' }} rounded-lg overflow-hidden">
    <div class="flex justify-center rounded-lg">
        {{-- <div class="w-full max-w-xl md:max-w-5xl"> --}}
        <div id="default-carousel" class="relative w-full" data-carousel="slide">
            <div class="flex flex-col-reverse lg:flex-row gap-6 items-center lg:items-start">
                <!-- Gambar Carousel (kiri) -->
                <div class="relative w-full lg:w-2/5 h-[420px] md:h-[400px] overflow-hidden rounded-lg shadow-md">
                    @foreach ($tentangItems as $index => $item)
                        <div class="carousel-slide-tentang absolute inset-0 w-full h-full transition-opacity duration-700 ease-in-out 
                    {{ $index === 0 ? 'opacity-100 pointer-events-auto' : 'opacity-0 pointer-events-none' }}"
                            data-index="{{ $index }}">
                            <img src="{{ $item['image'] }}" alt="" class="w-full h-full object-cover" loading="lazy">
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

                <!-- Konten Kanan -->
                <div class="w-full lg:w-3/5 text-start p-5 my-auto">
                    <h2 class="text-lg md:text-xl font-semibold text-[#2C437F] uppercase tracking-wide mb-3">Tentang Kami</h2>
                    <h2 class="text-xl md:text-2xl font-bold text-[#2C437F] mb-4">Pusat Tata Kelola Keuangan Dan Pembangunan Daerah</h2>
                    <p class="text-gray-600 text-justify"><span class="text-slate-700 font-bold">PUSTAKA PEMDA</span> merupakan
                        perusahaan penyedia jasa profesional yang bergerak di bidang bimbingan teknis (bimtek) dan studi
                        banding, dengan fokus utama pada peningkatan kapasitas aparatur pemerintah desa dan kecamatan di
                        seluruh Indonesia. <br> <br>
                        Sejak awal berdiri, kami telah dipercaya sebagai mitra oleh lebih dari 10.000
                        desa dari berbagai wilayah di nusantara. Komitmen kami adalah mendukung terciptanya tata kelola
                        keuangan dan pembangunan daerah yang transparan, akuntabel, serta berkelanjutan.</p>
                    <div class="flex flex-row gap-1 mt-3 md:mt-5 md:w-[250px]">
                        <a href="#">
                            <i data-lucide="facebook" class="w-8 h-8 p-1 rounded-xl bg-[#BB271A] text-white hover:bg-white hover:text-[#BB271A] tranform transition-all flex items-center justify-center"></i>
                        </a>
                        <a href="#">
                            <i data-lucide="instagram" class="w-8 h-8 p-1 rounded-xl bg-[#BB271A] text-white hover:bg-white hover:text-[#BB271A] tranform transition-all flex items-center justify-center"></i>
                        </a>
                        <a href="#">
                            <i data-lucide="linkedin" class="w-8 h-8 p-2 rounded-xl bg-[#BB271A] text-white hover:bg-white hover:text-[#BB271A] tranform transition-all flex items-center justify-center"></i>
                        </a>
                    </div>
                </div>
            </div>
        </div>

        {{-- </div> --}}
    </div>
</div>

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
