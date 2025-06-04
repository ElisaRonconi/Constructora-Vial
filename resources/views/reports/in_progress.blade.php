@extends('layouts.app')

@section('title', 'Reportes - En Desarrollo')

@section('content')
<div class="max-w-3xl mx-auto mt-12 p-8 bg-white shadow-md rounded-lg text-center">
    <h1 class="text-3xl font-bold text-yellow-600 mb-4">📊 Reportes</h1>

    <p class="text-lg text-gray-700 mb-2">
        Actualmente estamos trabajando en esta sección para ofrecerte los mejores reportes.
    </p>
    <p class="text-gray-600 mb-6">
        ¡Pronto estará disponible! Agradecemos tu paciencia.
    </p>

    <a href="{{ url('/') }}" 
       class="inline-block px-6 py-2 bg-yellow-500 text-white font-semibold rounded-md hover:bg-yellow-600 transition">
        ← Volver al Inicio
    </a>

    <div class="mt-6 text-sm text-gray-500">
        Equipo de Desarrollo - Constructora Vial
    </div>
</div>
@endsection
