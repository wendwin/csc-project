{{--INI HALAMAN HOME PUSTAKA PEMDA SILAHKAN SESUIKAN. INGET!!! WAJIB CLINE CODE --}}
{{-- HANDEL BY ALDO OR FAISAL --}}
@extends('layouts.pspilayout')

@section('content')
    <div class="text-center">
        <div class="bg-white">
            <div class="relative -mb-[60px] select-none pointer-events-none">
                <img src="/img/pspi/detail_berita.webp" alt="" class="w-full h-[250px] relative">
                <h1 class="absolute text-xl md:text-2xl text-white uppercase font-bold top-5 left-5 md:top-10 md:left-10">Kontak Kami</h1>
            </div>
            <div class="max-w-[1400px] ml-auto pl-3">
                <div class="flex flex-row justify-end items-center">
                    <h2 class="text-lg md:text-xl text-white bg-[#002789] py-1  font-bold mb-4 px-2">Hubungi Kami</h2>
                    <span class="h-[2px] flex-1 bg-[#FFD900] -mt-2"></span>
                </div>
            </div>
            <div class="py-5 md:py-10 my-10 rounded-b-[15px] md:rounded-b-[30px] mb-20"
                style="background-image: url('/img/pspi/backdrop_pspi2.webp'); background-repeat: repeat; background-size: auto">
                <div class="max-w-7xl mx-auto bg-white p-5 rounded-lg my-5 md:my-10y shadow">
                    <div class="flex flex-col md:flex-row justify-between items-center text-black text-start gap-5 md:gap-0  group">
                        <div class="flex flex-col items-start justify-start gap-5 md:pr-5">
                            <div class="flex flex-row gap-5 items-center mx-auto md:mx-0 mb-5">
                                <img src="/img/logo/sertifikasi.png" alt="" class="max-w-10">
                                <h6 class="font-bold text-xl ">Hubungi Kami Sekarang</h6>
                            </div>
                            <div class="flex flex-row gap-5">
                                <h6 class="min-w-20 font-semibold">Alamat: </h6>
                                <p>Jl. Sidomukti No.30, Kelurahan Kadipaten,
                                Kecamatan Kraton, Kota Yogyakarta, DIY (55132)</p>
                            </div>
                            <div class="flex flex-row gap-5">
                                <h6 class="min-w-20 font-semibold">Telepon: </h6>
                                <p>0857-2976-2708</p>
                            </div>
                            <div class="flex flex-row gap-5">
                                <h6 class="min-w-20 font-semibold">Email: </h6>
                                <p>pspindonesia2025@gmail.com</p>
                            </div>
                            <div class="flex flex-row gap-1 mt-3 md:mt-5 md:w-[250px]">
                                <a href="#">
                                    <i data-lucide="facebook" class="w-8 h-8 p-1 rounded-xl bg-[#074DFF] text-white hover:bg-white hover:text-[#074DFF] tranform transition-all flex items-center justify-center"></i>
                                </a>
                                <a href="#">
                                    <i data-lucide="instagram" class="w-8 h-8 p-1 rounded-xl bg-[#074DFF] text-white hover:bg-white hover:text-[#074DFF] tranform transition-all flex items-center justify-center"></i>
                                </a>
                                <a href="#">
                                    <i data-lucide="linkedin" class="w-8 h-8 p-2 rounded-xl bg-[#074DFF] text-white hover:bg-white hover:text-[#074DFF] tranform transition-all flex items-center justify-center"></i>
                                </a>
                            </div>
                        </div>
                        <div class="overflow-hidden rounded-lg">
                            <img src="/img/tentang1.png" alt="" loading="lazy" class=" object-contain md:max-w-full group-hover:scale-105 transform transition-all">
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection