@extends('layouts.app')

@section('title', 'Mi perfil')

@section('content')
<div class="max-w-xl mx-auto bg-white p-6 rounded-lg shadow-md mt-6">

    <h2 class="text-2xl font-bold text-yellow-600 mb-4">Perfil de usuario</h2>

    {{-- Mensaje de éxito --}}
    @if (session('status') === 'profile-updated')
        <div class="mb-4 text-green-600 font-medium">
            Perfil actualizado correctamente.
        </div>
    @endif

    <form method="POST" action="{{ route('profile.update') }}">
        @csrf
        @method('patch')

        {{-- Nombre --}}
        <div class="mb-4">
            <label for="name" class="block text-sm text-gray-700">Nombre</label>
            <input id="name" name="name" type="text" value="{{ old('name', Auth::user()->name) }}" required
                class="w-full mt-1 p-2 border border-gray-300 rounded focus:outline-none focus:ring-2 focus:ring-yellow-400">
            @error('name')
                <p class="text-red-500 text-sm mt-1">{{ $message }}</p>
            @enderror
        </div>

        {{-- Email --}}
        <div class="mb-4">
            <label for="email" class="block text-sm text-gray-700">Correo electrónico</label>
            <input id="email" name="email" type="email" value="{{ old('email', Auth::user()->email) }}" required
                class="w-full mt-1 p-2 border border-gray-300 rounded focus:outline-none focus:ring-2 focus:ring-yellow-400">
            @error('email')
                <p class="text-red-500 text-sm mt-1">{{ $message }}</p>
            @enderror
        </div>

        {{-- Botón guardar --}}
        <div class="mt-6">
            <button type="submit"
                class="bg-yellow-500 hover:bg-yellow-600 text-white font-semibold py-2 px-4 rounded transition">
                Guardar cambios
            </button>
        </div>
    </form>

    {{-- Formulario para eliminar cuenta (opcional) --}}
    <hr class="my-6">
    <form method="POST" action="{{ route('profile.destroy') }}"
        onsubmit="return confirm('¿Estás seguro de que querés eliminar tu cuenta? Esta acción no se puede deshacer.')">
        @csrf
        @method('delete')
        <button type="submit" class="text-red-600 hover:underline text-sm">
            Eliminar cuenta permanentemente
        </button>
    </form>

</div>
@endsection
