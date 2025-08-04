<x-layout :css="'detail_berita.css'">
    <div class="description-page"></div>

    <section class="">
        <div class=" detail-berita-section py-5">
            <div class="detail-berita-text-section px-4 ">

                <h1 class="text-dark fs-4 fs-md-3 fw-semibold text-center">{{ $berita->title }}</h1>

                <div class="my-2 my-md-4 d-flex flex-wrap align-items-center justify-content-center gap-2 text-muted small">
                    <span class="text-capitalize">{{ $berita->author }}</span>
                    <span>|</span>
                    <span>{{ \Carbon\Carbon::parse($berita->created_at)->translatedFormat('d F Y') }}</span>
                </div>

                @if($berita->main_image)
                    <div class="d-flex justify-content-center mb-4">
                        <img src="{{ '/storage/'.$berita->main_image }}" alt="{{ $berita->title }}"
                             class="img-fluid rounded">
                    </div>
                @endif

                <div class="text-black py-3 fs-6 fs-md-5" style="text-align: justify;">
                    {!! $berita->content !!}
                </div>

                @if($gambars->isNotEmpty())
                    <div class="d-flex flex-wrap justify-content-center align-items-center gap-3 mt-4">
                        @foreach($gambars as $gambar)
                            <img src="{{ '/storage/'.$gambar->image_path }}" alt="Gambar artikel"
                                 class="img-fluid rounded object-fit-cover mb-3" />
                        @endforeach
                    </div>
                @endif

            </div>
        </div>
    </section>

    @include('components.berita')
</x-layout>
