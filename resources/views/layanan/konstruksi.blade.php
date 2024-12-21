<x-layout :css="'layanan/konstruksi.css'">

    <div class="description-page">
        <h5>Layanan</h5>
        <h4>Kontruksi</h4>
    </div>
    <div class="layanan-lainnya-section d-flex flex-wrap justify-content-center gap-3 gap-lg-0 p-2 p-lg-5">
        <a href="{{ route('layanan.event_organizer') }}">
            <div class="layanan-card position-relative">
                <img src="/img/layanan/event-organizer.jpg" class="card-img-top" alt="...">
                <div class="card-body position-absolute ">
                    <div class="line-bar mb-2"></div>
                    <p class="fs-3 fw-bold">Event Organizer</p>
                    <a href="{{ route('layanan.event_organizer') }}" class="">Lebih lanjut...</a>
                </div>
            </div>
        </a>
        <div class="mx-lg-5 "></div>
        <a href="{{ route('layanan.ketahanan_pangan') }}">
            <div class="layanan-card position-relative">
                <img src="/img/layanan/sawah.jpg" class="card-img-top" alt="...">
                <div class="card-body position-absolute ">
                    <div class="line-bar mb-2"></div>
                    <p class="fs-3 fw-bold">Ketahanan Pangan</p>
                    <a href="{{ route('layanan.ketahanan_pangan') }}" class="">Lebih lanjut...</a>
                </div>
            </div>
        </a>
    </div>
</x-layout>
