@extends('layouts.app')
@section('content')
<div class="max-w-lg mx-auto bg-white p-6 shadow rounded-lg">
  <h1 class="text-2xl font-semibold mb-4">Editar Máquina</h1>
  @if($errors->any())
    <div class="mb-4 p-4 bg-red-100 border border-red-200 text-red-700 rounded-lg">
      <ul class="list-disc list-inside">
        @foreach($errors->all() as $error)
          <li>{{ $error }}</li>
        @endforeach
      </ul>
    </div>
  @endif
  <form action="{{ route('machines.update', $machine) }}" method="POST" class="space-y-4">
    @csrf @method('PUT')
    <div>
      <label class="block text-sm font-medium text-gray-700">Número de Serie</label>
      <input type="text" name="serial" value="{{ $machine->serial }}" readonly class="mt-1 block w-full bg-gray-100 border-gray-300 rounded-md shadow-sm">
    </div>
    <div>
      <label class="block text-sm font-medium text-gray-700">Tipo</label>
      <input type="text" name="type" value="{{ old('type', $machine->type) }}" class="mt-1 block w-full border-gray-300 rounded-md shadow-sm focus:ring-blue-500 focus:border-blue-500">
    </div>
    <div>
      <label class="block text-sm font-medium text-gray-700">Marca/Modelo</label>
      <input type="text" name="brand_model" value="{{ old('brand_model', $machine->brand_model) }}" class="mt-1 block w-full border-gray-300 rounded-md shadow-sm focus:ring-blue-500 focus:border-blue-500">
    </div>
    <div class="flex justify-end">
      <a href="{{ route('machines.index') }}" class="px-4 py-2 mr-2 bg-gray-200 rounded-md">Cancelar</a>
      <button type="submit" class="px-6 py-2 bg-green-600 text-white rounded-md hover:bg-green-700">Guardar cambios</button>
    </div>
  </form>
</div>
@endsection