@extends('layouts.app')
@section('content')
<div class="max-w-lg mx-auto bg-white p-6 shadow rounded-lg">
  <h1 class="text-2xl font-semibold mb-4">Editar Asignación</h1>
    <a href="{{ url('/') }}" class="inline-block px-6 py-2 bg-blue-600 text-blue font-medium rounded-lg hover:bg-blue-700 transition">Volver</a>
  @if($errors->any())
    <div class="mb-4 p-4 bg-red-100 border border-red-200 text-red-700 rounded-lg">
      <ul class="list-disc list-inside">
        @foreach($errors->all() as $error)
          <li>{{ $error }}</li>
        @endforeach
      </ul>
    </div>
  @endif
  <form action="{{ route('assignments.update', $assignment) }}" method="POST" class="space-y-4">
    @csrf @method('PUT')
    <div>
      <label class="block text-sm font-medium text-gray-700">Número de Serie de maquina</label>
      <input type="text" name="serial_machine" value="{{ $assignment->serial_machine }}" readonly class="mt-1 block w-full bg-gray-100 border-gray-300 rounded-md shadow-sm">
    </div>
    <div>
      <label class="block text-sm font-medium text-gray-700">Id de Obra</label>
      <input type="text" name="id_work" value="{{ old('id_work', $assignment->id_work) }}" class="mt-1 block w-full border-gray-300 rounded-md shadow-sm focus:ring-blue-500 focus:border-blue-500">
    </div>
    <div>
      <label class="block text-sm font-medium text-gray-700">Kilometros</label>
      <input type="text" name="kilometers" value="{{ old('kilometers', $assignment->kilometers) }}" class="mt-1 block w-full border-gray-300 rounded-md shadow-sm focus:ring-blue-500 focus:border-blue-500">
    </div>
    <div>
      <label class="block text-sm font-medium text-gray-700">Motivo</label>
      <input type="text" name="id_reason" value="{{ old('id_reason', $assignment->id_reason) }}" class="mt-1 block w-full border-gray-300 rounded-md shadow-sm focus:ring-blue-500 focus:border-blue-500">
    </div>
    <div class="flex justify-end">
      <a href="{{ route('assignments.index') }}" class="px-4 py-2 mr-2 bg-gray-200 rounded-md">Cancelar</a>
      <button type="submit" class="px-6 py-2 bg-green-600 text-white rounded-md hover:bg-green-700">Guardar cambios</button>
    </div>
  </form>
</div>
@endsection