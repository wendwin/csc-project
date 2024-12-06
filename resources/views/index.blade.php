<x-layout>
    <!-- Carousel -->
    <x-slot:css>{{ $css }}</x-slot:css>
    <div class="position-relative">
        <div id="carouselExample" class="carousel slide vh-100" data-bs-ride="carousel">
            <div class="carousel-indicators d-lg-none">
                <button type="button" data-bs-target="#carouselExample" data-bs-slide-to="0" class="active"
                    aria-current="true" aria-label="Slide 1"></button>
                <button type="button" data-bs-target="#carouselExample" data-bs-slide-to="1"
                    aria-label="Slide 2"></button>
                <button type="button" data-bs-target="#carouselExample" data-bs-slide-to="2"
                    aria-label="Slide 3"></button>
                <button type="button" data-bs-target="#carouselExample" data-bs-slide-to="3"
                    aria-label="Slide 4"></button>
                <button type="button" data-bs-target="#carouselExample" data-bs-slide-to="4"
                    aria-label="Slide 5"></button>
            </div>
            <div class="carousel-inner vh-100">
                <div class="carousel-item active">
                    <img src="img/g20.jpg" class="d-block w-100" alt="Slide 1">
                    <div class="carousel-caption d-lg-none">
                        <h5>Sherpa Meeting <br>Presidensi G20</h5>
                        <p>2024</p>
                    </div>
                </div>
                <div class="carousel-item">
                    <img src="img/wwf-2024.jpg" class="d-block w-100" alt="Slide 2">
                    <div class="carousel-caption d-lg-none">
                        <h5>Expo 2020 Dubai</h5>
                        <p>2020</p>
                    </div>
                </div>
                <div class="carousel-item">
                    <img src="img/pon.jpg" class="d-block w-100" alt="Slide 3">
                    <div class="carousel-caption d-lg-none">
                        <h5>Pekan Olahraga Nasional (PON) XX</h5>
                        <p>2023</p>
                    </div>
                </div>
                <div class="carousel-item">
                    <img src="img/expo-2020-dubai.jpg" class="d-block w-100" alt="Slide 4">
                    <div class="carousel-caption d-lg-none">
                        <h5>10th World Water Forum</h5>
                        <p>2024</p>
                    </div>
                </div>
                <div class="carousel-item">
                    <img src="img/asian-paragames.jpg" class="d-block w-100" alt="Slide 5">
                    <div class="carousel-caption d-lg-none">
                        <h5>Asian Para Games</h5>
                        <p>2022</p>
                    </div>
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

            <div class="overlay-section d-none d-lg-flex position-absolute" style="font-family: Inter">
                <div class="d-flex">
                    <div class="event-button p-3">
                        <h5>Sherpa Meeting Presidensi G20</h5>
                        <div class="position-absolute bottom-0 mb-3 ">
                            <h6 class="text-center">2024</h6>
                        </div>
                    </div>
                    <div class="event-button p-3">
                        <h5>Expo 2020 Dubai</h5>
                        <div class="position-absolute bottom-0 mb-3">
                            <h6 class="text-center">2024</h6>
                        </div>
                    </div>
                    <div class="event-button p-3">
                        <h5>Pekan Olahraga Nasional (PON) XX</h5>
                        <div class="position-absolute bottom-0 mb-3">
                            <h6 class="text-center">2024</h6>
                        </div>
                    </div>
                    <div class="event-button p-3">
                        <h5>10th World Water Forum</h5>
                        <div class="position-absolute bottom-0 mb-3">
                            <h6 class="text-center">2024</h6>
                        </div>
                    </div>
                    <div class="event-button p-3">
                        <h5>Asian Para Games</h5>
                        <div class="position-absolute bottom-0 mb-3">
                            <h6 class="text-center">2024</h6>
                        </div>
                    </div>
                    <div class="event-button p-3">
                        <h5>Asean Business Advisory Council</h5>
                        <div class="position-absolute bottom-0 mb-3">
                            <h6 class="text-center">2024</h6>
                        </div>
                    </div>
                </div>
                <div class="more p-3 d-flex justify-content-center align-items-center gap-3">
                    <h6>Explore more</h6>
                    <i class="bi bi-caret-down-fill"></i>
                </div>
            </div>
            <div class="drop d-none d-lg-block"></div>
            <div class="drop-full d-lg-none d-flex justify-content-center align-items-center gap-3">
                <h6>Explore more</h6>
                <i class="bi bi-caret-down-fill"></i>
            </div>
        </div>
    </div>
</x-layout>
