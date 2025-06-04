@extends('layouts.app')
@section('content')
  <div class="grid grid-cols-1 sm:grid-cols-3 gap-6 text-center">
    <a href="{{ route('machines.index') }}" class="p-6 bg-white rounded-lg shadow hover:bg-blue-50">
      <h2 class="text-xl font-semibold text-blue-600">Máquinas</h2>
      <p>Ver, crear y editar máquinas.</p>
    </a>

    <a href="{{ route('works.index') }}" class="p-6 bg-white rounded-lg shadow hover:bg-blue-50">
      <h2 class="text-xl font-semibold text-green-600">Obras</h2>
      <p>Gestionar proyectos viales.</p>
    </a>

    <a href="{{ route('assignments.create') }}" class="p-6 bg-white rounded-lg shadow hover:bg-blue-50">
      <h2 class="text-xl font-semibold text-purple-600">Asignar máquina</h2>
      <p>Asignar una máquina a una obra.</p>
    </a>

    <a  href="{{ route('trackingMachine') }}"class="p-6 bg-white rounded-lg shadow hover:bg-blue-50">
      <h2 class="text-xl font-semibold text-purple-600">Rastreo de máquinas</h2>
      <p>Consultar ubicación de máquina</p>
    </a>
    <a  class="p-6 bg-white rounded-lg shadow hover:bg-blue-50">
      <h2 class="text-xl font-semibold text-purple-600">Generar Reporte</h2>
      <p>Para mantenimiento y análisis de productividad.</p>
    </a>
  </div>
@endsection
