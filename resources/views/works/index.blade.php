@extends('layouts.app')
@section('content')
<div class="flex justify-between items-center mb-6">
  <h1 class="text-3xl font-semibold">Listado de Obras</h1>
  <a href="{{ route('works.create') }}" class="inline-block px-6 py-2 bg-blue-600 text-black font-medium rounded-lg hover:bg-blue-700 transition">Nueva obra</a>
    <a href="{{ url('/') }}" class="inline-block px-6 py-2 bg-blue-600 text-black font-medium rounded-lg hover:bg-blue-700 transition">Volver</a>
</div>
<div class="bg-white shadow rounded-lg overflow-hidden">
  <table class="min-w-full table-auto">
    <thead class="bg-gray-50">
      <tr>
        <th class="px-6 py-3 text-left text-sm font-medium text-gray-600 uppercase">Nombre de Obra</th>
        <th class="px-6 py-3 text-left text-sm font-medium text-gray-600 uppercase">Provincia</th>
        <th class="px-6 py-3 text-left text-sm font-medium text-gray-600 uppercase">Fecha de Inicio</th>
        <th class="px-6 py-3 text-center text-sm font-medium text-gray-600 uppercase">Fecha de Fin</th>
      </tr>
    </thead>
    <tbody>
      @foreach($works as $work)
      <tr class="border-t hover:bg-gray-50 transition {{ $loop->odd ? 'bg-white' : 'bg-gray-100' }}">
        <td class="px-6 py-4 whitespace-nowrap">{{ $work->name }}</td>
        <td class="px-6 py-4 whitespace-nowrap">{{ $work->province->name ?? 'Sin provincia' }}</td>
        <td class="px-6 py-4 whitespace-nowrap">{{ $work->date_start }}</td>
        <td class="px-6 py-4 whitespace-nowrap">{{ $work->date_end }}</td>
        <td class="px-6 py-4 text-center whitespace-nowrap space-x-3">
          <a href="{{ route('works.show', $work) }}" class="text-blue-500 hover:text-blue-700">Ver</a>
          <a href="{{ route('works.edit', $work) }}" class="text-green-500 hover:text-green-700">Editar</a>
          <form action="{{ route('works.destroy', $work) }}" method="POST" class="inline">
            @csrf @method('DELETE')
            <button type="submit" class="text-red-500 hover:text-red-700" onclick="return confirm('¿Eliminar esta obra?')">Eliminar</button>
          </form>
        </td>
      </tr>
      @endforeach
    </tbody>
  </table>
</div>
<div class="mt-4">{!! $works->links() !!}</div>
@endsection