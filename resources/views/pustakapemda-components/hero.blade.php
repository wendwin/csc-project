<div class="md:max-w-5xl mx-auto py-10">
    <div class="flex justify-center rounded-lg">
        <div class="w-full max-w-xl md:max-w-5xl">
            <div id="default-carousel" class="relative w-full" data-carousel="slide">
                <!-- Carousel wrapper -->
                <div class="relative w-full h-[600px] md:h-[500px] overflow-hidden rounded-xl shadow-md">
                    <!-- Slides -->
                    <div class="carousel-slide absolute inset-0 w-full h-full opacity-100 transition-opacity duration-700 ease-in-out pointer-events-auto"
                        data-index="0">
                        <img src="/img/asean-bac.jpg" class="w-full h-full object-cover" alt="Slide 1">
                        <div
                            class="absolute text-start px-20 md:px-5 inset-y-0 right-0 w-full md:w-1/3 bg-blue-800/70 text-white p-6 flex flex-col justify-center items-start md:items-start space-y-4">
                            <p class="text-sm font-semibold">Terbaru</p>
                            <h1 class="text-2xl font-bold">Bimbingan Teknis Penyusunan Dokumen Kontrak dan E-Katalog V.
                                6, SEKDA Balikpapan</h1>
                            <div class="flex space-x-4 text-sm text-gray-200">
                                <p>Pustaka Pemda</p>
                                <p>27/06/2025</p>
                            </div>
                            <p class="text-sm text-gray-100">Penyusunan dokumen kontrak melibatkan beberapa langkah
                                penting, mulai dari...</p>
                            <button class="bg-white text-blue-600 px-4 py-2 rounded hover:bg-blue-100 transition">Read
                                More</button>
                        </div>
                    </div>

                    <div class="carousel-slide absolute inset-0 w-full h-full opacity-0 transition-opacity duration-700 ease-in-out pointer-events-none"
                        data-index="1">
                        <img src="/img/g20.jpg" class="w-full h-full object-cover" alt="Slide 2">
                        <div
                            class="absolute text-start px-20 md:px-5 inset-y-0 right-0 w-full md:w-1/3 bg-blue-800/70 text-white p-6 flex flex-col justify-center items-start space-y-4">
                            <p class="text-sm font-semibold">Terbaru</p>
                            <h1 class="text-2xl font-bold">Pameran G20: Inovasi Global untuk Masa Depan</h1>
                            <div class="flex space-x-4 text-sm text-gray-200">
                                <p>Pustaka Pemda</p>
                                <p>15/06/2025</p>
                            </div>
                            <p class="text-sm text-gray-100">Acara G20 memperlihatkan komitmen negara-negara dalam
                                menghadapi tantangan global...</p>
                            <button class="bg-white text-blue-600 px-4 py-2 rounded hover:bg-blue-100 transition">Read
                                More</button>
                        </div>
                    </div>

                    <div class="carousel-slide absolute inset-0 w-full h-full opacity-0 transition-opacity duration-700 ease-in-out pointer-events-none"
                        data-index="2">
                        <img src="/img/expo-2020-dubai.jpg" class="w-full h-full object-cover" alt="Slide 3">
                        <div
                            class="absolute text-start px-20 md:px-5 inset-y-0 right-0 w-full md:w-1/3 bg-blue-800/70 text-white p-6 flex flex-col justify-center items-start space-y-4">
                            <p class="text-sm font-semibold">Terbaru</p>
                            <h1 class="text-2xl font-bold">Expo 2020 Dubai: Kolaborasi Internasional</h1>
                            <div class="flex space-x-4 text-sm text-gray-200">
                                <p>Pustaka Pemda</p>
                                <p>10/06/2025</p>
                            </div>
                            <p class="text-sm text-gray-100">Berbagai inovasi dari berbagai negara ditampilkan dalam
                                Expo 2020 Dubai...</p>
                            <button class="bg-white text-blue-600 px-4 py-2 rounded hover:bg-blue-100 transition">Read
                                More</button>
                        </div>
                    </div>

                    <!-- Controls -->
                    <button id="prevSlide"
                        class="flex absolute top-1/2 left-3 z-40 items-center justify-center w-10 h-10 bg-gray-100/50 rounded-full hover:bg-gray-300 focus:outline-none transition">
                        <svg class="w-5 h-5 text-gray-600" fill="none" stroke="currentColor" viewBox="0 0 24 24"
                            xmlns="http://www.w3.org/2000/svg">
                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M15 19l-7-7 7-7">
                            </path>
                        </svg>
                    </button>
                    <button id="nextSlide"
                        class="flex absolute top-1/2 right-3 z-40 items-center justify-center w-10 h-10 bg-gray-100/50 rounded-full hover:bg-gray-300 focus:outline-none transition">
                        <svg class="w-5 h-5 text-gray-600" fill="none" stroke="currentColor" viewBox="0 0 24 24"
                            xmlns="http://www.w3.org/2000/svg">
                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M9 5l7 7-7 7">
                            </path>
                        </svg>
                    </button>
                </div>
            </div>
        </div>
    </div>
</div>
<script>
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
</script>