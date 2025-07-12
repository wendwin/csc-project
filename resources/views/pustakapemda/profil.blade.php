{{--INI HALAMAN HOME PUSTAKA PEMDA SILAHKAN SESUIKAN. INGET!!! WAJIB CLINE CODE --}}
{{-- HANDEL BY ALDO OR FAISAL --}}
@extends('layouts.pustakapemdalayout')

@section('content')
    <div class="text-center">
        <h1 class="text-2xl md:text-4xl text-[#2C437F] uppercase font-bold mt-10 md:mt-20">profil kami</h1>
        <div class="w-full bg-white py-5 mt-[10px] md:mt-[50px]">
            @include('pustakapemda-components.landingpage.tentang')
            @include('pustakapemda-components.profil.mengapa')
            @include('pustakapemda-components.profil.visi_misi')
            @include('pustakapemda-components.profil.dipercaya')
            @include('pustakapemda-components.profil.mitra')
            @include('pustakapemda-components.profil.deskripsi')

        </div>
    </div>
@endsection