@extends('layouts.app')
@section('content')
<div class="max-w-lg mx-auto bg-white p-6 shadow rounded-lg">
  <h1 class="text-2xl font-semibold mb-4">Detalles de Máquina</h1>
  <div class="space-y-3 text-gray-700">
    <p><strong>Número de serie:</strong> {{ $machine->serial }}</p>
    <p><strong>Tipo:</strong> {{ ucfirst($machine->id_type) }}</p>
    <p><strong>Marca/Modelo:</strong> {{ $machine->brand_model }}</p>
    <p><strong>Creada:</strong> {{ $machine->created_at->locale('es')->isoFormat('LL') }}</p>
  </div>
  <div class="mt-6 flex justify-between">
    <a href="{{ route('machines.edit', $machine) }}" class="px-5 py-2 bg-yellow-500 text-white rounded-md hover:bg-yellow-600">Editar</a>
    <form action="{{ route('machines.destroy', $machine) }}" method="POST">
      @csrf @method('DELETE')
      <button type="submit" class="px-5 py-2 bg-red-600 text-white rounded-md hover:bg-red-700" onclick="return confirm('¿Eliminar máquina?')">Eliminar</button>
    </form>
  </div>
  <a href="{{ route('machines.index') }}" class="mt-4 inline-block text-blue-600 hover:underline">« Volver al listado</a>
</div>
@endsection
