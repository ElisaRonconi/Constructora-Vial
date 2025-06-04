<!DOCTYPE html> 
<html lang="es">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>@yield('title', 'Constructora Vial')</title>
    @vite(['resources/css/app.css', 'resources/js/app.js'])
    <!-- Leaflet CSS -->
<link rel="stylesheet"
      href="https://unpkg.com/leaflet@1.9.4/dist/leaflet.css"
      integrity="sha384-sA+e6CUXU93gwdWuyZthTME8npR6EblDv6h7d0hMPvDWDFxRMeEdPOjtVt8cYN3B"
      crossorigin=""/>


</head>
<body class="bg-gray-100 text-gray-800">

    {{-- NAVBAR FIJO SUPERIOR --}}
   <nav class="bg-yellow-500 text-white fixed top-0 left-0 right-0 z-50 shadow">
    <div class="max-w-7xl mx-auto px-6 py-4 flex justify-between items-center">

        {{-- LOGO + NOMBRE --}}
        <a href="{{ route('dashboard') }}" class="flex items-center space-x-3 hover:opacity-90">
            <img src="{{ asset('img/logo.png') }}" alt="Logo" class="w-8 h-8 rounded-full shadow-md">
            <span class="font-bold text-xl tracking-wide">Constructora Vial</span>
        </a>

        {{-- MENÚ DE ENLACES --}}
        <ul class="flex space-x-6 text-sm font-semibold">
            
            <li><a href="{{ route('machines.index') }}" class="hover:underline">Máquinas</a></li>
            <li><a href="{{ route('works.index') }}" class="hover:underline">Obras</a></li>
            <li><a href="{{ route('tracking.index') }}" class="hover:underline">Rastreo</a></li>
            <li><a href="{{ route('assignments.index') }}" class="hover:underline">Asignaciones</a></li>
            <li><a href="{{route('reports.index')}}" class="hover:underline">Reportes</a></li>
            <li><a href="{{ route('maintenance.index') }}" class="hover:underline">Mantenimiento</a></li>
        </ul>

        {{-- PERFIL DE USUARIO --}}
        @auth
        <div class="relative group">
            <button class="flex items-center space-x-2 focus:outline-none">
                <span class="font-semibold">{{ Auth::user()->name }}</span>
                <svg class="w-4 h-4 fill-current" viewBox="0 0 20 20">
                    <path d="M5.25 7.5L10 12.25L14.75 7.5H5.25Z" />
                </svg>
            </button>
            <div class="absolute right-0 mt-2 w-48 bg-white text-black rounded shadow-md opacity-0 group-hover:opacity-100 transition-opacity z-50">
                <a href="{{ route('profile.edit') }}" class="block px-4 py-2 hover:bg-gray-100">Perfil</a>
                <form method="POST" action="{{ route('logout') }}">
                    @csrf
                    <button type="submit" class="w-full text-left px-4 py-2 hover:bg-gray-100">Cerrar sesión</button>
                </form>
            </div>
        </div>
        @endauth
    </div>
</nav>

    {{-- CONTENIDO EMPUJADO DEBAJO DEL NAV --}}
    <main class="pt-24 px-4">
        @yield('content')
    </main>
@yield('scripts')
    <!-- Leaflet JS -->
<script src="https://unpkg.com/leaflet@1.9.4/dist/leaflet.js"></script>
<script src="https://cdn.jsdelivr.net/npm/sweetalert2@11"></script>


</body>
</html>
