{{--INI HALAMAN HOME PSPI SILAHKAN SESUIKAN. INGET!!! WAJIB CLINE CODE  --}}
{{-- HANDLE BY ALDO OR FAISAL--}}

@extends('layouts.pspilayout')

@section('content')
<div class="text-center" x-data="{ isOpen: false, showTopbar: true }" 
     x-init="
        let lastScroll = window.pageYOffset;
        window.addEventListener('scroll', () => {
            const currentScroll = window.pageYOffset;
            showTopbar = currentScroll === 0;
            lastScroll = currentScroll;
        });
     ">
    <div class="bg-white  transition-all duration-300 ease-linear"  :class="showTopbar ? 'md:mt-[105px] ' : 'md:mt-[115px]'">
        <div class="relative -mb-[100px] select-none pointer-events-none">
            <img src="/img/pspi/detail_berita.webp" alt="" class="w-full h-[250px] relative">
            <h1 class="absolute text-xl md:text-2xl text-white uppercase font-bold top-5 left-5 md:top-10 md:left-10">Profil Kami</h1>
        </div>
    </div>
    @include('pspi-components.landingpage.tentang')
    @include('pspi-components.profil.mengapa')
    @include('pspi-components.profil.visi_mitra')
    @include('pspi-components.profil.deskripsi')
</div>
@endsection
