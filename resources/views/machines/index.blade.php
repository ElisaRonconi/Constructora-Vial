@extends('layouts.app')

@section('content')

{{-- Alerta de éxito al eliminar --}}
@if (session('success'))
  <script>
    document.addEventListener('DOMContentLoaded', function () {
      Swal.fire({
        icon: 'success',
        title: 'Éxito',
        text: '{{ session('success') }}',
        confirmButtonColor: '#facc15',
        background: '#fff8e1'
      });
    });
  </script>
@endif

<div class="flex justify-between items-center mb-6">
  <h1 class="text-3xl font-semibold">Listado de Máquinas</h1>
  <a href="{{ route('machines.create') }}" class="inline-block px-6 py-2 bg-blue-600 text-black font-medium rounded-lg hover:bg-blue-700 transition">Nueva Máquina</a>
  <a href="{{ url('/') }}" class="inline-block px-6 py-2 bg-blue-600 text-black font-medium rounded-lg hover:bg-blue-700 transition">Volver</a>
</div>

<div class="bg-white shadow rounded-lg overflow-hidden">
  <table class="min-w-full table-auto">
    <thead class="bg-gray-50">
      <tr>
        <th class="px-6 py-3 text-left text-sm font-medium text-gray-600 uppercase">Número de serie</th>
        <th class="px-6 py-3 text-left text-sm font-medium text-gray-600 uppercase">Tipo</th>
        <th class="px-6 py-3 text-left text-sm font-medium text-gray-600 uppercase">Marca/Modelo</th>
        <th class="px-6 py-3 text-center text-sm font-medium text-gray-600 uppercase">Obra actual</th>
        <th class="px-6 py-3 text-center text-sm font-medium text-gray-600 uppercase">Acciones</th>
      </tr>
    </thead>
    <tbody>
      @foreach($machines as $machine)
        @php
          $asignacion = $machine->assignments->firstWhere('data_end', null);
        @endphp
        <tr class="border-t hover:bg-gray-50 transition {{ $loop->odd ? 'bg-white' : 'bg-gray-100' }}">
          <td class="px-6 py-4 whitespace-nowrap">{{ $machine->serial }}</td>
          <td class="px-6 py-4 whitespace-nowrap">{{ ucfirst($machine->type) }}</td>
          <td class="px-6 py-4 whitespace-nowrap">{{ $machine->brand_model }}</td>
          <td class="px-6 py-4 whitespace-nowrap text-center">
            @if ($asignacion && $asignacion->work)
              <div class="text-sm font-medium text-gray-800">{{ $asignacion->work->name }}</div>
              <div class="text-sm text-gray-500">{{ $asignacion->work->province->name ?? 'Sin provincia' }}</div>
            @else
              <span class="text-gray-500 italic">No asignada</span>
            @endif
          </td>
          <td class="px-6 py-4 text-center whitespace-nowrap space-x-3">
            <a href="{{ route('machines.show', $machine->serial) }}" class="text-blue-500 hover:text-blue-700">Ver</a>
            <a href="{{ route('machines.edit', $machine->serial) }}" class="text-green-500 hover:text-green-700">Editar</a>
            <a href="{{ route('reports.index') }}" class="text-green-500 hover:text-green-700">Reporte</a>

            {{-- Botón con SweetAlert --}}
            <button onclick="confirmarEliminacion('{{ $machine->serial }}')" class="text-red-500 hover:text-red-700">Eliminar</button>

            {{-- Formulario oculto para eliminación --}}
            <form id="form-eliminar-{{ $machine->serial }}" action="{{ route('machines.destroy', $machine->serial) }}" method="POST" class="hidden">
              @csrf
              @method('DELETE')
            </form>
          </td>
        </tr>
      @endforeach
    </tbody>
  </table>
</div>

<div class="mt-4">
  {!! $machines->links() !!}
</div>
@endsection

@section('scripts')
  {{-- SweetAlert2 CDN --}}
  <script src="https://cdn.jsdelivr.net/npm/sweetalert2@11"></script>

  <script>
    function confirmarEliminacion(serial) {
      Swal.fire({
        title: '¿Estás seguro?',
        text: "Esta acción eliminará la máquina.",
        icon: 'warning',
        showCancelButton: true,
        confirmButtonColor: '#facc15', // amarillo
        cancelButtonColor: '#d33',
        confirmButtonText: 'Sí, eliminar',
        cancelButtonText: 'Cancelar',
        background: '#fff8e1',
        color: '#000'
      }).then((result) => {
        if (result.isConfirmed) {
          const form = document.getElementById('form-eliminar-' + serial);
          if (form) {
            form.submit();
          } else {
            console.error("Formulario no encontrado: form-eliminar-" + serial);
          }
        }
      });
    }
  </script>
@endsection
