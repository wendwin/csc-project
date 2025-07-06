{{--INI HALAMAN HOME PUSTAKA PEMDA SILAHKAN SESUIKAN. INGET!!! WAJIB CLINE CODE --}}
{{-- HANDEL BY ALDO OR FAISAL --}}
@extends('layouts.pustakapemdalayout')

@section('content')
    <div class="text-center">
        <h1 class="text-2xl md:text-4xl text-[#2C437F] uppercase font-bold mt-10 md:mt-20">kontak</h1>
        <div class="max-w-7xl mx-auto bg-white p-5 rounded-lg my-5 md:my-10y shadow">
            <div class="flex flex-col md:flex-row justify-between items-center text-black text-start gap-5 md:gap-0  group">
                <div class="flex flex-col items-start justify-start gap-5 md:pr-5">
                    <h6 class="font-bold text-xl mx-auto md:mx-0 mb-5">Hubungi Kami Sekarang</h6>
                    <div class="">
                        <h6 class="font-bold">HP dan Whatsapp</h6>
                        <p>0822-2122-2177</p>
                    </div>
                    <div class="">
                        <h6 class="font-bold">Alamat</h6>
                        <p>Office : Jl. Sidomukti No 30, Kel. Kadipaten, Kec.Keraton, Kota Yogyakarta, Daerah Istimewa Yogyakarta (55132)</p>
                    </div>
                    <div class="">
                        <h6 class="font-bold">Email</h6>
                        <p>pustakapemda@gmail.com</p>
                    </div>
                    <div class="flex flex-row gap-1 mt-3 md:mt-0 md:w-[250px]">
                        <a href="#">
                            <i data-lucide="facebook" class="w-8 h-8 p-1 rounded-xl bg-[#BB271A] text-white hover:bg-white hover:text-[#BB271A] tranform transition-all flex items-center justify-center"></i>
                        </a>
                        <a href="#">
                            <i data-lucide="instagram" class="w-8 h-8 p-1 rounded-xl bg-[#BB271A] text-white hover:bg-white hover:text-[#BB271A] tranform transition-all flex items-center justify-center"></i>
                        </a>
                        <a href="#">
                            <i data-lucide="linkedin" class="w-8 h-8 p-2 rounded-xl bg-[#BB271A] text-white hover:bg-white hover:text-[#BB271A] tranform transition-all flex items-center justify-center"></i>
                        </a>
                    </div>
                </div>
                <div class="overflow-hidden rounded-lg">
                    <img src="/img/tentang1.png" alt="" loading="lazy" class=" object-contain md:max-w-full group-hover:scale-105 transform transition-all">
                </div>
            </div>
        </div>
    </div>
@endsection