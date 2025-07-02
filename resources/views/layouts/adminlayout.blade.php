{{-- HANDLE BY PUTRA --}}

<!DOCTYPE html>
<html lang="id">
<head>
    <meta charset="UTF-8">
    <title>{{ $title ?? 'Dashboard Admin' }}</title>
    @vite('resources/css/app.css')
</head>
<body class="bg-gray-100 min-h-screen flex">

    {{-- Sidebar --}}
    @include('admin-components.sidebar')

    <div class="flex-1 flex flex-col">
        {{-- Navbar --}}
        @include('admin-components.navbar')

        {{-- Content utama --}}
        <main class="p-6 flex-1">
            @yield('content')
        </main>
    </div>

</body>
</html>
