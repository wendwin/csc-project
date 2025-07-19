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

<body class="min-h-screen bg-slate-50" x-data="{ sidebarOpen: true }">

    {{-- Sidebar --}}
    @include('admin-components.sidebar')

    <div x-cloak class="flex flex-col flex-1 min-h-screen transition-all duration-300"
    :class="sidebarOpen ? 'md:pl-64' : 'md:pl-20'">

        {{-- Navbar --}}
        @include('admin-components.navbar')

        {{-- Content --}}
        <main class="flex flex-col flex-1 w-full min-h-screen p-4 sm:p-6">
            @yield('content')
        </main>
    </div>

    @stack('scripts')

</body>

</html>
