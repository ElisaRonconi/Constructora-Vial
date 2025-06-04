<x-guest-layout>
   @extends('layouts.guest')

@section('content')
<div class="min-h-screen flex flex-col items-center justify-center bg-gray-100 px-4">
    <div class="w-full max-w-md bg-white rounded-lg shadow-lg p-6 mt-16">
        <div class="text-center mb-4">
            <img src="{{ asset('img/logo.png') }}" alt="Logo Constructora" class="mx-auto w-16 h-16">
            <h1 class="text-2xl font-bold text-yellow-600 mt-2">Iniciar Sesión</h1>
        </div>

        <!-- Login Form -->
        <form method="POST" action="{{ route('login') }}">
            @csrf

            <!-- Email -->
            <div class="mb-4">
                <label for="email" class="block text-sm text-gray-700">Correo electrónico</label>
                <input type="email" id="email" name="email" required autofocus
                    class="w-full mt-1 p-2 border border-gray-300 rounded focus:outline-none focus:ring-2 focus:ring-yellow-400">
                @error('email')
                    <p class="text-red-500 text-sm mt-1">{{ $message }}</p>
                @enderror
            </div>

            <!-- Password -->
            <div class="mb-4">
                <label for="password" class="block text-sm text-gray-700">Contraseña</label>
                <input type="password" id="password" name="password" required
                    class="w-full mt-1 p-2 border border-gray-300 rounded focus:outline-none focus:ring-2 focus:ring-yellow-400">
                @error('password')
                    <p class="text-red-500 text-sm mt-1">{{ $message }}</p>
                @enderror
            </div>

            <!-- Recordar sesión -->
            <div class="mb-4 flex items-center">
                <input type="checkbox" name="remember" class="mr-2">
                <span class="text-sm text-gray-600">Recordarme</span>
            </div>

            <!-- Botón -->
            <div class="mt-6">
                <button type="submit"
                    class="w-full bg-yellow-500 hover:bg-yellow-600 text-white py-2 px-4 rounded transition">
                    Ingresar
                </button>
            </div>

            <div class="mt-4 text-center">
                <a href="{{ route('register') }}" class="text-sm text-yellow-600 hover:underline">¿No tienes cuenta? Registrate</a>
            </div>
        </form>
    </div>
</div>
@endsection

</x-guest-layout>
