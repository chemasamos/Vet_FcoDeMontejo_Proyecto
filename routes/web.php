<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\MascotaController;

// Ruta pública (Bienvenida)
Route::get('/', function () {
    return view('welcome');
});

// Rutas protegidas (Solo usuarios logueados)
Route::middleware([
    'auth:sanctum',
    config('jetstream.auth_session'),
    'verified',
])->group(function () {

    // Dashboard general
    Route::get('/dashboard', function () {
        return view('dashboard');
    })->name('dashboard');

    // GRUPO DE RUTAS SOLO PARA ADMIN Y STAFF (Veterinarios)
    // Usamos el middleware de Spatie 'role'
    Route::middleware(['role:admin|staff'])->group(function () {
        
        // Rutas automáticas para el CRUD de Mascotas
        // (Index, Create, Store, Show, Edit, Update, Destroy)
        Route::resource('mascotas', MascotaController::class);
        
        // Aquí podrías agregar más rutas de gestión en el futuro
    });

});