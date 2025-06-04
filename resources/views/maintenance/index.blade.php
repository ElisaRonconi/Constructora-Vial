@extends('layouts.app')

@section('title', 'Alertas de Mantenimiento')

@section('content')
<div class="max-w-4xl mx-auto mt-10">
    <h1 class="text-2xl font-bold text-yellow-600 mb-6">Alertas de Mantenimiento</h1>

    @forelse ($alerts as $alert)
        <div class="mb-4 p-4 bg-yellow-100 border-l-4 border-yellow-500 rounded">
            <p class="text-gray-800 font-medium">{{ $alert->message }}</p>
            <p class="text-sm text-gray-600">
    Máquina: <strong>{{ optional(optional($alert->assignment)->machine)->serial ?? 'Desconocida' }}</strong> |
    Obra: <strong>{{ optional(optional($alert->assignment)->work)->name ?? 'Sin obra' }}</strong> |
    Fecha: {{ $alert->created_at->format('d/m/Y H:i') }}
</p>

        </div>
    @empty
        <p class="text-gray-500 italic">No hay alertas de mantenimiento registradas.</p>
    @endforelse
</div>
@endsection
