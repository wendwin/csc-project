<x-layout>
    <!-- Carousel -->
    <x-slot:css>{{ $css }}</x-slot:css>
    <div class="position-relative">
        <div  id="carouselExample" class="carousel slide " data-bs-ride="carousel">
            <div class="carousel-inner">
                <div class="carousel-item active">
                    <img src="img/g20.jpg" class="d-block w-100" alt="Slide 1">
                </div>
                <div class="carousel-item">
                    <img src="img/wwf-2024.jpg" class="d-block w-100" alt="Slide 2">
                </div>
                <div class="carousel-item">
                    <img src="img/pon.jpg" class="d-block w-100" alt="Slide 3">
                </div>
                <div class="carousel-item">
                    <img src="img/expo-2020-dubai.jpg" class="d-block w-100" alt="Slide 3">
                </div>
                <div class="carousel-item">
                    <img src="img/asian-paragames.jpg" class="d-block w-100" alt="Slide 3">
                </div>
            </div>
            <button class="carousel-control-prev" type="button" data-bs-target="#carouselExample" data-bs-slide="prev">
                <span class="carousel-control-prev-icon" aria-hidden="true"></span>
                <span class="visually-hidden">Previous</span>
            </button>
            <button class="carousel-control-next" type="button" data-bs-target="#carouselExample" data-bs-slide="next">
                <span class="carousel-control-next-icon" aria-hidden="true"></span>
                <span class="visually-hidden">Next</span>
            </button>
    
    
            <div class="overlay-section d-none d-xl-flex position-absolute">
                <div class="event-button p-3 position-relative">
                    <h5>Sherpa Meeting Presidensi G20</h5>
                    <div class="position-absolute bottom-0 mb-3 ">
                        <h6 class="text-center">2024</h6>
                    </div>
                </div>
                <div class="event-button p-3 position-relative">
                    <h5>Expo 2020 Dubai</h5>
                    <div class="position-absolute bottom-0 mb-3">
                        <h6 class="text-center">2024</h6>
                    </div>
                </div>
                <div class="event-button p-3 position-relative">
                    <h5>Pekan Olahraga Nasional (PON) XX</h5>
                    <div class="position-absolute bottom-0 mb-3">
                        <h6 class="text-center">2024</h6>
                    </div>
                </div>
                <div class="event-button p-3 position-relative">
                    <h5>10th World Water Forum</h5>
                    <div class="position-absolute bottom-0 mb-3">
                        <h6 class="text-center">2024</h6>
                    </div>
                </div>
                <div class="event-button p-3 position-relative">
                    <h5>Asian Para Games</h5>
                    <div class="position-absolute bottom-0 mb-3">
                        <h6 class="text-center">2024</h6>
                    </div>
                </div>
                <div class="event-button p-3 position-relative">
                    <h5>Asean Business Advisory Council</h5>
                    <div class="position-absolute bottom-0 mb-3">
                        <h6 class="text-center">2024</h6>
                    </div>
                </div>
                
            </div>
            {{-- <div class="overlay-line"></div> --}}
            <!-- Section bawah di dalam gambar -->
            {{-- <div class="overlay-section d-none d-lg-flex">
                <div class="">
                    <div class="row ">
                        <div class="col">
                            <div class="card">
                                <div class="card-body">
                                    <h5 class="card-title">Sherpa Meeting G20</h5>
                                    <p class="card-text">2021/2022</p>
                                </div>
                            </div>
                        </div>
                        <div class="col">
                            <div class="card">
                                <div class="card-body">
                                    <h5 class="card-title">Expo 2020 Dubai</h5>
                                    <p class="card-text">2021-2023</p>
                                </div>
                            </div>
                        </div>
                        <div class="col">
                            <div class="card">
                                <div class="card-body">
                                    <h5 class="card-title">PON XX</h5>
                                    <p class="card-text">2021</p>
                                </div>
                            </div>
                        </div>
                        <div class="col">
                            <div class="card">
                                <div class="card-body">
                                    <h5 class="card-title">Asian Para Games</h5>
                                    <p class="card-text">2018</p>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div> --}}
    
    
    
            {{-- <div class="drop "></div> --}}
        </div>
    </div>
</x-layout>