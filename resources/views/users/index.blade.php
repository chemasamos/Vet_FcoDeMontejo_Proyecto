<x-app-layout>
    <x-slot name="header">
        <h2 class="font-semibold text-xl text-gray-800 dark:text-gray-200 leading-tight">
            Gestión de Administradores
        </h2>
    </x-slot>

    <div class="py-12">
        <div class="max-w-7xl mx-auto sm:px-6 lg:px-8">
            <div class="bg-white dark:bg-gray-800 overflow-hidden shadow-xl sm:rounded-lg p-6">
                
                <a href="{{ route('administradores.create') }}" class="bg-green-500 hover:bg-green-700 text-white font-bold py-2 px-4 rounded mb-4 inline-block">
                    + Nuevo Administrador
                </a>

                <table class="min-w-full divide-y divide-gray-200 dark:divide-gray-700">
                    <thead class="bg-gray-50 dark:bg-gray-700">
                        <tr>
                            <th class="px-6 py-3 text-left text-xs text-gray-500 dark:text-gray-300 uppercase">Nombre</th>
                            <th class="px-6 py-3 text-left text-xs text-gray-500 dark:text-gray-300 uppercase">Email</th>
                            <th class="px-6 py-3 text-left text-xs text-gray-500 dark:text-gray-300 uppercase">Rol</th>
                            <th class="px-6 py-3 text-left text-xs text-gray-500 dark:text-gray-300 uppercase">Acciones</th>
                        </tr>
                    </thead>
                    <tbody class="divide-y divide-gray-200 dark:divide-gray-700">
                        @foreach ($users as $user)
                        <tr>
                            <td class="px-6 py-4 text-gray-900 dark:text-white">{{ $user->name }}</td>
                            <td class="px-6 py-4 text-gray-500 dark:text-gray-400">{{ $user->email }}</td>
                            <td class="px-6 py-4">
                                <span class="px-2 inline-flex text-xs leading-5 font-semibold rounded-full bg-blue-100 text-blue-800">
                                    {{ $user->getRoleNames()->first() ?? 'Sin Rol' }}
                                </span>
                            </td>
                            <td class="px-6 py-4 font-medium">
                                <a href="{{ route('administradores.edit', $user) }}" class="text-indigo-600 hover:text-indigo-900 mr-2">Editar</a>
                                <form action="{{ route('administradores.destroy', $user) }}" method="POST" class="inline">
                                    @csrf @method('DELETE')
                                    <button type="submit" class="text-red-600 hover:text-red-900" onclick="return confirm('¿Borrar administrador?')">Eliminar</button>
                                </form>
                            </td>
                        </tr>
                        @endforeach
                    </tbody>
                </table>
            </div>
        </div>
    </div>
</x-app-layout>