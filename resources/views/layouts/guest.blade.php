<!DOCTYPE html>
<html lang="id">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>{{ $title ?? 'Login Admin' }}</title>
    @vite('resources/css/app.css')
    <script src="https://unpkg.com/lucide@latest"></script>
    <script src="//unpkg.com/alpinejs" defer></script>
</head>
<body class="relative bg-[#4880FF] min-h-screen flex items-center justify-center overflow-hidden">

  {{-- Sudut Gambar --}}
  <img src="{{ asset('img/logindashboard/stylebg/1.png') }}" class="absolute top-0 left-0 max-w-[600px] h-auto z-0" alt="Sudut Kiri Atas">
  <img src="{{ asset('img/logindashboard/stylebg/2.png') }}" class="absolute top-0 right-0 max-w-[600px] h-auto z-0" alt="Sudut Kanan Atas">
  <img src="{{ asset('img/logindashboard/stylebg/3.png') }}" class="absolute bottom-0 left-0  max-w-[400px] h-auto z-0" alt="Sudut Kiri Bawah">
  <img src="{{ asset('img/logindashboard/stylebg/4.png') }}" class="absolute bottom-0 right-0 max-w-[200px] h-auto z-0" alt="Sudut Kanan Bawah">

  {{-- Lapisan biru transparan di atas gambar --}}
  <div class="absolute inset-0 bg-blue-500/20 z-10"></div>


    {{-- Konten Utama --}}
    <main class="relative z-10 w-full max-w-md">
        @yield('content')
    </main>
</body>
</html>
