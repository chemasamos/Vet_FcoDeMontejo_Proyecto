{{--
    Vista de edición de administradores/staff.
    Formulario para modificar los datos y roles de un usuario administrativo.
--}}
<x-app-layout>
    <x-slot name="header">
        <h2 class="font-semibold text-xl text-gray-800 dark:text-gray-200 leading-tight">Editar Administrador</h2>
    </x-slot>

    <div class="py-12">
        <div class="max-w-7xl mx-auto sm:px-6 lg:px-8">
            <div class="bg-white dark:bg-gray-800 p-6 shadow-xl sm:rounded-lg">
                <form action="{{ route('administradores.update', $user) }}" method="POST">
                    @csrf @method('PUT')
                    
                    <div class="mb-4">
                        <label class="block text-gray-700 dark:text-gray-300 font-bold mb-2">Nombre</label>
                        <input type="text" name="name" value="{{ $user->name }}" class="w-full rounded-md dark:bg-gray-900 dark:text-white border-gray-300" required>
                    </div>

                    <div class="mb-4">
                        <label class="block text-gray-700 dark:text-gray-300 font-bold mb-2">Email</label>
                        <input type="email" name="email" value="{{ $user->email }}" class="w-full rounded-md dark:bg-gray-900 dark:text-white border-gray-300" required>
                    </div>

                    <div class="mb-4">
                        <label class="block text-gray-700 dark:text-gray-300 font-bold mb-2">Contraseña (Dejar en blanco para no cambiar)</label>
                        <input type="password" name="password" class="w-full rounded-md dark:bg-gray-900 dark:text-white border-gray-300">
                    </div>

                    <div class="mb-4">
                        <label class="block text-gray-700 dark:text-gray-300 font-bold mb-2">Rol</label>
                        <select name="role" class="w-full rounded-md dark:bg-gray-900 dark:text-white border-gray-300">
                            @foreach($roles as $role)
                                <option value="{{ $role->name }}" {{ $user->hasRole($role->name) ? 'selected' : '' }}>
                                    {{ ucfirst($role->name) }}
                                </option>
                            @endforeach
                        </select>
                    </div>

                    <button type="submit" class="bg-blue-500 text-white font-bold py-2 px-4 rounded">Actualizar</button>
                </form>
            </div>
        </div>
    </div>
</x-app-layout>