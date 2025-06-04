@extends('layouts.app')

@section('content')
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

<div class="max-w-lg mx-auto bg-white p-6 shadow rounded-lg">
  <h1 class="text-2xl font-semibold mb-4">Detalles de Máquina</h1>

  <div class="space-y-3 text-gray-700">
    <p><strong>Número de serie:</strong> {{ $machine->serial }}</p>
    <p><strong>Tipo:</strong> {{ ucfirst($machine->type) }}</p>
    <p><strong>Marca/Modelo:</strong> {{ $machine->brand_model }}</p>
    <p><strong>Creada:</strong> {{ $machine->created_at->locale('es')->isoFormat('LL') }}</p>

    @if($asignacionActual && $asignacionActual->work)
      <p><strong>Obra Actual:</strong> {{ $asignacionActual->work->name }}</p>
      <p><strong>Provincia:</strong> {{ $asignacionActual->work->province->name ?? 'No registrada' }}</p>
    @else
      <p><strong>Obra Actual:</strong> No asignada</p>
      <p><strong>Provincia:</strong> - </p>
    @endif
  </div>

  <div class="mt-6 flex justify-between">
    <a href="{{ route('machines.edit', $machine->serial) }}" class="px-5 py-2 bg-yellow-500 text-white rounded-md hover:bg-yellow-600">Editar</a>

    {{-- Botón con SweetAlert2 --}}
    <button 
      type="button" 
      class="px-5 py-2 bg-red-600 text-white rounded-md hover:bg-red-700" 
      onclick="confirmarEliminacion('{{ $machine->serial }}')"
    >
      Eliminar
    </button>

    {{-- Formulario oculto --}}
    <form id="form-eliminar-{{ $machine->serial }}" action="{{ route('machines.destroy', $machine->serial) }}" method="POST" style="display: none;">
      @csrf
      @method('DELETE')
    </form>
  </div>

  <a href="{{ route('machines.index') }}" class="mt-4 inline-block text-blue-600 hover:underline">« Volver al listado</a>
  <a class="mt-4 inline-block text-blue-600 hover:underline">« Generar Historial</a>
</div>
@endsection

@section('scripts')
  {{-- SweetAlert2 CDN --}}
  <script src="https://cdn.jsdelivr.net/npm/sweetalert2@11"></script>

  <script>
    function confirmarEliminacion(serial) {
      Swal.fire({
        title: '¿Estás seguro?',
        text: "Esta acción eliminará la máquina permanentemente.",
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
