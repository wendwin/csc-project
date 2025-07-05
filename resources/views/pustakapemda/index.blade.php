{{--INI HALAMAN HOME PUSTAKA PEMDA SILAHKAN SESUIKAN. INGET!!! WAJIB CLINE CODE --}}
{{-- HANDEL BY ALDO OR FAISAL --}}
@extends('layouts.pustakapemdalayout')

@section('content')
    <div class="text-center">
        @include('pustakapemda-components.hero')
        @include('pustakapemda-components.tentang')
        @include('pustakapemda-components.tata-kelola')
    </div>
@endsection