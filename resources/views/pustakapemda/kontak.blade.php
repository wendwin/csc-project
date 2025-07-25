{{-- INI HALAMAN HOME PUSTAKA PEMDA SILAHKAN SESUIKAN. INGET!!! WAJIB CLINE CODE --}}
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
                        <p>Office : Jl. Sidomukti No 30, Kel. Kadipaten, Kec.Keraton, Kota Yogyakarta, Daerah Istimewa
                            Yogyakarta (55132)</p>
                    </div>
                    <div class="">
                        <h6 class="font-bold">Email</h6>
                        <p>pustakapemda@gmail.com</p>
                    </div>
                    <div class="flex flex-row gap-1 mt-3 md:mt-0 md:w-[250px]">
                        <a href="#">
                            <i data-lucide="facebook"
                                class="w-8 h-8 p-1 rounded-xl bg-[#BB271A] text-white hover:bg-white hover:text-[#BB271A] tranform transition-all flex items-center justify-center"></i>
                        </a>
                        <a href="#">
                            <i data-lucide="instagram"
                                class="w-8 h-8 p-1 rounded-xl bg-[#BB271A] text-white hover:bg-white hover:text-[#BB271A] tranform transition-all flex items-center justify-center"></i>
                        </a>
                        <a href="#">
                            <i data-lucide="linkedin"
                                class="w-8 h-8 p-2 rounded-xl bg-[#BB271A] text-white hover:bg-white hover:text-[#BB271A] tranform transition-all flex items-center justify-center"></i>
                        </a>
                    </div>
                </div>
                <div class="w-full mt-5 md:mt-0 flex justify-end">
                    <iframe
                        src="https://www.google.com/maps/embed?pb=!1m18!1m12!1m3!1d247.05247688938937!2d110.36102033466555!3d-7.806796034091653!2m3!1f0!2f0!3f0!3m2!1i1024!2i768!4f13.1!3m3!1m2!1s0x2e7a5791fd206501%3A0xd1b9d44af39d9e21!2sJl.%20Sidomukti%20No.30!5e0!3m2!1sen!2sid!4v1753451268940!5m2!1sen!2sid"
                        class="w-full max-w-[600px] h-[300px] md:h-[400px]" style="border:0;" allowfullscreen=""
                        loading="lazy" referrerpolicy="no-referrer-when-downgrade">
                    </iframe>
                </div>
            </div>
        </div>
    </div>
@endsection
