{{-- INI LAIYOUT UNTUK WEB PUSTAKAPEMDA, SELURUH HALAMAN AKAN DIRENDER DI CONTENT --}}
{{-- HANDLE BY ALDO OR FAISAL--}}

<!DOCTYPE html>
<html lang="id">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>{{ $title ?? 'Pustaka Pemda' }}</title>
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

        <div class="relative z-10 text-white">
            @yield('content')
        </div>
    </main>

    {{-- Footer, bisa di pindahkan ke component jika compleks --}}
    @include('pustakapemda-components.footer')
    @stack('scripts')
</body>

</html>