{{-- INI LAIYOUT UNTUK WEB PUSTAKAPEMDA, SELURUH HALAMAN AKAN DIRENDER DI CONTENT --}}
{{-- HANDLE BY ALDO OR FAISAL--}}

<!DOCTYPE html>
<html lang="id">

<head>
    <meta charset="UTF-8">
    <title>{{ $title ?? 'Pustaka Pemda' }}</title>
    @vite('resources/css/app.css')
</head>

<body class="bg-gray-100 min-h-screen flex flex-col">

    {{-- Navbar --}}
    @include('pustakapemda-components.navbar')

    {{-- Konten halaman --}}
    <main class="flex-1 container mx-auto p-6">
        @yield('content')
    </main>

    {{-- Footer, bisa di pindahkan ke component jika compleks --}}
    <footer class="text-center p-4 text-sm text-gray-500">
        &copy; {{ date('Y') }} Pustaka Pemda. All rights reserved.
    </footer>

</body>

</html>