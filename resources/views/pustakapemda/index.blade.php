{{-- INI HALAMAN HOME PUSTAKA PEMDA SILAHKAN SESUIKAN. INGET!!! WAJIB CLINE CODE --}}
{{-- HANDEL BY ALDO OR FAISAL --}}
@extends('layouts.pustakapemdalayout')

@section('content')
    <div class="text-center">
        @include('pustakapemda-components.landingpage.hero')
        @include('pustakapemda-components.landingpage.tentang', ['extraClass' => 'shadow-md'])
        @include('pustakapemda-components.landingpage.tata-kelola')
        @include('pustakapemda-components.landingpage.berita')
        {{-- @include('pustakapemda-components.landingpage.galeri-pelatihan') --}}
        <div x-data="galeriPagination()" x-init="loadGaleri()" x-cloak>
            <div class="max-w-6xl mx-auto p-6 my-5 bg-white rounded-lg">
                <!-- Header -->
                <div x-show="loading" class="flex items-center gap-5 mb-4">
                    <h2 class="text-lg md:text-2xl text-[#2C437F] font-bold px-2">Galeri Pelatihan</h2>
                    <span class="h-[2px] flex-1 bg-[#EF0000] mt-2"></span>
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
@endsection

@push('scripts')
    <script>
        function beritaPagination() {
            return {
                loading: false,
                loadBerita(url = "{{ route('website2.home') }}") {
                    this.loading = true;
                    fetch(url, {
                            headers: {
                                'X-Requested-With': 'XMLHttpRequest'
                            }
                        })
                        .then(res => res.text())
                        .then(html => {
                            const container = document.querySelector('#berita-container');
                            if (container) {
                                container.innerHTML = html;
                                history.replaceState(null, '', '{{ route('website2.home') }}');
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
                loadWorkshop(url = "{{ route('website2.home') }}?section=workshop") {
                    this.loading = true;
                    fetch(url, {
                            headers: {
                                'X-Requested-With': 'XMLHttpRequest'
                            }
                        })
                        .then(res => res.text())
                        .then(html => {
                            const container = document.querySelector('#workshop-container');
                            if (container) {
                                container.innerHTML = html;
                                history.replaceState(null, '', '{{ route('website2.home') }}');
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
                loadBimtek(url = "{{ route('website2.home') }}?section=bimtek") {
                    this.loading = true;
                    fetch(url, {
                            headers: {
                                'X-Requested-With': 'XMLHttpRequest'
                            }
                        })
                        .then(res => res.text())
                        .then(html => {
                            const container = document.querySelector('#bimtek-container');
                            if (container) {
                                container.innerHTML = html;
                                history.replaceState(null, '', '{{ route('website2.home') }}');
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
                loadGaleri(url = "{{ route('website2.home') }}?section=galeri") {
                    this.loading = true;
                    fetch(url, {
                            headers: {
                                'X-Requested-With': 'XMLHttpRequest'
                            }
                        })
                        .then(res => res.text())
                        .then(html => {
                            const container = document.querySelector('#galeri-container');
                            if (container) {
                                container.innerHTML = html;
                                history.replaceState(null, '', '{{ route('website2.home') }}');
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
@endpush
