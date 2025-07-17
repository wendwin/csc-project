<!-- Carousel -->
<x-layout :navbar="null" :css="'home.css'">
    <div class="position-relative">
        <div id="carouselExample" class="carousel slide vh-100" data-bs-ride="carousel">
            <div class="carousel-indicators d-lg-none ">
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
                <button type="button" data-bs-target="#carouselExample" data-bs-slide-to="5"
                    aria-label="Slide 6"></button>

            </div>
            <div class="carousel-inner vh-100 position-relative">
                <div class="carousel-item active">
                    <img src="img/carosel/img6.jpg" class="d-block w-100" alt="Slide 1">
                    <div class="carousel-caption d-lg-none mb-5">
                        <h5 class="">Bimtek Peningkatan Kapasitas Desa Se- Kec. Manuhing</h5>
                        <p class="mb-4">2024</p>
                    </div>
                    <div class="backdrop position-absolute"></div>
                </div>
                <div class="carousel-item">
                    <img src="img/carosel/img5.jpg" class="d-block w-100" alt="Slide 2">
                    <div class="carousel-caption d-lg-none mb-5">
                        <h5 class="">Bimtek Peningkatan Kapasitas & Kapabilitas Pemda Yogyakarta
                        </h5>
                        <p class="mb-4">2020</p>
                    </div>
                    <div class="backdrop position-absolute"></div>
                </div>
                <div class="carousel-item">
                    <img src="img/carosel/img4.jpg" class="d-block w-100" alt="Slide 3">
                    <div class="carousel-caption d-lg-none mb-5">
                        <h5 class="">Bimtek Peningkatan Kapasitas & Kapabilitas Pemda & PDAM</h5>
                        <p class="mb-4">2023</p>
                    </div>
                    <div class="backdrop position-absolute"></div>
                </div>
                <div class="carousel-item">
                    <img src="img/carosel/img3.jpg" class="d-block w-100" alt="Slide 4">
                    <div class="carousel-caption d-lg-none mb-5">
                        <h5 class="">Family Gathering Dinas Pariwisata Kab. Bengkayang</h5>
                        <p class="mb-4">2024</p>
                    </div>
                    <div class="backdrop position-absolute"></div>
                </div>
                <div class="carousel-item">
                    <img src="img/carosel/img2.jpg" class="d-block w-100" alt="Slide 5">
                    <div class="carousel-caption d-lg-none mb-5">
                        <h5 class="">Bimtek Peningkatan Kapasitas & Kapabilitas Pemda Kalimantan
                            Selatan</h5>
                        <p class="mb-4">2022</p>
                    </div>
                    <div class="backdrop position-absolute"></div>
                </div>
                <div class="carousel-item">
                    <img src="img/carosel/img1.jpg" class="d-block w-100" alt="Slide 6">
                    <div class="carousel-caption d-lg-none mb-5">
                        <h5 class="">Bimtek Peningkatan Kapasitas & Kapabilitas Pemdes se- Kec.
                            Putussibau Selatan</h5>
                        <p class="mb-4">2022</p>
                    </div>
                    <div class="backdrop position-absolute"></div>
                </div>
            </div>
            {{-- <button class="carousel-control-prev" type="button" data-bs-target="#carouselExample" data-bs-slide="prev">
                <span class="carousel-control-prev-icon" aria-hidden="true"></span>
                <span class="visually-hidden">Previous</span>
            </button>
            <button class="carousel-control-next" type="button" data-bs-target="#carouselExample" data-bs-slide="next">
                <span class="carousel-control-next-icon" aria-hidden="true"></span>
                <span class="visually-hidden">Next</span>
            </button> --}}

            <div class="overlay-section d-none d-lg-flex position-absolute" style="font-family: Inter">
                <div class="d-flex">

                    <div class="event-button px-3" @click="$store.carousel.setActiveSlide(0)"
                        @mouseover="$store.carousel.hovered = true" @mouseleave="$store.carousel.hovered = false"
                        :class="{ 'active': $store.carousel.currentSlide === 0 }" data-bs-target="#carouselExample"
                        data-bs-slide-to="0" role="button" aria-label="Slide 1">
                        <div class="line-bar-overlay mb-2"
                            :class="{ 'active-bar': $store.carousel.currentSlide === 0, 'hovered': $store.carousel.hovered }">
                        </div>
                        <h6>Bimtek Peningkatan Kapasitas Desa Se- Kec. Manuhing</h6>
                        <div class="position-absolute bottom-0 mb-3">
                            <h6 class="text-center">2024</h6>
                        </div>
                    </div>


                    <div class="event-button px-3" @click="$store.carousel.setActiveSlide(1)"
                        :class="{ 'active': $store.carousel.currentSlide === 1 }" data-bs-target="#carouselExample"
                        data-bs-slide-to="1" role="button" aria-label="Slide 2">
                        <div class="line-bar-overlay mb-2"
                            :class="{ 'active-bar': $store.carousel.currentSlide === 0 }"></div>
                        <h6>Bimtek Peningkatan Kapasitas & Kapabilitas Pemda Yogyakarta
                        </h6>
                        <div class="position-absolute bottom-0 mb-3">
                            <h6 class="text-center">2024</h6>
                        </div>
                    </div>

                    <div class="event-button px-3" @click="$store.carousel.setActiveSlide(2)"
                        :class="{ 'active': $store.carousel.currentSlide === 2 }" data-bs-target="#carouselExample"
                        data-bs-slide-to="2" role="button" aria-label="Slide 3">
                        <div class="line-bar-overlay mb-2"
                            :class="{ 'active-bar': $store.carousel.currentSlide === 0 }"></div>
                        <h6>Bimtek Peningkatan Kapasitas & Kapabilitas Pemda & PDAM</h6>
                        <div class="position-absolute bottom-0 mb-3">
                            <h6 class="text-center">2024</h6>
                        </div>
                    </div>

                    <div class="event-button px-3" @click="$store.carousel.setActiveSlide(3)"
                        :class="{ 'active': $store.carousel.currentSlide === 3 }" data-bs-target="#carouselExample"
                        data-bs-slide-to="3" role="button" aria-label="Slide 4">
                        <div class="line-bar-overlay mb-2"
                            :class="{ 'active-bar': $store.carousel.currentSlide === 0 }"></div>
                        <h6>Family Gathering Dinas Pariwisata Kab. Bengkayang</h6>
                        <div class="position-absolute bottom-0 mb-3">
                            <h6 class="text-center">2024</h6>
                        </div>
                    </div>

                    <div class="event-button px-3" @click="$store.carousel.setActiveSlide(4)"
                        :class="{ 'active': $store.carousel.currentSlide === 4 }" data-bs-target="#carouselExample"
                        data-bs-slide-to="4" role="button" aria-label="Slide 5">
                        <div class="line-bar-overlay mb-2"
                            :class="{ 'active-bar': $store.carousel.currentSlide === 0 }"></div>
                        <h6>Bimtek Peningkatan Kapasitas & Kapabilitas Pemda Kalimantan Selatan</h6>
                        <div class="position-absolute bottom-0 mb-3">
                            <h6 class="text-center">2024</h6>
                        </div>
                    </div>

                    <div class="event-button px-3" @click="$store.carousel.setActiveSlide(5)"
                        :class="{ 'active': $store.carousel.currentSlide === 5 }" data-bs-target="#carouselExample"
                        data-bs-slide-to="5" role="button" aria-label="Slide 6">
                        <div class="line-bar-overlay mb-2"
                            :class="{ 'active-bar': $store.carousel.currentSlide === 0 }">
                        </div>
                        <h6>Bimtek Peningkatan Kapasitas & Kapabilitas Pemdes se- Kec.
                            Putussibau Selatan
                        </h6>
                        <div class="position-absolute bottom-0 mb-3">
                            <h6 class="text-center">2024</h6>
                        </div>
                    </div>

                </div>
                <a href="#more" class="more p-3 d-flex justify-content-center align-items-center gap-3">
                    <h6 class="text-capitalize">jelajah lebih lanjut</h6>
                    <i class="bi bi-caret-down-fill"></i>
                </a>
            </div>
        </div>
        <div class="drop d-none d-lg-block"></div>
        <a href="#more" class="drop-full d-lg-none d-flex justify-content-center align-items-center gap-3">
            <h6 class="text-capitalize">jelajah lebih lanjut</h6>
            <i class="bi bi-caret-down-fill">
            </i>
        </a>
        {{-- <div class="drop-full d-lg-none d-flex justify-content-center align-items-center gap-3">
        </div> --}}
    </div>
    </div>

    <!-- seummery-about -->
    {{-- <div class="summery-about container my-5 px-4">
        <div class="row">
            <div class="col-md-7">
                <div class="line-bar mb-3"></div>
                <h2 class="fw-bolder mb-4">Menghadirkan Solusi, <br> Menciptakan Dunia Tak Terbatas</h2>
                <p class="mb-2">Cendana Solution Center adalah mitra terpercaya yang menghadirkan solusi komprehensif
                    di bidang event
                    organizer, ketahanan pangan, dan konstruksi. Dengan keahlian dan dedikasi, kami membantu menciptakan
                    acara yang berkesan, mendukung kebutuhan pangan berkelanjutan, dan membangun infrastruktur yang
                    kokoh. Kami percaya bahwa inovasi dan kolaborasi adalah kunci untuk mewujudkan masa depan yang lebih
                    baik bagi masyarakat dan lingkungan. Bersama Cendana Solution Center, setiap langkah Anda menuju
                    sukses adalah prioritas kami.</p>
                <a href="#">Lebih lanjut tentang kami <i class="bi bi-arrow-right"></i></a>
            </div>
            <div class="col-md-5">
                <img src="img/example.avif" alt="" width="100%">
            </div>
        </div>
    </div> --}}
    <div class="glimpse p-md-0" id="more">
        <div class="row glimpse-section mb-5 ">
            <div class="col-md-7 glimpse-text-container w-100 px-4">
                <div class="text-content">
                    <div class="line-bar mb-3"></div>
                    <h2 class="glimpse-title fs-1 mb-4">Menghadirkan Solusi, Menciptakan Dunia Tak Terbatas</h2>
                    <p class="glimpse-highlight">
                        Cendana Solution Center adalah mitra terpercaya yang menghadirkan solusi komprehensif di
                        bidang event organizer, ketahanan pangan, dan konstruksi. Dengan keahlian dan dedikasi, kami
                        membantu menciptakan acara yang berkesan, mendukung kebutuhan pangan berkelanjutan, dan
                        membangun infrastruktur yang kokoh.
                    </p>
                    <p class="glimpse-text">Kami percaya bahwa inovasi dan kolaborasi adalah kunci untuk mewujudkan
                        masa depan yang lebih baik bagi masyarakat dan lingkungan. Bersama Cendana Solution Center,
                        setiap langkah Anda menuju sukses adalah prioritas kami.</p>
                    <a href="{{ route('perusahaan.tentang') }}">Lebih lanjut tentang kami <i
                            class="bi bi-arrow-right"></i></a>

                    <div class="count d-lg-flex mt-lg-5 ">
                        <div class="me-lg-5">
                            <p class="number m-0">1+</p>
                            <p>Years Experience</p>
                        </div>
                        <div class="me-lg-5">
                            <p class="number  m-0">500+</p>
                            <p>Events</p>
                        </div>
                        <div class="me-lg-5">
                            <p class="number  m-0">2.000.000+</p>
                            <p>Events Participants</p>
                        </div>
                    </div>
                </div>

            </div>
            <!-- Image -->
            <div class="col-md-5 glimpse-image-container">
                <img src="/img/intro3.jpg" alt="Event Image" class="glimpse-image">
            </div>
        </div>
    </div>
    <div class="glimpse-bottom "></div>

    {{-- <div class="school">
        <div class="bg-white p-5 position-relative">
            <div class="line-bar position-absolute top-0 end-0 me-3 mt-3"></div>
            <div class="line-bar-title mb-5">
                <h2 class="fw-bolder mx-auto text-center">Sekolah Koperasi Desa Merah Putih & Bisnis BUMDes Bangkitkan Desa, Kuatkan Indonesia</h2>
            </div>
            <div class="row">
                <div class="col-md-6 mb-4">
                    <img src="img/programschool.png" alt="" class="w-100">
                </div>
                <div class="col-md-6 d-flex flex-column justify-content-center">
                    <p class="fs-6 text-justify">Program ini merupakan inisiatif kolaboratif antara Cendana Solution Center, Desa Ponggok Klaten, dan Narasi Desa, yang bertujuan untuk memperkuat ekonomi desa melalui peningkatan kapasitas pengelolaan BUMDes dan koperasi desa. Dengan pendekatan berbasis praktik, peserta akan dibekali keterampilan manajerial, kewirausahaan, perencanaan bisnis, hingga strategi pemasaran digital. Pelatihan berlangsung selama 1 minggu, dilanjutkan dengan pendampingan intensif selama 1 bulan.</p>
                    <div class="collapse" id="readMore">
                        <p class="fs-6 fw-bold">Tujuan Program:</p>
                        <ol class="fs-6">
                            <li>Meningkatkan kapasitas SDM pengelola BUMDes dan koperasi secara profesional dan akuntabel.</li>
                            <li>Mendorong transformasi BUMDes menjadi entitas bisnis yang berkelanjutan.</li>
                            <li>Mengembangkan usaha berbasis potensi lokal: pertanian, pariwisata, ekonomi kreatif, dan lainnya.</li>
                            <li>Membentuk ekosistem bisnis desa yang kolaboratif dan inklusif.</li>
                            <li>Menghasilkan rencana bisnis konkret dan roadmap pengembangan ekonomi desa.</li>
                        </ol>
                        <p class="fs-6 fw-bold">Manfaat Program:</p>
                        <ol class="fs-6">
                            <li>Tumbuhnya unit usaha produktif desa.</li>
                            <li>Peningkatan PAD dan kesejahteraan masyarakat.</li>
                            <li>Terciptanya lapangan kerja di tingkat desa.</li>
                            <li>Terbangunnya jejaring antar desa, pelaku usaha, dan pemangku kepentingan.</li>
                        </ol>
                        </div>
                            <a class="btn btn-link p-0 toggle-btn d-flex align-items-center mt-2 mx-auto mx-lg-0" data-bs-toggle="collapse" href="#readMore" role="button" aria-expanded="false" aria-controls="readMore"> 
                        <span class="toggle-text me-2"></span></a>
                        </div>
            </div>
        </div>
    </div> --}}

    <div class="service">
        <div class="container" style="background-color: ">
            <div class="line-bar-title mb-3"></div>
            <h4 class=" mb-5 text-white">Layanan</h4>
            <div class="mb-xl-0 d-xl-flex justify-content-evenly align-items-center gap-5">
                <a href="{{ route('layanan.event_organizer') }}">
                    <div class="card position-relative mb-4">
                        <img src="img/layanan/event-organizer.jpg" class="card-img-top" alt="...">
                        <div class="card-body position-absolute ">
                            <div class="line-bar mb-2"></div>
                            <p class="fs-3 fw-bold">Event Organizer</p>
                            <a href="{{ route('layanan.event_organizer') }}" class="">Lebih lanjut...</a>
                        </div>
                    </div>
                </a>
                <a href="{{ route('layanan.ketahanan_pangan') }}">
                    <div class="card position-relative mb-4">
                        <img src="img/layanan/sawah.jpg" class="card-img-top" alt="...">
                        <div class="card-body position-absolute">
                            <div class="line-bar mb-2"></div>
                            <p class="fs-3 fw-bold">Ketahanan Pangan</p>
                            <a href="{{ route('layanan.ketahanan_pangan') }}" class="">Lebih lanjut...</a>
                        </div>
                    </div>
                </a>
                <a href="{{ route('layanan.konstruksi') }}">
                    <div class="card position-relative mb-4">
                        <img src="img/layanan/konstruksi.jpg" class="card-img-top" alt="...">
                        <div class="card-body position-absolute ">
                            <div class="line-bar mb-2"></div>
                            <p class="fs-3 fw-bold">Konstruksi</p>
                            <a href="{{ route('layanan.konstruksi') }}" class="">Lebih lanjut...</a>
                        </div>
                    </div>
                </a>
            </div>
        </div>
    </div>

    <div class="company mt-5">
        <div class="container">
            <div class="logo d-flex flex-column ">
                <div class="induk text-center mb-5">
                    {{-- <h2 class="mb-4">Perusahaan Induk</h2> --}}
                    <img class="parent" src="img/logo/csc.png" alt="">
                </div>
                <div class="flex mt-4">
                    {{-- <div class="text-center mb-4">
                        <h2>Anak Perusahaan</h2>
                    </div> --}}
                    <div class="d-flex md-flex-row flex-wrap justify-content-center align-items-center gap-5">
                        <div class=" mb-5 mb-md-0">
                            <img src="img/logo/pusdiklatnas.png" alt="" class="child order-md-2">
                            <div class="text-center text-md-end mt-2 order-md-1">
                                {{-- <p class="text-uppercase fw-semibold">pusdiklatnas</p> --}}
                            </div>
                        </div>
                        <div class="  mb-5 mb-md-0">
                            <img src="img/logo/pustakapemda2.png" alt="" class="child">
                            <div class="text-center text-md-start mt-2">
                                {{-- <p class="text-uppercase fw-semibold">pustakapemda</p> --}}
                            </div>
                        </div>
                        
                    </div>
                    <div class="d-flex flex-row justify-content-center align-items-center">
                        <img src="img/logo/sertifikasi.png" alt="" class="child">
                        <div class="text-center text-md-start mt-2">
                            {{-- <p class="text-uppercase fw-semibold">pustakapemda</p> --}}
                        </div>
                    </div>
                    {{-- <div class="text-center">
                            <img src="img/logo/sertifikasi.png" alt="" class="sertifikasi mt-4 mt-md-2">
                            <div class="text-center mt-2 order-md-1">
                                <p class="text-uppercase fw-semibold">pspi</p>
                                <p class="">Pusat Sertifikasi Profesi Indonesia</p>
                    </div> --}}
                </div>
            </div>
        </div>

        <div class="trust">
            <div class="container">
                <div class="line-bar-title mb-3"></div>
                <h4 class=" mb-5">Dipercaya Oleh</h4>
                <div class="org-one text-center d-md-flex flex-warp justify-content-center align-items-center gap-5">
                    <img class="mx-5 mx-md-0 mb-4 mb-md-0" src="img/kemitraan/logo-kemendes.png" alt="">
                    <img class="mx-5 mx-md-0 mb-4 mb-md-0" src="img/kemitraan/logo-kemendagri.png" alt="">
                    <img class="mx-5 mx-md-0 mb-4 mb-md-0" src="img/kemitraan/logo-kemendikbud.png" alt="">
                </div>
                <div
                    class="org-one text-center my-md-5 my-0 mb-5 mb-md-0 d-md-flex justify-content-center align-items-center flex-wrap gap-5">
                    <img class="mx-5 mx-md-0 mb-4 mb-md-0" src="img/kemitraan/logo-tanah-laut.png" alt="">
                    <img class="mx-5 mx-md-0 mb-4 mb-md-0" src="img/kemitraan/logo-karimun.png" alt="">
                    <img class="mx-5 mx-md-0 mb-4 mb-md-0" src="img/kemitraan/logo-konawe-kepulauan.png" alt="">
                    <img class="mx-5 mx-md-0 mb-4 mb-md-0" src="img/kemitraan/logo-kapuas-hulu.png" alt="">
                    <img class="mx-5 mx-md-0 mb-4 mb-md-0" src="img/kemitraan/logo-konawe-selatan.png" alt="">
                    <img class="mx-5 mx-md-0 mb-4 mb-md-0" src="img/kemitraan/logo-konawe-utara.png" alt="">
                </div>
                <div class="peta mt-5">
                    <div class="text-center">
                        <h4 class="fw-semibold mb-5">Mitra Kami</h4>
                        <img src="img/kemitraan/Peta.png" alt="" width="500">
                    </div>
                    <div class="mt-4 d-md-flex justify-content-center gap-md-5">
                        <ul>
                            <li>APDESI DESI Kab. Tanah Laut</li>
                            <li>Dinas Pendidikan Kab. Tanah Laut</li>
                            <li>Kec. Manuhing, Kab. Gunung Mas</li>
                            <li>Kec. Manuhing Raya, Kab. Gunung Mas</li>
                            <li>Kec. Rungan</li>
                            <li>Kec. Rungan Hulu</li>
                            <li>Kec. Lembuya, Kab. Konawe</li>
                            <li>Kec. Aru Selatan Timur, Kab. Kepulauan Aru</li>
                            <li>Kec. Weda Selatan, Kab. Halsel</li>
                        </ul>
                        <ul>
                            <li>Kab. Maluku Tenggara</li>
                            <li>Kab. Karimun</li>
                            <li>Kab. Pasaman</li>
                            <li>Kab. Tanah Bumbu</li>
                            <li>Kab. Kapuas Hulu</li>
                            <li>Kab. Toli Toli</li>
                            <li>Kab. Morotai</li>
                            <li>Kab. Banggailaut</li>
                            <li>Seluruh OPD Di Indonesia yang Berpartisipasi</li>
                        </ul>
                    </div>
                </div>
            </div>
        </div>

        <!-- Vision & Mission Section -->
        {{-- <div class="vision-mission-section">
            <div class="vision mb-4">
                <h3>Vision</h3>
                <p>To be the leading company in creative and innovative solutions for global challenges.</p>
            </div>
            <div class="mission">
                <h3>Mission</h3>
                <p>Empowering communities through innovation and fostering sustainable growth in every project we
                    undertake.</p>
            </div>  --}}

        <!-- Subsidiary Section -->
        {{-- <div class="subsidiary-section">
            <h2 class="subsidiary-title">Subsidiary</h2>
            <div class="row justify-content-end">
                <div class="col-md-6 col-lg-4 mb-4">
                    <div class="card h-100">
                        <div class="card-body">
                            <h4 class="card-title">Bahaso</h4>
                            <p class="card-text">A leading language learning platform designed for global communication
                                and collaboration.</p>
                            <a href="#" class="btn btn-readmore">Learn More</a>
                        </div>
                    </div>
                </div>

                <div class="col-md-6 col-lg-4 mb-4">
                    <div class="card h-100">
                        <div class="card-body">
                            <h4 class="card-title">Aldena Ganthari Kreatif</h4>
                            <p class="card-text">Delivering creative solutions and designs that inspire and connect.
                            </p>
                            <a href="#" class="btn btn-readmore">Learn More</a>
                        </div>
                    </div>
                </div>
            </div>
        </div> --}}
    </div>

    @include('components.berita')

    <div class="offer text-center">
        <div class="container">
            <p class="fs-2 fw-medium mb-5">Butuh Solusi Handal untuk Event Organizer, Ketahanan Pangan, dan Konstruksi?
            </p>
            <a href="{{ route('hubungi') }}" class="btnhub btn-primary text-uppercase">Hubungi Kami Sekarang</a>
        </div>
    </div>

</x-layout>
