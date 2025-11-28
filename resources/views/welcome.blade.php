{{--
    Vista de bienvenida pública.
    Página de aterrizaje para usuarios no autenticados.
--}}
<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">
    <head>
        <meta charset="utf-8">
        <meta name="viewport" content="width=device-width, initial-scale=1">
        <title>Veterinaria Francisco de Montejo</title>
        @vite(['resources/css/app.css', 'resources/js/app.js'])
    </head>
    <body class="antialiased bg-gray-50 dark:bg-gray-900">
        
        <div class="min-h-screen flex items-center justify-center px-4">
            <div class="text-center max-w-2xl">
                <!-- Logo o ícono -->
                <div class="mb-8">
                    <svg class="w-24 h-24 mx-auto text-teal-600" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M4.318 6.318a4.5 4.5 0 000 6.364L12 20.364l7.682-7.682a4.5 4.5 0 00-6.364-6.364L12 7.636l-1.318-1.318a4.5 4.5 0 00-6.364 0z"></path>
                    </svg>
                </div>

                <!-- Mensaje de bienvenida -->
                <h1 class="text-5xl font-bold text-gray-900 dark:text-white mb-4">
                    Bienvenido
                </h1>
                <p class="text-xl text-gray-600 dark:text-gray-400 mb-8">
                    Veterinaria Francisco de Montejo
                </p>

                <!-- Botón de agendar cita -->
                @if (Route::has('login'))
                    @auth
                        <a href="{{ url('/dashboard') }}" class="inline-block px-8 py-4 bg-teal-600 hover:bg-teal-700 text-white text-lg font-bold rounded-lg shadow-lg transition">
                            Ir al Dashboard
                        </a>
                    @else
                        <a href="{{ route('login') }}" class="inline-block px-8 py-4 bg-teal-600 hover:bg-teal-700 text-white text-lg font-bold rounded-lg shadow-lg transition">
                            Agendar Cita
                        </a>
                    @endauth
                @endif
            </div>
        </div>

    </body>
</html>