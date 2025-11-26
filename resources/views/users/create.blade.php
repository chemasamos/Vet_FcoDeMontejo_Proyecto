<x-app-layout>
    <x-slot name="header">
        <h2 class="font-semibold text-xl text-gray-800 dark:text-gray-200 leading-tight">Registrar Administrador</h2>
    </x-slot>

    <div class="py-12">
        <div class="max-w-7xl mx-auto sm:px-6 lg:px-8">
            <div class="bg-white dark:bg-gray-800 p-6 shadow-xl sm:rounded-lg">
                <form action="{{ route('administradores.store') }}" method="POST">
                    @csrf
                    
                    <div class="mb-4">
                        <label class="block text-gray-700 dark:text-gray-300 font-bold mb-2">Nombre</label>
                        <input type="text" name="name" class="w-full rounded-md dark:bg-gray-900 dark:text-white border-gray-300" required>
                    </div>

                    <div class="mb-4">
                        <label class="block text-gray-700 dark:text-gray-300 font-bold mb-2">Email</label>
                        <input type="email" name="email" class="w-full rounded-md dark:bg-gray-900 dark:text-white border-gray-300" required>
                    </div>

                    <div class="mb-4">
                        <label class="block text-gray-700 dark:text-gray-300 font-bold mb-2">Contraseña</label>
                        <input type="password" name="password" class="w-full rounded-md dark:bg-gray-900 dark:text-white border-gray-300" required>
                    </div>

                    <div class="mb-4">
                        <label class="block text-gray-700 dark:text-gray-300 font-bold mb-2">Rol</label>
                        <select name="role" class="w-full rounded-md dark:bg-gray-900 dark:text-white border-gray-300">
                            @foreach($roles as $role)
                                <option value="{{ $role->name }}">{{ ucfirst($role->name) }}</option>
                            @endforeach
                        </select>
                    </div>

                    <button type="submit" class="bg-blue-500 text-white font-bold py-2 px-4 rounded">Guardar</button>
                </form>
            </div>
        </div>
    </div>
</x-app-layout>

#hola