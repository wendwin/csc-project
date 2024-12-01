<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Index Page</title>
    <!-- Bootstrap CSS -->
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/css/bootstrap.min.css" rel="stylesheet">
    <style>
      
        .navbar {
            position: absolute;
            top: 20px; 
            left: 0;
            width: 100%;
            background: rgba(211, 198, 198, 0.432);
            z-index: 10;
            border-top: 3px solid white;
            padding: 10px 20px;
        }

        .navbar-brand {
            font-size: 1.5rem;
            font-weight: bold;
            color: white;
            margin-left: -70px;
        }

        /* Menu styling */
        .nav-link {
            color: white !important;
            text-decoration: none;
            position: relative;
        }

        .nav-link::after {
            content: "";
            display: block;
            width: 0;
            height: 2px;
            background: white;
            transition: width 0.3s;
            position: absolute;
            bottom: -5px;
            left: 0;
        }

          .navbar-nav {
            margin-right: -50px;
        }

        .nav-link:hover::after {
            width: 100%;
        }

        .nav-link.active::after {
            width: 100%;
            height: 3px; 
        }

        /* Dropdown menu hover */
        .dropdown:hover .dropdown-menu {
            display: block;
            margin-top: 0;
        }
        .carousel-inner {
            height: 100vh; 
        }

        .carousel-inner img {
            object-fit: cover;
            height: 100%;
            width: 100%;
        }

        /* Section bawah di dalam gambar */
        .overlay-section {
            position: absolute;
            bottom: 0;
            left: 0;
            width: 100%;
            
            color: white;
            padding: 20px 0;
        }

        .card {
            background: rgba(255, 255, 255, 0.8);
        }
    </style>
</head>
<body>
    <!-- Navbar -->
    <nav class="navbar navbar-expand-lg">
        <div class="container">
            <a class="navbar-brand" href="#">CENDANA SOLUTION CENTER</a>
            <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#navbarNav">
                <span class="navbar-toggler-icon"></span>
            </button>
            <div class="collapse navbar-collapse" id="navbarNav">
                <ul class="navbar-nav ms-auto">
                    <li class="nav-item dropdown">
                        <a class="nav-link dropdown-toggle" href="#" id="perusahaanDropdown" role="button">
                            Perusahaan
                        </a>
                        <ul class="dropdown-menu" aria-labelledby="perusahaanDropdown">
                            <li><a class="dropdown-item" href="#">Tentang</a></li>
                            <li><a class="dropdown-item" href="#">Anggota Direksi</a></li>
                            <li><a class="dropdown-item" href="#">Struktur Organisasi</a></li>
                            <li><a class="dropdown-item" href="#">Tata Kelola Perusahaan</a></li>
                        </ul>
                    </li>
                    <li class="nav-item dropdown">
                        <a class="nav-link dropdown-toggle" href="#" id="layananDropdown" role="button">
                            Layanan
                        </a>
                        <ul class="dropdown-menu" aria-labelledby="layananDropdown">
                            <li><a class="dropdown-item" href="#">Ringkasan</a></li>
                            <li><a class="dropdown-item" href="#">Pameran</a></li>
                            <li><a class="dropdown-item" href="#">Konfrensi</a></li>
                            <li><a class="dropdown-item" href="#">Acara Khusus</a></li>
                        </ul>
                    </li>
                    <li class="nav-item"><a class="nav-link" href="#">Klien</a></li>
                    <li class="nav-item"><a class="nav-link" href="#">Sejarah & Pencapaian</a></li>
                    <li class="nav-item dropdown">
                        <a class="nav-link dropdown-toggle" href="#" id="investorDropdown" role="button">
                            Hubungan Investor
                        </a>
                        <ul class="dropdown-menu" aria-labelledby="investorDropdown">
                            <li><a class="dropdown-item" href="#">Ringkasan</a></li>
                            <li><a class="dropdown-item" href="#">Laporan Tahunan</a></li>
                            <li><a class="dropdown-item" href="#">Laporan Keuangan</a></li>
                            <li><a class="dropdown-item" href="#">Rapat Umum Pemegang Saham</a></li>
                            <li><a class="dropdown-item" href="#">Prospektus</a></li>
                            <li><a class="dropdown-item" href="#">Informasi Saham</a></li>
                            <li><a class="dropdown-item" href="#">Kontak Hubungan Investor</a></li>
                        </ul>
                    </li>
                    <li class="nav-item"><a class="nav-link" href="#">Berita</a></li>
                    <li class="nav-item"><a class="nav-link" href="#">Karir</a></li>
                    <li class="nav-item"><a class="nav-link" href="#">CSR</a></li>
                    <li class="nav-item"><a class="nav-link" href="#">Hubungi</a></li>
                </ul>
            </div>
        </div>
    </nav>

    <!-- Carousel -->
    <div id="carouselExample" class="carousel slide" data-bs-ride="carousel">
        <div class="carousel-inner">
            <div class="carousel-item active">
                <img src="https://via.placeholder.com/1920x1080" class="d-block w-100" alt="Slide 1">
            </div>
            <div class="carousel-item">
                <img src="https://via.placeholder.com/1920x1080" class="d-block w-100" alt="Slide 2">
            </div>
            <div class="carousel-item">
                <img src="https://via.placeholder.com/1920x1080" class="d-block w-100" alt="Slide 3">
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

        <!-- Section bawah di dalam gambar -->
        <div class="overlay-section">
            <div class="container">
                <div class="row mt-4">
                    <div class="col-md-3">
                        <div class="card">
                            <div class="card-body">
                                <h5 class="card-title">Sherpa Meeting G20</h5>
                                <p class="card-text">2021/2022</p>
                            </div>
                        </div>
                    </div>
                    <div class="col-md-3">
                        <div class="card">
                            <div class="card-body">
                                <h5 class="card-title">Expo 2020 Dubai</h5>
                                <p class="card-text">2021-2023</p>
                            </div>
                        </div>
                    </div>
                    <div class="col-md-3">
                        <div class="card">
                            <div class="card-body">
                                <h5 class="card-title">PON XX</h5>
                                <p class="card-text">2021</p>
                            </div>
                        </div>
                    </div>
                    <div class="col-md-3">
                        <div class="card">
                            <div class="card-body">
                                <h5 class="card-title">Asian Para Games</h5>
                                <p class="card-text">2018</p>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>

    <!-- Bootstrap JS -->
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/js/bootstrap.bundle.min.js"></script>
</body>
</html>
