{{--INI HALAMAN HOME PSPI SILAHKAN SESUIKAN. INGET!!! WAJIB CLINE CODE  --}}
{{-- HANDLE BY ALDO OR FAISAL--}}

@extends('layouts.pspilayout')

@section('content')
<div class="text-center">
    <div class="bg-white">
        @include('pspi-components.landingpage.hero')
        @include('pspi-components.landingpage.tentang')
        <div class="pb-5">
            <span class="flex items-center">
                <span class="h-[2px] flex-1 bg-[#FFD900]"></span>
                
                <span class="bg-[#002789] p-2 text-lg md:text-xl font-bold text-white ">Transformasi Kinerja Pemerintahan Dimulai di Sini</span>
                
                <span class="h-[2px] flex-1 bg-[#FFD900]"></span>
            </span>
        </div>
        <div class="py-5 md:py-10 rounded-b-[30px] mb-10"
        style="background-image: url('/img/pspi/backdrop_pspi2.webp'); background-repeat: repeat; background-size: auto">
            @include('pspi-components.landingpage.keunggulan')
            @include('pspi-components.landingpage.berita')
            {{-- @include('pustakapemda-components.landingpage.galeri-pelatihan') --}}
            <div x-data="galeriPagination()" x-init="loadGaleri()" x-cloak>
                <div class="max-w-6xl mx-auto p-6 my-5 bg-white rounded-lg">
                    <!-- Header -->
                    <div x-show="loading" class="flex items-center gap-5 mb-4">
                        <h2 class="text-lg md:text-xl text-white bg-[#002789] py-1 font-bold px-2">Galeri Pelatihan</h2>
                        <span class="h-[2px] flex-1 bg-[#FFD900] mt-2"></span>
                    </div>

                    <!-- Skeleton saat loading -->
                    <div x-show="loading" class="grid grid-cols-1 md:grid-cols-3 lg:grid-cols-4 gap-5 animate-pulse" x-cloak>
                        <template x-for="i in 8" :key="i">
                            <div class="rounded-lg bg-white">
                                <div class="w-full h-[200px] bg-gray-200 rounded mb-3"></div>
                                <div class="space-y-2 p-2">
                                    <div class="h-4 bg-gray-300 rounded w-3/4"></div>
                                    <div class="flex gap-2">
                                        <div class="h-3 bg-gray-300 rounded w-1/2"></div>
                                        <div class="h-3 bg-gray-300 rounded w-1/4"></div>
                                    </div>
                                    <div class="h-3 bg-gray-300 rounded w-full"></div>
                                    <div class="h-3 bg-gray-300 rounded w-5/6"></div>
                                </div>
                            </div>
                        </template>
                    </div>

                    <!-- Container isi galeri -->
                    <div id="galeri-container"  x-show="!loading" x-cloak></div>
                </div>
            </div>
        </div>
    </div>
</div>

    <script>
        function beritaPagination() {
            return {
                loading: false,
                loadBerita(url = "{{ route('website3.home') }}") {
                    this.loading = true;
                    fetch(url + (url.includes('?') ? '&' : '?') + 'pagination=true', {
                            headers: {
                                'X-Requested-With': 'XMLHttpRequest'
                            }
                        })
                        .then(res => res.text())
                        .then(html => {
                            const container = document.querySelector('#berita-container');
                            if (container) {
                                container.innerHTML = html;
                                history.replaceState(null, '', '{{ route('website3.home') }}');
                                container.querySelectorAll('.pagination a').forEach(link => {
                                    link.addEventListener('click', (e) => {
                                        e.preventDefault();
                                        const url = link.getAttribute('href');
                                        this.loadBerita(url);
                                    });
                                });
                            }
                        })
                        .finally(() => {
                            setTimeout(() => {
                                this.loading = false;
                            }, 300);
                        });

                },
            };
        }
        document.addEventListener('alpine:init', () => {
            Alpine.data('beritaPagination', beritaPagination);
        });

        function workshopPagination() {
            return {
                loading: false,
                loadWorkshop(url = "{{ route('website3.home') }}?section=workshop") {
                    this.loading = true;
                    fetch(url + (url.includes('?') ? '&' : '?') + 'pagination=true',  {
                            headers: {
                                'X-Requested-With': 'XMLHttpRequest'
                            }
                        })
                        .then(res => res.text())
                        .then(html => {
                            const container = document.querySelector('#workshop-container');
                            if (container) {
                                container.innerHTML = html;
                                history.replaceState(null, '', '{{ route('website3.home') }}');
                                container.querySelectorAll('.pagination a').forEach(link => {
                                    link.addEventListener('click', (e) => {
                                        e.preventDefault();
                                        const linkUrl = link.getAttribute('href');
                                        this.loadWorkshop(linkUrl + '&section=workshop');
                                    });
                                });
                            }
                        })
                        .finally(() => {
                            setTimeout(() => {
                                this.loading = false;
                            }, 300);
                        });
                },
            };
        }


        document.addEventListener('alpine:init', () => {
            Alpine.data('workshopPagination', workshopPagination);
        });

        function bimtekPagination() {
            return {
                loading: false,
                loadBimtek(url = "{{ route('website3.home') }}?section=bimtek") {
                    this.loading = true;
                    fetch(url + (url.includes('?') ? '&' : '?') + 'pagination=true',  {
                            headers: {
                                'X-Requested-With': 'XMLHttpRequest'
                            }
                        })
                        .then(res => res.text())
                        .then(html => {
                            const container = document.querySelector('#bimtek-container');
                            if (container) {
                                container.innerHTML = html;
                                history.replaceState(null, '', '{{ route('website3.home') }}');
                                container.querySelectorAll('.pagination a').forEach(link => {
                                    link.addEventListener('click', (e) => {
                                        e.preventDefault();
                                        const linkUrl = link.getAttribute('href');
                                        this.loadBimtek(linkUrl + '&section=bimtek');
                                    });
                                });
                            }
                        })
                        .finally(() => {
                            setTimeout(() => {
                                this.loading = false;
                            }, 300);
                        });
                },
            };
        }

        document.addEventListener('alpine:init', () => {
            Alpine.data('bimtekPagination', bimtekPagination);
        });

        function galeriPagination() {
            return {
                loading: false,
                loadGaleri(url = "{{ route('website3.home') }}?section=galeri") {
                    this.loading = true;
                    fetch(url + (url.includes('?') ? '&' : '?') + 'pagination=true',  {
                            headers: {
                                'X-Requested-With': 'XMLHttpRequest'
                            }
                        })
                        .then(res => res.text())
                        .then(html => {
                            const container = document.querySelector('#galeri-container');
                            if (container) {
                                container.innerHTML = html;
                                history.replaceState(null, '', '{{ route('website3.home') }}');
                                container.querySelectorAll('.pagination a').forEach(link => {
                                    link.addEventListener('click', (e) => {
                                        e.preventDefault();
                                        const linkUrl = link.getAttribute('href');
                                        this.loadGaleri(linkUrl + '&section=galeri');
                                    });
                                });
                            }
                        })
                        .finally(() => {
                            setTimeout(() => {
                                this.loading = false;
                            }, 300);
                        });
                },
            };
        }
        document.addEventListener('alpine:init', () => {
            Alpine.data('galeriPagination', galeriPagination);
        });
    </script>
@endsection
