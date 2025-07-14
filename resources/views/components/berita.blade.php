<link rel="stylesheet" href="{{ asset('css/berita_component.css') }}">

<div class="news">
    <div class="container" style="background-color:">
        <div class="line-bar-title mb-3"></div>
        <h4 class="mb-5 ">Berita Terbaru</h4>
        <div class="mb-lg-0 d-lg-flex justify-content-evenly align-items-center gap-3">
            @foreach ($berita_terbaru as $item)
                <a href="{{ route('detail_berita', $item['id_slug']) }}">
                    <div class="card p-3 mb-4">
                        <img src="{{ $item['main_image'] }}" class="card-img-top" alt="...">
                        <div class="card-body">
                            <div class="line-bar mb-2"></div>
                            <p class="date">{{ \Carbon\Carbon::parse($item['updated_at'])->translatedFormat('d F Y') }}</p>
                            <p class="title">{{ $item['title'] }}</p>
                            <p class="content">{{ Str::limit(strip_tags($item['content']), 150) }}</p>
                            <a href="{{ route('detail_berita', $item['id_slug']) }}" class="next">Selengkapnya...</a>
                        </div>
                    </div>
                </a>
            @endforeach
        </div>
        <div class="mt-6 pagination">
            {!! $berita_terbaru->links() !!}
        </div>
    </div>
</div>
