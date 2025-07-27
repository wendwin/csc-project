{{-- INI LAIYOUT UNTUK WEB PUSTAKAPEMDA, SELURUH HALAMAN AKAN DIRENDER DI CONTENT --}}
{{-- HANDLE BY ALDO OR FAISAL --}}

<!DOCTYPE html>
<html lang="id">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>{{ $title ?? 'Pustaka Pemda' }}</title>
    <link rel="stylesheet" href="{{ asset('lightbox2/css/lightbox.css') }}">
    <script defer src="https://cdn.jsdelivr.net/npm/alpinejs@3.x.x/dist/cdn.min.js"></script>
    @vite('resources/css/app.css')
    @vite(['resources/css/app.css', 'resources/js/app.js'])
</head>

<body class="bg-gray-100 min-h-screen flex flex-col">

    {{-- Navbar --}}
    @include('pustakapemda-components.navbar')

    {{-- Konten halaman --}}
    <main class="relative flex-grow"
        style="background-image: url('/img/pustakapemda/base_bg2.webp'); background-repeat: repeat; background-size: auto">
        <div class="absolute inset-0 bg-white/40 z-0"></div>

        <div class="relative text-white">
            @yield('content')
        </div>
    </main>

    <div id="floating-wpp"></div>

    {{-- Footer --}}
    @include('pustakapemda-components.footer')
    @stack('scripts')

    <script src="https://code.jquery.com/jquery-3.7.1.min.js" integrity="sha256-/JqT3SQfawRcv/BIHPThkBvs0OEvtFFmqPF/lYI/Cxo=" crossorigin="anonymous"></script>
    <script src="{{ asset('lightbox2/js/lightbox.js') }}"></script>
    <link rel="stylesheet" href="{{ asset('css/floating-wpp.min.css') }}">
    <script src="{{ asset('js/floating-wpp.min.js') }}"></script>
    <script>
    $(function() {
        $('#floating-wpp').floatingWhatsApp({
            phone: '{{ env('WHATSAPP_NUMBER_PUSTAKAPEMDA') }}',
            popupMessage: 'Hai, ada yang bisa kami bantu?',
            showPopup: true,
            position: 'right',
            headerTitle: 'Whatsapp Pustaka Pemda',
            size: 55
        });
    });
    // <style>
    //     [x-cloak] { display: none !important; }
    // </style>

</script>

</body>

</html>