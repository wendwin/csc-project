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
    <main class="relative flex-1"
        style="background-image: url('/img/pustakapemda/background.png'); background-repeat: repeat; background-size: cover;">
        <div class="absolute inset-0 bg-black/5 z-0"></div>

        <div class="relative z-10 text-white">
            @yield('content')
        </div>
    </main>

    {{-- Footer, bisa di pindahkan ke component jika compleks --}}
    @include('pustakapemda-components.footer')
</body>

</html>