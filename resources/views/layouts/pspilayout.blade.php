{{-- INI LAIYOUT UNTUK WEB PSPI, SELURUH HALAMAN AKAN DIRENDER DI CONTENT --}}
{{-- HANDLE BY ALDO OR FAISAL--}}

<!DOCTYPE html>
<html lang="id">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>{{ $title ?? 'Website PSPI' }}</title>
    <link rel="icon" type="image/png" href="{{ asset('/img/logo/sertifikasi.png') }}">
    <link rel="stylesheet" href="{{ asset('lightbox2/css/lightbox.css') }}">
    <script defer src="https://cdn.jsdelivr.net/npm/alpinejs@3.x.x/dist/cdn.min.js"></script>
    @vite('resources/css/app.css')
    @vite(['resources/css/app.css', 'resources/js/app.js'])
</head>

<body class="bg-white min-h-screen flex flex-col">

    {{-- Navbar khusus PSPI --}}
    @include('pspi-components.navbar')

    {{-- Konten halaman --}}
    <main class="relative flex-grow">
        @yield('content')
    </main>

    <div id="floating-wpp-pspi"></div>

    {{-- Footer, bisa di pindahkan ke component jika compleks --}}
    @include('pspi-components.footer')
    {{-- @stack('scripts') --}}

    <script src="https://code.jquery.com/jquery-3.7.1.min.js" integrity="sha256-/JqT3SQfawRcv/BIHPThkBvs0OEvtFFmqPF/lYI/Cxo=" crossorigin="anonymous"></script>
    <script src="{{ asset('lightbox2/js/lightbox.js') }}"></script>
    <link rel="stylesheet" href="{{ asset('css/floating-wpp.min.css') }}">
    <script src="{{ asset('js/floating-wpp.min.js') }}"></script>
    <script>
    $(function() {
        $('#floating-wpp-pspi').floatingWhatsApp({
            phone: '{{ env('WHATSAPP_NUMBER_PSPI') }}',
            popupMessage: 'Hai, ada yang bisa kami bantu?',
            showPopup: true,
            position: 'right',
            headerTitle: 'Whatsapp PSPI',
            size: 55
        });
    });
    </script>
    
</body>

</html>