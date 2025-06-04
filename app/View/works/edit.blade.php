@extends('layouts.app')
@section('content')
<div class="max-w-lg mx-auto bg-white p-6 shadow rounded-lg">
  <h1 class="text-2xl font-semibold mb-4">Editar Obra</h1>
  @if($errors->any())
    <div class="mb-4 p-4 bg-red-100 border border-red-200 text-red-700 rounded-lg">
      <ul class="list-disc list-inside">
        @foreach($errors->all() as $error)
          <li>{{ $error }}</li>
        @endforeach
      </ul>
    </div>
  @endif
  <form action="{{ route('works.update', $work) }}" method="POST" class="space-y-4">
    @csrf @method('PUT')
    <div>
      <label class="block text-sm font-medium text-gray-700">Nombre de Obra</label>
      <input type="text" name="name" value="{{ $work->name }}" readonly class="mt-1 block w-full bg-gray-100 border-gray-300 rounded-md shadow-sm">
    </div>
    <div>
      <label class="block text-sm font-medium text-gray-700">Id Provincia</label>
      <input type="text" name="id_province" value="{{ old('id_province', $work->id_province) }}" class="mt-1 block w-full border-gray-300 rounded-md shadow-sm focus:ring-blue-500 focus:border-blue-500">
    </div>
    <div>
      <label class="block text-sm font-medium text-gray-700">Fecha de Inicio</label>
      <input type="date" name="date_start" value="{{ old('date_start', $work->date_start) }}" class="mt-1 block w-full border-gray-300 rounded-md shadow-sm focus:ring-blue-500 focus:border-blue-500">
    </div>
    <div>
      <label class="block text-sm font-medium text-gray-700">Fecha de Fin</label>
      <input type="date" name="date_end" value="{{ old('date_end', $work->date_end) }}" class="mt-1 block w-full border-gray-300 rounded-md shadow-sm focus:ring-blue-500 focus:border-blue-500">
    </div>
    <div class="flex justify-end">
      <a href="{{ route('works.index') }}" class="px-4 py-2 mr-2 bg-gray-200 rounded-md">Cancelar</a>
      <button type="submit" class="px-6 py-2 bg-green-600 text-white rounded-md hover:bg-green-700">Guardar cambios</button>
    </div>
  </form>
</div>
@endsection