{{-- HANDLE BY PUTRA --}}
<!DOCTYPE html>
<html lang="id">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>{{ $title ?? 'Dashboard' }}</title>

    {{-- global css & js --}}
    @vite(['resources/css/app.css', 'resources/js/app.js'])

    {{-- Alpine.js --}}
    <script src="//unpkg.com/alpinejs" defer></script>

    {{-- Trix Editor --}}
    <link rel="stylesheet" href="https://unpkg.com/trix@2.0.0/dist/trix.css">
    <script src="https://unpkg.com/trix@2.0.0/dist/trix.umd.min.js"></script>

    <style>
        [x-cloak] {
            display: none !important;
        }
    </style>
</head>

<body class="bg-[#F5F6FA] flex flex-col md:flex-row min-h-screen" x-data="{ sidebarOpen: true }">

    {{-- Sidebar --}}
    @include('admin-components.sidebar')

    <div class="flex-1 flex flex-col min-h-screen overflow-x-hidden">
        {{-- Navbar --}}
        @include('admin-components.navbar')

        {{-- Content --}}
        <main class="flex-1 mt-12 p-4 sm:p-6 w-full">
            @yield('content')
        </main>
    </div>

    @stack('scripts')

</body>

</html>
