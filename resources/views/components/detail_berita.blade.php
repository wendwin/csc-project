<x-layout :css="'detail_berita.css'">
    <div class="description-page">
    </div>
    <div class="detail-berita-section p-3 p-lg-5 ">
        <div class="detail-berita-text-section">
            <div class="p-3">
                <h1 class="text-dark fs-4 fs-md-3 fw-semibold">{{ $berita->title }}</h1>

                <div class="my-2 my-md-4 d-flex flex-row justify-content-start gap-2 text-muted small">
                    <p class="mb-0">{{ $berita->author }}</p>
                    <span>|</span>
                    <p class="mb-0">{{ $berita->created_at }}</p>
                </div>

                <div class="d-flex justify-content-center mb-4">
                    <img src="{{ $berita->main_image }}" alt="" class="img-fluid rounded">
                </div>

                 <div class="text-black text-justify py-3 fs-6 fs-md-5">{!! $berita->content !!}</div>

                <div class="d-flex flex-column align-items-center gap-3">
                    @foreach($gambars as $gambar)
                        <img src="/img/{{ $gambar->image_path }}" alt="Gambar artikel"
                            class="img-fluid rounded object-fit-cover mb-3"/>
                    @endforeach
                </div>
            </div>
        </div>
    </div>
    @include('components.berita')
</x-layout>
