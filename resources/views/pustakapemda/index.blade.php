{{--INI HALAMAN HOME PUSTAKA PEMDA SILAHKAN SESUIKAN. INGET!!! WAJIB CLINE CODE --}}
{{-- HANDEL BY ALDO OR FAISAL --}}
@extends('layouts.pustakapemdalayout')

@section('content')
    <div class="text-center">
        @include('pustakapemda-components.landingpage.hero')
        @include('pustakapemda-components.landingpage.tentang')
        @include('pustakapemda-components.landingpage.tata-kelola')
        @include('pustakapemda-components.landingpage.berita')
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
                            this.loading = false;
                        });
                },
            };

        }

        document.addEventListener('alpine:init', () => {
            Alpine.data('beritaPagination', beritaPagination);
        });
    </script>
    </script>
@endpush
