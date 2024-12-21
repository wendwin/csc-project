<nav x-data="{ scrollY: 0 }" x-init="window.addEventListener('scroll', () => { scrollY = window.scrollY })"
    class="navbar navbar-expand-lg libre-caslon-text-regular fixed-top px-3 px-md-5"
    :class="{
        'bg-transparent': !$store.navbar.isExpanded && window.scrollY === 0,
        ['bg-nav shadow-nav']: $store.navbar.isExpanded || window.scrollY > 0,
        'hidden': !$store.navbar.isVisible,
        'visible': $store.navbar.isVisible,
    
    }">
    <div class="container">
        <a class="navbar-brand" href="/" x-data="{ scrollY: 0 }" x-init="window.addEventListener('scroll', () => { scrollY = window.scrollY })">
            <img src="{{ asset('img/logo/csc.png') }}"
            
                :class="{
                    'navbar-brand-filter': !$store.navbar.isExpanded && window.scrollY === 0,
                    'navbar-brand-ori': $store.navbar.isExpanded || window.scrollY > 0,
                }"
                alt="cendana">
        </a>

        <div class="d-flex align-items-center gap-3">
            <div class="contact-info d-none d-md-flex align-items-center d-lg-none">
                {{-- mobile --}}
                <a href="">
                    <div class="contact d-flex align-items-center me-4">
                        <span class=""
                            :class="{
                                'nav-link-on': !$store.navbar.isExpanded && window.scrollY === 0,
                                'nav-link-scroll': $store.navbar.isExpanded || window.scrollY > 0,
                            }"><i
                                class="bi bi-telephone me-2"></i>
                            +62 811-1954-17 | +62 81-1945-045</span>
                    </div>
                </a>
                <a href="">
                    <div class="mail d-flex align-items-center">
                        <span class=""
                            :class="{
                                'nav-link-on': !$store.navbar.isExpanded && window.scrollY === 0,
                                'nav-link-scroll': $store.navbar.isExpanded || window.scrollY > 0,
                            }">
                            <i class="bi bi-envelope me-2"></i>
                            cscgroup26@gmail.com</span>
                    </div>
                </a>
            </div>
            <button :class="{ show: $store.navbar.isExpanded }" @click="$store.navbar.toggleNavbar()"
                class="navbar-toggler text-light" type="button" data-bs-toggle="collapse" data-bs-target="#navbarNav">
                <span class="navbar-toggler-icon"></span>
            </button>
        </div>

        <div class="collapse navbar-collapse d-lg-flex flex-column align-items-end ms-auto" id="navbarNav">
            <div class="contact-info d-none d-lg-flex align-items-center ms-auto my-2">
                <a href="">
                    <div class="contact d-flex align-items-center me-4">
                        <span class=""
                            :class="{
                                'nav-link-on': !$store.navbar.isExpanded && window.scrollY === 0,
                                'nav-link-scroll': $store.navbar.isExpanded || window.scrollY > 0,
                            }"><i
                                class="bi bi-telephone me-2"></i>
                            +62 811-1954-17 | +62 81-1945-045</span>
                    </div>
                </a>
                <a href="">
                    <div class="mail d-flex align-items-center">
                        <span class=""
                            :class="{
                                'nav-link-on': !$store.navbar.isExpanded && window.scrollY === 0,
                                'nav-link-scroll': $store.navbar.isExpanded || window.scrollY > 0,
                            }">
                            <i class="bi bi-envelope me-2"></i>
                            cscgroup26@gmail.com</span>
                    </div>
                </a>
            </div>

            <div class="d-none d-lg-block mt-1":class="{ 'line' : !$store.navbar.isExpanded && window.scrollY===0, 'line-scroll' :
                $store.navbar.isExpanded || window.scrollY> 0,
                }">
            </div>

            <div class="mt-4 mt-lg-0">
                <ul class="navbar-nav ms-auto">
                    <li class="nav-item dropdown me-3">
                        <a class="nav-link dropdown-toggle" href="#" id="perusahaanDropdown" role="button">
                            <span class=""
                                :class="{
                                    'nav-link-on': !$store.navbar.isExpanded && window.scrollY === 0,
                                    'nav-link-scroll': $store.navbar.isExpanded || window.scrollY > 0,
                                }">
                                Perusahaan</span>
                        </a>
                        <ul class="dropdown-menu" aria-labelledby="perusahaanDropdown">
                            <li><a class="dropdown-item" href="{{ route('perusahaan.tentang') }}">Tentang</a></li>
                            <li><a class="dropdown-item" href="{{ route('perusahaan.direksi') }}">Anggota Direksi</a>
                            </li>
                            <li><a class="dropdown-item" href="{{ route('perusahaan.struktur_organisasi') }}">Struktur
                                    Organisasi</a></li>
                            <li><a class="dropdown-item" href="{{ route('perusahaan.tata-kelola') }}">Tata Kelola
                                    Perusahaan</a></li>
                        </ul>

                        <div class="nav-line"></div>
                    </li>
                    <li class="nav-item dropdown me-3">
                        <a class="nav-link dropdown-toggle" href="#" id="layananDropdown" role="button">
                            <span class=""
                                :class="{
                                    'nav-link-on': !$store.navbar.isExpanded && window.scrollY === 0,
                                    'nav-link-scroll': $store.navbar.isExpanded || window.scrollY > 0,
                                }">
                                Layanan</span>
                        </a>
                        <ul class="dropdown-menu" aria-labelledby="layananDropdown">
                            <li><a class="dropdown-item" href="{{ route('layanan.event_organizer') }}">Event
                                    Organizer</a></li>
                            <li><a class="dropdown-item" href="{{ route('layanan.ketahanan_pangan') }}">Ketahanan
                                    Pangan</a></li>
                            <li><a class="dropdown-item" href="{{ route('layanan.konstruksi') }}">Konstruksi</a></li>
                            {{-- <li><a class="dropdown-item" href="{{ route('layanan.acara_khusus') }}">Acara Khusus</a></li> --}}
                        </ul>
                        <div class="nav-line"></div>
                    </li>
                    <li class="nav-item me-3">
                        <a class="nav-link" href="{{ route('klien') }}">
                            <span class=""
                                :class="{
                                    'nav-link-on': !$store.navbar.isExpanded && window.scrollY === 0,
                                    'nav-link-scroll': $store.navbar.isExpanded || window.scrollY > 0,
                                }">
                                Klien</span>
                        </a>
                        <div class="nav-line"></div>
                    </li>
                    <li class="nav-item me-3"><a class="nav-link" href="{{ route('sejarah') }}">
                            <span class=""
                                :class="{
                                    'nav-link-on': !$store.navbar.isExpanded && window.scrollY === 0,
                                    'nav-link-scroll': $store.navbar.isExpanded || window.scrollY > 0,
                                }">
                                Sejarah</span>
                        </a>
                        <div class="nav-line"></div>
                    </li>
                    {{-- <li class="nav-item dropdown me-3">
                        <a class="nav-link dropdown-toggle" href="#" id="perusahaanDropdown" role="button">
                            <span class=""
                                :class="{
                                    'nav-link-on': !$store.navbar.isExpanded && window.scrollY === 0,
                                    'nav-link-scroll': $store.navbar.isExpanded || window.scrollY > 0,
                                }">
                                Investor</span>
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
                    </li> --}}
                    <li class="nav-item me-3"><a class="nav-link" href="{{ route('berita') }}">
                            <span class=""
                                :class="{
                                    'nav-link-on': !$store.navbar.isExpanded && window.scrollY === 0,
                                    'nav-link-scroll': $store.navbar.isExpanded || window.scrollY > 0,
                                }">
                                Berita</span>
                        </a>
                        <div class="nav-line"></div>
                    </li>
                    <li class="nav-item me-3"><a class="nav-link" href="{{ route('karier') }}"><span class=""
                                :class="{
                                    'nav-link-on': !$store.navbar.isExpanded && window.scrollY === 0,
                                    'nav-link-scroll': $store.navbar.isExpanded || window.scrollY > 0,
                                }">
                                Karir</span></a>
                        <div class="nav-line"></div>
                    </li>
                    <li class="nav-item me-3"><a class="nav-link" href="{{ route('csr') }}">
                            <span class=""
                                :class="{
                                    'nav-link-on': !$store.navbar.isExpanded && window.scrollY === 0,
                                    'nav-link-scroll': $store.navbar.isExpanded || window.scrollY > 0,
                                }">
                                CSR</span>
                        </a>
                        <div class="nav-line"></div>
                    </li>
                    <li class="nav-item me-3"><a class="nav-link" href="{{ route('hubungi') }}">
                            <span class=""
                                :class="{
                                    'nav-link-on': !$store.navbar.isExpanded && window.scrollY === 0,
                                    'nav-link-scroll': $store.navbar.isExpanded || window.scrollY > 0,
                                }">
                                Hubungi</span>
                        </a>
                        <div class="nav-line"></div>
                    </li>
                    <li class="nav-item me-3"><a class="nav-link" href="{{ route('galery') }}">
                            <span class=""
                                :class="{
                                    'nav-link-on': !$store.navbar.isExpanded && window.scrollY === 0,
                                    'nav-link-scroll': $store.navbar.isExpanded || window.scrollY > 0,
                                }">
                                Galeri</span>
                        </a>
                        <div class="nav-line"></div>
                    </li>
                    <li class="nav-item me-3 d-lg-none mt-4">
                        <a class="nav-link" href="#">
                            <span class=""
                                :class="{
                                    'nav-link-on': !$store.navbar.isExpanded && window.scrollY === 0,
                                    'nav-link-scroll': $store.navbar.isExpanded || window.scrollY > 0,
                                }"><i
                                    class="bi bi-telephone me-2"></i>
                                +62 811-1954-17 | +62 81-1945-045</span>
                        </a>
                        <div class="nav-line"></div>
                    </li>
                    <li class="nav-item me-3 d-lg-none">
                        <a class="nav-link" href="#">
                            <span class=""
                                :class="{
                                    'nav-link-on': !$store.navbar.isExpanded && window.scrollY === 0,
                                    'nav-link-scroll': $store.navbar.isExpanded || window.scrollY > 0,
                                }">
                                <i class="bi bi-envelope me-2"></i>
                                cscgroup26@gmail.com</span>
                        </a>
                        <div class="nav-line"></div>
                    </li>
                </ul>
            </div>
        </div>
    </div>
</nav>
