@extends('layouts.app')

@section('content')
<div class="max-w-6xl mx-auto px-4">
    <h2 class="text-3xl font-bold text-gray-800 mb-6">Bienvenido al Sistema</h2>

    <div class="grid grid-cols-1 sm:grid-cols-2 md:grid-cols-3 gap-6">
       
        <a href="{{ route('machines.index') }}" class="block bg-white shadow-lg hover:shadow-2xl transition rounded overflow-hidden">
            <img src="{{ asset('img/machine.png') }}" class="w-full h-30 object-cover rounded-t-md" alt="Máquinas">
            <div class="p-4">
                <h3 class="text-xl font-semibold text-gray-700">Máquinas</h3>
                <p class="text-sm text-gray-500">Gestión de maquinaria vial</p>
            </div>
        </a>

        <a href="{{ route('works.index') }}" class="block bg-white shadow-lg hover:shadow-2xl transition rounded overflow-hidden">
            <img src="{{ asset('img/work.png') }}" class="w-full h-30 object-cover rounded-t-md" alt="Obras">
            <div class="p-4">
                <h3 class="text-xl font-semibold text-gray-700">Obras</h3>
                <p class="text-sm text-gray-500">Listado de obras en curso</p>
            </div>
        </a>

       
        <a href="{{ route('tracking.index') }}" class="block bg-white shadow-lg hover:shadow-2xl transition rounded overflow-hidden">
            <img src="{{ asset('img/tracking.png') }}" class="w-full h-30 object-cover rounded-t-md" alt="Rastreo">
            <div class="p-4">
                <h3 class="text-xl font-semibold text-gray-700">Rastreo</h3>
                <p class="text-sm text-gray-500">Ubicación actual de las máquinas</p>
            </div>
        </a>

       
        <a href="{{ route('assignments.index') }}" class="block bg-white shadow-lg hover:shadow-2xl transition rounded overflow-hidden">
            <img src="{{ asset('img/assignment.png') }}" class="w-full h-30 object-cover rounded-t-md" alt="Asignaciones">
            <div class="p-4">
                <h3 class="text-xl font-semibold text-gray-700">Asignaciones</h3>
                <p class="text-sm text-gray-500">Asignar una máquina a una obra.</p>
            </div>
        </a>

        <a href="{{ route('reports.index') }}" class="block bg-white shadow-lg hover:shadow-2xl transition rounded overflow-hidden">
            <img src="{{ asset('img/reporte.png') }}" class="w-full h-30 object-cover rounded-t-md" alt="Reporte">
            <div class="p-4">
                <h3 class="text-xl font-semibold text-gray-700">Reportes</h3>
                <p class="text-sm text-gray-500">Análisis de productividad</p>
            </div>
        </a>

         <a href="#" class="block bg-white shadow-lg hover:shadow-2xl transition rounded overflow-hidden">
            <img src="{{ asset('img/mantenimiento.png') }}" class="w-full h-30 object-cover rounded-t-md" alt="Reporte">
            <div class="p-4">
                <h3 class="text-xl font-semibold text-gray-700">Mantenimiento</h3>
                <p class="text-sm text-gray-500">Estado de máquinas</p>
            </div>
        </a>
       
    </div>
</div>
@endsection
