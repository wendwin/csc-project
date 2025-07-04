<div class="max-w-6xl mx-auto p-6 my-5 bg-white shadow-md rounded-lg">
    <h1 class="text-[#2C437F] text-xl md:text-2xl font-bold">Solusi Cerdas untuk Tata Kelola Desa</h1>
    <p class="my-8 text-justify md:text-center text-sm md:text-base text-black">Kami hadir sebagai mitra strategis dalam
        pengembangan
        kapasitas aparatur
        desa dan kecamatan melalui
        bimtek dan
        studi banding yang relevan, inovatif, dan berkelanjutan. Dengan jaringan luas, dukungan tenaga profesional,
        serta kolaborasi lintas sektor, kami berkomitmen mendampingi desa menuju tata kelola yang lebih baik.</p>
    <div class="flex flex-wrap justify-center gap-5">
        @foreach ($cards as $card)
            <div
                class="bg-[#3660AF] text-white px-5 py-5 md:py-7 rounded-lg max-w-[200px] md:max-w-60 flex flex-col items-center group hover:bg-[#2C437F] transition duration-300 transform">
                <h5 class="text-center text-sm md:text-base font-bold group-hover:scale-105 transform transition-all"
                    style="min-height:70px;">
                    {{ $card['title'] }}
                </h5>
                <img src="{{ $card['img'] }}" alt="" class="w-16 h-16 my-7">
                <p class="text-justify text-xs md:text-sm group-hover:scale-105 transform transition-all">
                    {{ $card['text'] }}
                </p>
            </div>
        @endforeach
    </div>
</div>