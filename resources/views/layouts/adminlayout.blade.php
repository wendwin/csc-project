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
    {{-- alphine js --}}
    <script src="//unpkg.com/alpinejs" defer></script>
    <!-- Trix Editor CSS -->
    <link rel="stylesheet" type="text/css" href="https://unpkg.com/trix@2.0.0/dist/trix.css">
    <!-- Trix Editor JS -->
    <script type="text/javascript" src="https://unpkg.com/trix@2.0.0/dist/trix.umd.min.js"></script>

    <style>
        [x-cloak] {
            display: none !important;
        }
    </style>

</head>

<body class="bg-gray-100 flex" x-data="{ sidebarOpen: true }">

    {{-- Sidebar --}}
    @include('admin-components.sidebar')

    <div class="flex flex-col flex-1">
        {{-- Navbar --}}
        @include('admin-components.navbar')

        {{-- Content --}}
        <main class="p-6">
            @yield('content')
        </main>
    </div>


</body>

</html>
