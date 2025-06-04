@extends('layouts.app')
@section('content')
<div class="max-w-lg mx-auto bg-white p-6 shadow rounded-lg">
  <h1 class="text-2xl font-semibold mb-4">Detalles de Asignaciones</h1>
    <a href="{{ url('/') }}" class="inline-block px-6 py-2 bg-blue-600 text-white font-medium rounded-lg hover:bg-blue-700 transition">Volver</a>
  <div class="space-y-3 text-gray-700">
    <p><strong>Número de serie de Maquina:</strong> {{ $assignment->serial_machine }}</p>
    <p><strong>Id de obra:</strong> {{ ucfirst($assignment->id_work) }}</p>
    <p><strong>Kilometros:</strong> {{ $assignment->kilometers }}</p>
    <p><strong>Motivo:</strong> {{ $assignment->id_reason }}</p>
  </div>
  <div class="mt-6 flex justify-between">
    <a href="{{ route('assignments.edit', $assignment) }}" class="px-5 py-2 bg-yellow-500 text-white rounded-md hover:bg-yellow-600">Editar</a>
    <form action="{{ route('assignments.destroy', $assignment) }}" method="POST">
      @csrf @method('DELETE')
      <button type="submit" class="px-5 py-2 bg-red-600 text-white rounded-md hover:bg-red-700" onclick="return confirm('¿Eliminar asignación?')">Eliminar</button>
    </form>
  </div>
  <a href="{{ route('assignments.index') }}" class="mt-4 inline-block text-blue-600 hover:underline">« Volver al listado</a>
</div>
@endsection
