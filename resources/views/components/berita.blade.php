<link rel="stylesheet" href="{{ asset('css/berita_component.css') }}">

<div class="news">
    <div class="container">
        <div class="line-bar-title mb-3"></div>
        <h4 class="mb-5">Berita Terbaru</h4>

        <div id="berita-container">
            @include('components.berita_list', ['berita_terbaru' => $berita_terbaru])
        </div>
    </div>
</div>


@push('scripts')
    <script>
        $(document).on('click', '.pagination a', function(e) {
            e.preventDefault();
            const url = $(this).attr('href');

            // Ubah URL tanpa reload
            window.history.pushState({}, '', url);

            // Tampilkan skeleton loader
            $('#berita-container').html(generateSkeleton(6));

            // Ambil data lewat AJAX
            $.get(url, function(data) {
                $('#berita-container').html(data);
            }).fail(function() {
                $('#berita-container').html('<p class="text-danger text-center">Gagal memuat data.</p>');
            });
        });

        // Fungsi untuk buat skeleton loader
        function generateSkeleton(count) {
            let html = '<div class="row g-4">';
            for (let i = 0; i < count; i++) {
                html += `
                <div class="col-sm-6 col-lg-4">
                    <div class="card h-100 p-0 placeholder-glow">
                        <div class="card-img-top placeholder" style="height: 200px;"></div>
                        <div class="card-body">
                            <p class="placeholder col-6"></p>
                            <p class="placeholder col-8"></p>
                            <p class="placeholder col-12"></p>
                            <p class="placeholder col-4"></p>
                        </div>
                    </div>
                </div>`;
            }
            html += '</div>';
            return html;
        }

        // Tangani back/forward browser
        window.onpopstate = function() {
            const url = window.location.href;
            $('#berita-container').html(generateSkeleton(6));
            $.get(url, function(data) {
                $('#berita-container').html(data);
            });
        };
    </script>
@endpush


<style>
.placeholder {
    background-color: #e0e0e0 !important;
}

.placeholder-glow .placeholder {
    animation: placeholder-glow 1.5s infinite;
}

@keyframes placeholder-glow {
    0% {
        background-color: #e0e0e0;
    }

    50% {
        background-color: #f5f5f5;
    }

    100% {
        background-color: #e0e0e0;
    }
}

</style>