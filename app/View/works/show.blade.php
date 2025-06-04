@extends('layouts.app')
@section('content')
<div class="max-w-lg mx-auto bg-white p-6 shadow rounded-lg">
  <h1 class="text-2xl font-semibold mb-4">Detalles de Obra</h1>
  <div class="space-y-3 text-gray-700">
    <p><strong>Nombre de Obra:</strong> {{ $work->name }}</p>
    <p><strong>Provincia:</strong> {{ $work->id_province }}</p>
    <p><strong>Fecha de Inicio:</strong> {{ $work->date_start }}</p>
    <p><strong>Fecha de Fin:</strong> {{ $work->date_end}}</p>
  </div>
  <div class="mt-6 flex justify-between">
    <a href="{{ route('works.edit', $work) }}" class="px-5 py-2 bg-yellow-500 text-white rounded-md hover:bg-yellow-600">Editar</a>
    <form action="{{ route('works.destroy', $work) }}" method="POST">
      @csrf @method('DELETE')
      <button type="submit" class="px-5 py-2 bg-red-600 text-white rounded-md hover:bg-red-700" onclick="return confirm('¿Eliminar Obra?')">Eliminar</button>
    </form>
  </div>
  <a href="{{ route('works.index') }}" class="mt-4 inline-block text-blue-600 hover:underline">« Volver al listado</a>
</div>
@endsection
