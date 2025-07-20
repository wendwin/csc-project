{{--INI HALAMAN HOME PSPI SILAHKAN SESUIKAN. INGET!!! WAJIB CLINE CODE  --}}
{{-- HANDLE BY ALDO OR FAISAL--}}

@extends('layouts.pspilayout')

@section('content')
<div class="text-center">
    <div class="bg-white">
        @include('pspi-components.landingpage.hero')
        @include('pspi-components.landingpage.tentang')
        <div class="pb-5">
            <span class="flex items-center">
                <span class="h-[2px] flex-1 bg-[#FFD900]"></span>
                
                <span class="bg-[#002789] p-2 text-lg md:text-xl font-bold text-white ">Transformasi Kinerja Pemerintahan Dimulai di Sini</span>
                
                <span class="h-[2px] flex-1 bg-[#FFD900]"></span>
            </span>
        </div>
    </div>
</div>
@endsection
