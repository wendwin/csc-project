{{-- INI LAIYOUT UNTUK WEB PSPI, SELURUH HALAMAN AKAN DIRENDER DI CONTENT --}}
{{-- HANDLE BY ALDO OR FAISAL--}}

<!DOCTYPE html>
<html lang="id">

<head>
    <meta charset="UTF-8">
    <title>{{ $title ?? 'Website PSPI' }}</title>
    @vite('resources/css/app.css')
</head>

<body class="bg-gray-100 min-h-screen flex flex-col">

    {{-- Navbar khusus PSPI --}}
    @include('pspi-components.navbar')

    {{-- Konten halaman --}}
    <main class="flex-1 container mx-auto px-4 py-8">
        @yield('content')
    </main>

    {{-- Footer, bisa di pindahkan ke component jika compleks --}}
    <footer class="text-center py-4 text-sm text-gray-500">
        &copy; {{ date('Y') }} Pusat Sertifikasi Profesi Indonesia.
    </footer>

</body>

</html>