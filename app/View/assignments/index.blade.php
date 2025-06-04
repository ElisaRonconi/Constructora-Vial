@extends('layouts.app')
@section('content')
<div class="flex justify-between items-center mb-6">
  <h1 class="text-3xl font-semibold">Listado de Asignaciones</h1>
  <a href="{{ route('assignments.create') }}" class="inline-block px-6 py-2 bg-blue-600 text-white font-medium rounded-lg hover:bg-blue-700 transition">Nueva Máquina</a>
</div>
<div class="bg-white shadow rounded-lg overflow-hidden">
  <table class="min-w-full table-auto">
    <thead class="bg-gray-50">
      <tr>
        <th class="px-6 py-3 text-left text-sm font-medium text-gray-600 uppercase">Número de serie de maquina</th>
        <th class="px-6 py-3 text-left text-sm font-medium text-gray-600 uppercase">Id de Obra</th>
        <th class="px-6 py-3 text-left text-sm font-medium text-gray-600 uppercase">Kilometros</th>
        <th class="px-6 py-3 text-center text-sm font-medium text-gray-600 uppercase">Motivo</th>
      </tr>
    </thead>
    <tbody>
      @foreach($assignments as $assignment)
      <tr class="border-t hover:bg-gray-50 transition {{ $loop->odd ? 'bg-white' : 'bg-gray-100' }}">
        <td class="px-6 py-4 whitespace-nowrap">{{ $assignment->serial_machine }}</td>
        <td class="px-6 py-4 whitespace-nowrap">{{ ucfirst($assignment->id_work) }}</td>
        <td class="px-6 py-4 whitespace-nowrap">{{ $assignment->kilometers }}</td>
        <td class="px-6 py-4 whitespace-nowrap">{{ $assignment->id_reason }}</td>
        <td class="px-6 py-4 text-center whitespace-nowrap space-x-3">
          <a href="{{ route('assignments.show', $assignment) }}" class="text-blue-500 hover:text-blue-700">Ver</a>
          <a href="{{ route('assignments.edit', $assignment) }}" class="text-green-500 hover:text-green-700">Editar</a>
          <form action="{{ route('assignments.destroy', $assignment) }}" method="POST" class="inline">
            @csrf @method('DELETE')
            <button type="submit" class="text-red-500 hover:text-red-700" onclick="return confirm('¿Eliminar esta asignación?')">Eliminar</button>
          </form>
        </td>
      </tr>
      @endforeach
    </tbody>
  </table>
</div>
<div class="mt-4">{!! $assignments->links() !!}</div>
@endsection