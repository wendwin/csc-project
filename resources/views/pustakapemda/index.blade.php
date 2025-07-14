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
        <div x-data="galeriPagination()" x-init="loadGaleri()" x-ref="galeriRoot">
            <div id="galeri-container"></div>
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
                            }, 300); // delay 500ms sebelum loading false
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
                            this.loading = false;
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
                            this.loading = false;
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
                            this.loading = false;
                        });
                },
            };
        }
        document.addEventListener('alpine:init', () => {
            Alpine.data('galeriPagination', galeriPagination);
        });
    </script>
@endpush
