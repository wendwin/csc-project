{{-- LOGIN  PERSONAL LAYOUT --}}
{{-- HANDLE BY PUTRA --}}

<!DOCTYPE html>
<html lang="id">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>{{ $title ?? 'Login Admin' }}</title>
    @vite('resources/css/app.css')
    <script src="https://unpkg.com/lucide@latest"></script>

</head>
<body class="bg-gradient-to-br from-blue-100 to-white min-h-screen flex items-center justify-center">
    <main class="w-full max-w-md p-6">
        @yield('content')
    </main>
</body>
</html>
