<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">
    <head>
        <meta charset="utf-8">
        <meta name="viewport" content="width=device-width, initial-scale=1">
        <title>Veterinaria Francisco de Montejo</title>
        <link rel="preconnect" href="https://fonts.bunny.net">
        <link href="https://fonts.bunny.net/css?family=figtree:400,600&display=swap" rel="stylesheet" />
        @vite(['resources/css/app.css', 'resources/js/app.js'])
    </head>
    <body class="antialiased font-sans text-gray-900 bg-white dark:bg-gray-900">
        
        <nav class="absolute top-0 left-0 w-full z-10 bg-transparent py-6">
            <div class="max-w-7xl mx-auto px-6 lg:px-8 flex justify-between items-center">
                <div class="flex items-center gap-3">
                    <x-application-mark class="h-10 w-10" /> 
                    <span class="text-2xl font-bold text-teal-600 dark:text-teal-400">Vet Fco. Montejo</span>
                </div>

                <div class="flex gap-4">
                    @if (Route::has('login'))
                        @auth
                            <a href="{{ url('/dashboard') }}" class="font-semibold text-gray-600 hover:text-teal-600 dark:text-gray-300 dark:hover:text-teal-400">Dashboard</a>
                        @else
                            <a href="{{ route('login') }}" class="font-semibold text-gray-600 hover:text-teal-600 dark:text-gray-300 dark:hover:text-teal-400">Iniciar Sesión</a>

                            @if (Route::has('register'))
                                <a href="{{ route('register') }}" class="px-4 py-2 bg-teal-500 hover:bg-teal-600 text-white rounded-lg font-bold transition">
                                    Registrarse
                                </a>
                            @endif
                        @endauth
                    @endif
                </div>
            </div>
        </nav>

        <div class="relative min-h-screen flex items-center bg-gray-50 dark:bg-gray-900">
            <div class="absolute top-0 right-0 -mt-20 -mr-20 w-[600px] h-[600px] bg-teal-100 dark:bg-teal-900/20 rounded-full blur-3xl opacity-50"></div>

            <div class="max-w-7xl mx-auto px-6 lg:px-8 grid grid-cols-1 md:grid-cols-2 gap-12 items-center relative z-0">
                
                <div>
                    <span class="text-teal-500 font-bold tracking-wider uppercase text-sm">Cuidado Profesional</span>
                    <h1 class="mt-4 text-5xl md:text-6xl font-extrabold text-gray-900 dark:text-white leading-tight">
                        Cuidamos a quienes <br>
                        <span class="text-teal-500">más amas.</span>
                    </h1>
                    <p class="mt-6 text-lg text-gray-600 dark:text-gray-300">
                        Servicio veterinario de excelencia en Francisco de Montejo. Medicina preventiva, cirugía y estética para tus mascotas con tecnología de punta.
                    </p>
                    
                    <div class="mt-8 flex gap-4">
                        <a href="{{ route('login') }}" class="px-8 py-4 bg-teal-600 hover:bg-teal-700 text-white text-lg font-bold rounded-xl shadow-lg transform hover:-translate-y-1 transition duration-300">
                            Agendar Cita
                        </a>
                        <a href="#servicios" class="px-8 py-4 bg-white border border-gray-200 text-gray-700 font-bold rounded-xl shadow-sm hover:bg-gray-50 transition">
                            Nuestros Servicios
                        </a>
                    </div>
                </div>

                <div class="relative">
                    <img src="https://images.unsplash.com/photo-1548767797-d8c844163c4c?q=80&w=2070&auto=format&fit=crop" 
                         alt="Perro feliz" 
                         class="rounded-3xl shadow-2xl border-4 border-white dark:border-gray-800 rotate-2 hover:rotate-0 transition duration-500">
                    
                    <div class="absolute -bottom-6 -left-6 bg-white dark:bg-gray-800 p-4 rounded-xl shadow-xl border border-gray-100 dark:border-gray-700 flex items-center gap-4 animate-bounce" style="animation-duration: 3s;">
                        <div class="bg-green-100 p-3 rounded-full text-green-600">
                            <svg class="w-6 h-6" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M5 13l4 4L19 7"></path></svg>
                        </div>
                        <div>
                            <p class="text-sm text-gray-500 dark:text-gray-400">Veterinarios</p>
                            <p class="font-bold text-gray-900 dark:text-white">Certificados</p>
                        </div>
                    </div>
                </div>

            </div>
        </div>

        <div id="servicios" class="py-20 bg-white dark:bg-gray-800">
            <div class="max-w-7xl mx-auto px-6">
                <div class="text-center mb-16">
                    <h2 class="text-3xl font-bold text-gray-900 dark:text-white">Nuestros Servicios</h2>
                    <p class="mt-4 text-gray-500">Todo lo que tu mascota necesita en un solo lugar.</p>
                </div>

                <div class="grid grid-cols-1 md:grid-cols-3 gap-8">
                    <div class="p-8 bg-gray-50 dark:bg-gray-700 rounded-2xl hover:shadow-lg transition">
                        <div class="w-12 h-12 bg-teal-100 dark:bg-teal-900 rounded-lg flex items-center justify-center text-teal-600 mb-4">
                            <svg class="w-6 h-6" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M4.318 6.318a4.5 4.5 0 000 6.364L12 20.364l7.682-7.682a4.5 4.5 0 00-6.364-6.364L12 7.636l-1.318-1.318a4.5 4.5 0 00-6.364 0z"></path></svg>
                        </div>
                        <h3 class="text-xl font-bold text-gray-900 dark:text-white mb-2">Medicina General</h3>
                        <p class="text-gray-500 dark:text-gray-300">Consultas preventivas y diagnósticos precisos para el bienestar de tu amigo.</p>
                    </div>

                    <div class="p-8 bg-gray-50 dark:bg-gray-700 rounded-2xl hover:shadow-lg transition">
                        <div class="w-12 h-12 bg-blue-100 dark:bg-blue-900 rounded-lg flex items-center justify-center text-blue-600 mb-4">
                            <svg class="w-6 h-6" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M19.428 15.428a2 2 0 00-1.022-.547l-2.384-.477a6 6 0 00-3.86.517l-.318.158a6 6 0 01-3.86.517L6.05 15.21a2 2 0 00-1.806.547M8 4h8l-1 1v5.172a2 2 0 00.586 1.414l5 5c1.26 1.26.367 3.414-1.415 3.414H4.828c-1.782 0-2.674-2.154-1.414-3.414l5-5A2 2 0 009 10.172V5L8 4z"></path></svg>
                        </div>
                        <h3 class="text-xl font-bold text-gray-900 dark:text-white mb-2">Laboratorio</h3>
                        <p class="text-gray-500 dark:text-gray-300">Análisis clínicos rápidos para detectar cualquier problema a tiempo.</p>
                    </div>

                    <div class="p-8 bg-gray-50 dark:bg-gray-700 rounded-2xl hover:shadow-lg transition">
                        <div class="w-12 h-12 bg-purple-100 dark:bg-purple-900 rounded-lg flex items-center justify-center text-purple-600 mb-4">
                            <svg class="w-6 h-6" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M14.828 14.828a4 4 0 01-5.656 0M9 10h.01M15 10h.01M21 12a9 9 0 11-18 0 9 9 0 0118 0z"></path></svg>
                        </div>
                        <h3 class="text-xl font-bold text-gray-900 dark:text-white mb-2">Estética Canina</h3>
                        <p class="text-gray-500 dark:text-gray-300">Baño, corte y limpieza para que tu mascota luzca y se sienta genial.</p>
                    </div>
                </div>
            </div>
        </div>
    </body>
</html>