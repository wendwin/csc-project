/* <link rel="stylesheet" href="{{ asset('css/berita_component.css') }}">

<div class="news">
    <div class="container">
        <div class="line-bar-title mb-3"></div>
        <h4 class="mb-5">Berita Terbaru</h4>
        <div class="row g-4">
            @foreach ($berita_terbaru as $item)
                <div class="col-sm-6 col-lg-4 d-flex align-items-stretch">
                    <div class="card h-100 p-0 d-flex flex-column w-100">
                        <img src="{{ '/storage/'.$item['main_image'] }}" class="card-img-top" alt="{{ $item['title'] }}">
                        <div class="card-body d-flex flex-column">
                            <div class="line-bar mb-2"></div>
                            <p class="date mb-1">{{ \Carbon\Carbon::parse($item['updated_at'])->translatedFormat('d F Y') }}</p>
                            <p class="title fw-bold mb-2">{{ $item['title'] }}</p>
                            <p class="content flex-grow-1">{{ Str::limit(strip_tags($item['content']), 150) }}</p>
                            <a href="{{ route('detail_berita', $item['id_slug']) }}" class="text-decoration-none text-dark">
                                <span class="mt-3 next">Selengkapnya...</span>
                            </a>
                        </div>
                    </div>
                </div>
            @endforeach
        </div>
        <div class="mt-5 pagination">
            {!! $berita_terbaru->links() !!}
        </div>
    </div>
</div> */
