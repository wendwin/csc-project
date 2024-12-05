<nav x-data class="navbar navbar-expand-lg libre-caslon-text-regular bg-transparent fixed-top px-3 px-md-5"
    :class="{ 'bg-transparent': !$store.navbar.isExpanded, 'bg-nav': $store.navbar.isExpanded }">
    <div class="container">
        <a class="navbar-brand fs-2 text-white" href="#">CENDANA</a>
        <div class="d-flex align-items-center gap-3">
            <div class="contact-info d-none d-md-flex align-items-center d-lg-none">
                <a href="">
                    <div class="contact d-flex align-items-center me-4">
                        <i class="bi bi-telephone me-2"></i>
                        <p>+62 821 88224000</p>
                    </div>
                </a>
                <a href="">
                    <div class="mail d-flex align-items-center">
                        <i class="bi bi-envelope me-2"></i>
                        <p>cendana.sc@gmail.com</p>
                    </div>
                </a>
            </div>
            <button @click="$store.navbar.toggle()" class="navbar-toggler text-light" type="button"
                data-bs-toggle="collapse" data-bs-target="#navbarNav">
                <span class="navbar-toggler-icon"></span>
            </button>
        </div>
        <div class="collapse navbar-collapse d-lg-flex flex-column align-items-end ms-auto" id="navbarNav">
            <div class="contact-info d-none d-lg-flex align-items-center ms-auto my-2">
                <a href="">
                    <div class="contact d-flex align-items-center me-4">
                        <i class="bi bi-telephone me-2"></i>
                        <p>+62 821 88224000</p>
                    </div>
                </a>
                <a href="">
                    <div class="mail d-flex align-items-center">
                        <i class="bi bi-envelope me-2"></i>
                        <p>cendana.sc@gmail.com</p>
                    </div>
                </a>
            </div>
            <div class="line d-none d-lg-block mt-1"></div>
            <div class="">
                <ul class="navbar-nav ms-auto">
                    <li class="nav-item dropdown me-3">
                        <a class="nav-link dropdown-toggle" href="#" id="perusahaanDropdown" role="button">
                            Perusahaan
                        </a>
                        <ul class="dropdown-menu" aria-labelledby="perusahaanDropdown">
                            <li><a class="dropdown-item" href="#">Tentang</a></li>
                            <li><a class="dropdown-item" href="#">Anggota Direksi</a></li>
                            <li><a class="dropdown-item" href="#">Struktur Organisasi</a></li>
                            <li><a class="dropdown-item" href="#">Tata Kelola Perusahaan</a></li>
                        </ul>
                        <div class="nav-line"></div>
                    </li>
                    <li class="nav-item dropdown me-3">
                        <a class="nav-link dropdown-toggle" href="#" id="layananDropdown" role="button">
                            Layanan
                        </a>
                        <ul class="dropdown-menu" aria-labelledby="layananDropdown">
                            <li><a class="dropdown-item" href="#">Ringkasan</a></li>
                            <li><a class="dropdown-item" href="#">Pameran</a></li>
                            <li><a class="dropdown-item" href="#">Konfrensi</a></li>
                            <li><a class="dropdown-item" href="#">Acara Khusus</a></li>
                        </ul>
                        <div class="nav-line"></div>
                    </li>
                    <li class="nav-item me-3"><a class="nav-link" href="#">Klien</a>
                        <div class="nav-line"></div>
                    </li>
                    <li class="nav-item me-3"><a class="nav-link" href="#">Sejarah</a>
                        <div class="nav-line"></div>
                    </li>
                    <li class="nav-item dropdown me-3">
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
                        <div class="nav-line"></div>
                    </li>
                    <li class="nav-item me-3"><a class="nav-link" href="#">Berita</a>
                        <div class="nav-line"></div>
                    </li>
                    <li class="nav-item me-3"><a class="nav-link" href="#">Karir</a>
                        <div class="nav-line"></div>
                    </li>
                    <li class="nav-item me-3"><a class="nav-link" href="#">CSR</a>
                        <div class="nav-line"></div>
                    </li>
                    <li class="nav-item me-3"><a class="nav-link" href="#">Hubungi</a>
                        <div class="nav-line"></div>
                    </li>
                    <li class="nav-item me-3 d-lg-none mt-4">
                        <a class="nav-link" href="#">
                            <div class="contact d-flex align-items-center">
                                <i class="bi bi-telephone me-2"></i>
                                <p>+62 821 88224000</p>
                            </div>
                        </a>
                        <div class="nav-line"></div>
                    </li>
                    <li class="nav-item me-3 d-lg-none">
                        <a class="nav-link" href="#">
                            <div class="contact d-flex align-items-center">
                                <i class="bi bi-envelope me-2"></i>
                                <p>cendana.sc@gmail.com</p>
                            </div>
                        </a>
                        <div class="nav-line"></div>
                    </li>
                </ul>
            </div>
        </div>
    </div>
</nav>
