@if ($errors->any())
    <div {{ $attributes }}>
        <div class="font-medium text-red-600 dark:text-red-400">¡Ups! Algo salió mal.</div>

        <ul class="mt-3 list-disc list-inside text-sm text-red-600 dark:text-red-400">
            @foreach ($errors->all() as $error)
                <li>{{ str_replace(
                    ['The email has already been taken.', 'The password field is required.', 'The email field is required.', 'The name field is required.'],
                    ['El correo electrónico ya está registrado. Por favor usa uno diferente.', 'El campo contraseña es obligatorio.', 'El campo correo electrónico es obligatorio.', 'El campo nombre es obligatorio.'],
                    $error
                ) }}</li>
            @endforeach
        </ul>
    </div>
@endif
