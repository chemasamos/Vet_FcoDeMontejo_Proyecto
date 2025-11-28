<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\MascotaController;
use App\Http\Controllers\UserController;
use App\Http\Controllers\ClienteController;
use App\Http\Controllers\DashboardController;

/**
 * Definición de rutas web.
 * Contiene todas las rutas de la aplicación, incluyendo autenticación y recursos protegidos.
 */

// Ruta pública (Bienvenida) - redirige a dashboard si está autenticado
Route::get('/', function () {
    return auth()->check() ? redirect('/dashboard') : view('welcome');
});

// Rutas protegidas (Solo usuarios logueados)
Route::middleware([
    'auth:sanctum',
    config('jetstream.auth_session'),
    'verified',
])->group(function () {

    // Dashboard general (vista resumen)
    Route::get('/dashboard', [DashboardController::class, 'index'])->name('dashboard');

    // --- MÓDULO DE MASCOTAS ---
    // Accesible para Admin y Staff (Veterinarios)
    Route::middleware(['role:admin|staff'])->group(function () {
        Route::resource('mascotas', MascotaController::class);
    });

    // --- GESTIÓN DE CLIENTES ---
    // Accesible ÚNICAMENTE para el Admin
    Route::middleware(['role:admin'])->group(function () {
        Route::resource('clientes', ClienteController::class);
    });

    // --- GESTIÓN DE ADMINISTRADORES ---
    // Accesible ÚNICAMENTE para el Admin (Dueño)
    Route::middleware(['role:admin'])->group(function () {
        Route::resource('administradores', UserController::class)->parameters([
            'administradores' => 'user'
        ]);
    });

});