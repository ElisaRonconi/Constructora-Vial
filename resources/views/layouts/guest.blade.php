<!DOCTYPE html>
<html lang="es">
<head>
    <meta charset="UTF-8">
    <title>@yield('title', 'Constructora Vial')</title>
    @vite(['resources/css/app.css', 'resources/js/app.js'])
</head>
<body class="bg-gray-100 text-gray-800">

    <!-- Navbar -->
    <nav class="bg-yellow-500 text-white shadow fixed w-full top-0 left-0 z-50">
        <div class="max-w-7xl mx-auto px-4 py-3 flex justify-between items-center">
            <a href="{{ route('login') }}" class="flex items-center space-x-2">
                <img src="{{ asset('img/logo.png') }}" alt="Logo" class="w-8 h-8">
                <span class="font-bold text-lg">Constructora Vial</span>
            </a>
        </div>
    </nav>

    <!-- Contenido centrado debajo del navbar -->
    <div class="pt-24">
        @yield('content')
    </div>

</body>
</html>
