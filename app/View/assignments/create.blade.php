@extends('layouts.app')

@section('content')
  <h1 class="text-2xl font-bold mb-4">Nueva Asignación</h1>

  @if ($errors->any())
    <div class="bg-red-100 p-3 rounded mb-4 text-red-700">
      <ul>
        @foreach ($errors->all() as $error)
          <li>- {{ $error }}</li>
        @endforeach
      </ul>
    </div>
  @endif

  <form action="{{ route('assignments.store') }}" method="POST" class="space-y-4">
    @csrf

    <div>
      <label for="serial_machine">Máquina</label>
      <select name="serial_machine" id="serial_machine" class="w-full border rounded p-2" required>
        @foreach ($machines as $machine)
          <option value="{{ $machine->serial }}">{{ $machine->serial }} - {{ $machine->brand_model }}</option>
        @endforeach
      </select>
    </div>

    <div>
      <label for="id_work">Obra</label>
      <select name="id_work" id="id_work" class="w-full border rounded p-2" required>
        @foreach ($works as $work)
          <option value="{{ $work->id }}">{{ $work->name }}</option>
        @endforeach
      </select>
    </div>

    <div>
      <label for="data_start">Fecha de inicio</label>
      <input type="date" name="data_start" id="data_start" class="w-full border rounded p-2" required>
    </div>

    <div>
      <label for="data_end">Fecha de fin (opcional)</label>
      <input type="date" name="data_end" id="data_end" class="w-full border rounded p-2">
    </div>

    <div>
      <label for="kilometers">Kilómetros recorridos</label>
      <input type="number" name="kilometers" id="kilometers" class="w-full border rounded p-2" step="1" min="0">
    </div>

    <div>
      <label for="id_reason">Motivo (ID)</label>
      <input type="number" name="id_reason" id="id_reason" class="w-full border rounded p-2">
    </div>

    <div>
      <button type="submit" class="bg-blue-600 text-white px-4 py-2 rounded hover:bg-blue-700">
        Guardar Asignación
      </button>
    </div>
  </form>
@endsection

