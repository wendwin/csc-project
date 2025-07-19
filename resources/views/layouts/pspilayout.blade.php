{{-- INI LAIYOUT UNTUK WEB PSPI, SELURUH HALAMAN AKAN DIRENDER DI CONTENT --}}
{{-- HANDLE BY ALDO OR FAISAL--}}

<!DOCTYPE html>
<html lang="id">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>{{ $title ?? 'Website PSPI' }}</title>
    @vite('resources/css/app.css')
    <script defer src="https://cdn.jsdelivr.net/npm/alpinejs@3.x.x/dist/cdn.min.js"></script>
    @vite(['resources/css/app.css', 'resources/js/app.js'])
</head>

<body class="bg-gray-300 min-h-screen flex flex-col">

    {{-- Navbar khusus PSPI --}}
    @include('pspi-components.navbar')

    {{-- Konten halaman --}}
    <main class="relative flex-grow">
        @yield('content')
    </main>

    {{-- Footer, bisa di pindahkan ke component jika compleks --}}
    <footer class="text-center py-4 text-sm text-gray-500">
        &copy; {{ date('Y') }} Pusat Sertifikasi Profesi Indonesia.
    </footer>

</body>

</html>