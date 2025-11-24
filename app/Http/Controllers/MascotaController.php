<?php

namespace App\Http\Controllers;

use App\Models\Mascota;
use Illuminate\Http\Request;

class MascotaController extends Controller
{
    // Mostrar lista de mascotas
    public function index()
    {
        // Traemos todas las mascotas con su dueño
        $mascotas = Mascota::with('user')->get();
        return "Aquí irá el listado de mascotas (Próximamente)";
        // return view('mascotas.index', compact('mascotas')); <-- Mañana activamos esto
    }

    // Mostrar formulario de crear
    public function create()
    {
        return "Aquí irá el formulario de crear mascota";
    }

    // Guardar en base de datos
    public function store(Request $request)
    {
        // Validar y guardar (Lo haremos mañana)
    }

    public function show(Mascota $mascota)
    {
        return "Viendo mascota: " . $mascota->nombre;
    }

    public function edit(Mascota $mascota)
    {
        return "Editando mascota: " . $mascota->nombre;
    }

    public function update(Request $request, Mascota $mascota)
    {
        // Actualizar
    }

    public function destroy(Mascota $mascota)
    {
        // Eliminar
    }
}