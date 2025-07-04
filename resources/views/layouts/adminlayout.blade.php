{{-- HANDLE BY PUTRA --}}
<!DOCTYPE html>
<html lang="id">
<head>
    <meta charset="UTF-8">
    <title>{{ $title ?? 'Dashboard' }}</title>
    @vite(['resources/css/app.css', 'resources/js/app.js'])
    <script src="//unpkg.com/alpinejs" defer></script>
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
