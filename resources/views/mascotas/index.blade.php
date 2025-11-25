<x-app-layout>
    <x-slot name="header">
        <h2 class="font-semibold text-xl text-gray-800 dark:text-gray-200 leading-tight">
            {{ __('Gestión de Mascotas') }}
        </h2>
    </x-slot>

    <div class="py-12">
        <div class="max-w-7xl mx-auto sm:px-6 lg:px-8">
            <div class="bg-white dark:bg-gray-800 overflow-hidden shadow-xl sm:rounded-lg p-6">
                
                <div class="mb-4">
                    <a href="{{ route('mascotas.create') }}" class="bg-blue-500 hover:bg-blue-700 text-white font-bold py-2 px-4 rounded">
                        + Nueva Mascota
                    </a>
                </div>

                <table class="min-w-full divide-y divide-gray-200 dark:divide-gray-700">
                    <thead class="bg-gray-50 dark:bg-gray-700">
                        <tr>
                            <th class="px-6 py-3 text-left text-xs font-medium text-gray-500 dark:text-gray-300 uppercase tracking-wider">Mascota</th>
                            <th class="px-6 py-3 text-left text-xs font-medium text-gray-500 dark:text-gray-300 uppercase tracking-wider">Especie/Raza</th>
                            <th class="px-6 py-3 text-left text-xs font-medium text-gray-500 dark:text-gray-300 uppercase tracking-wider">Dueño</th>
                            <th class="px-6 py-3 text-left text-xs font-medium text-gray-500 dark:text-gray-300 uppercase tracking-wider">Acciones</th>
                        </tr>
                    </thead>
                    <tbody class="bg-white dark:bg-gray-800 divide-y divide-gray-200 dark:divide-gray-700">
                        @foreach ($mascotas as $mascota)
                        <tr>
                            <td class="px-6 py-4 whitespace-nowrap text-gray-900 dark:text-white">{{ $mascota->nombre }} ({{ $mascota->edad }} años)</td>
                            <td class="px-6 py-4 whitespace-nowrap text-gray-500 dark:text-gray-400">{{ $mascota->especie }} - {{ $mascota->raza }}</td>
                            <td class="px-6 py-4 whitespace-nowrap text-gray-500 dark:text-gray-400">{{ $mascota->user->name ?? 'Sin dueño' }}</td>
                            <td class="px-6 py-4 whitespace-nowrap text-sm font-medium">
                                <a href="{{ route('mascotas.edit', $mascota) }}" class="text-indigo-600 hover:text-indigo-900 mr-3">Editar</a>
                                
                                <form action="{{ route('mascotas.destroy', $mascota) }}" method="POST" class="inline">
                                    @csrf
                                    @method('DELETE')
                                    <button type="submit" class="text-red-600 hover:text-red-900" onclick="return confirm('¿Seguro que quieres borrar a esta mascota?')">
                                        Borrar
                                    </button>
                                </form>
                            </td>
                        </tr>
                        @endforeach
                    </tbody>
                </table>
                
                <div class="mt-4">
                    {{ $mascotas->links() }}
                </div>

            </div>
        </div>
    </div>
</x-app-layout>