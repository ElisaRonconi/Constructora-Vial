@extends('layouts.guest')

@section('content')
<div class="min-h-screen flex flex-col items-center justify-center bg-gray-100 px-4">
    <div class="w-full max-w-md bg-white rounded-lg shadow-lg p-6 mt-16">
        <div class="text-center mb-4">
            <img src="{{ asset('img/logo.png') }}" alt="Logo Constructora" class="mx-auto w-16 h-16">
            <h1 class="text-2xl font-bold text-yellow-600 mt-2">Crear cuenta</h1>
        </div>

        <!-- Registro Form -->
        <form method="POST" action="{{ route('register') }}">
            @csrf

            <!-- Nombre -->
            <div class="mb-4">
                <label for="name" class="block text-sm text-gray-700">Nombre completo</label>
                <input type="text" name="name" id="name" required autofocus
                    class="w-full mt-1 p-2 border border-gray-300 rounded focus:outline-none focus:ring-2 focus:ring-yellow-400"
                    value="{{ old('name') }}">
                @error('name')
                    <p class="text-red-500 text-sm mt-1">{{ $message }}</p>
                @enderror
            </div>

            <!-- Email -->
            <div class="mb-4">
                <label for="email" class="block text-sm text-gray-700">Correo electrónico</label>
                <input type="email" name="email" id="email" required
                    class="w-full mt-1 p-2 border border-gray-300 rounded focus:outline-none focus:ring-2 focus:ring-yellow-400"
                    value="{{ old('email') }}">
                @error('email')
                    <p class="text-red-500 text-sm mt-1">{{ $message }}</p>
                @enderror
            </div>

            <!-- Contraseña -->
            <div class="mb-4">
                <label for="password" class="block text-sm text-gray-700">Contraseña</label>
                <input type="password" name="password" id="password" required
                    class="w-full mt-1 p-2 border border-gray-300 rounded focus:outline-none focus:ring-2 focus:ring-yellow-400">
                @error('password')
                    <p class="text-red-500 text-sm mt-1">{{ $message }}</p>
                @enderror
            </div>

            <!-- Confirmar contraseña -->
            <div class="mb-4">
                <label for="password_confirmation" class="block text-sm text-gray-700">Confirmar contraseña</label>
                <input type="password" name="password_confirmation" id="password_confirmation" required
                    class="w-full mt-1 p-2 border border-gray-300 rounded focus:outline-none focus:ring-2 focus:ring-yellow-400">
            </div>

            <!-- Botón -->
            <div class="mt-6">
                <button type="submit"
                    class="w-full bg-yellow-500 hover:bg-yellow-600 text-white py-2 px-4 rounded transition">
                    Registrarme
                </button>
            </div>

            <div class="mt-4 text-center">
                <a href="{{ route('login') }}" class="text-sm text-yellow-600 hover:underline">
                    ¿Ya tenés cuenta? Iniciar sesión
                </a>
            </div>
        </form>
    </div>
</div>
@endsection
