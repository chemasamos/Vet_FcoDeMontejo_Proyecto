<?php

namespace App\Http\Controllers;

use App\Models\Mascota;
use App\Models\User;
use Illuminate\Http\Request;

class MascotaController extends Controller
{
    // Listar Mascotas
    public function index()
    {
        // Traemos las mascotas con la información de su dueño
        $mascotas = Mascota::with('user')->paginate(10);
        return view('mascotas.index', compact('mascotas'));
    }

    // Formulario de Crear
    public function create()
    {
        // Necesitamos la lista de clientes para asignarle la mascota a uno
        // Usamos el scope de Spatie para traer solo usuarios con rol 'client'
        // Si no te sale nadie, asegúrate de tener usuarios con ese rol en la BD
        $clientes = User::role('client')->get(); 
        
        // Si no usas roles estrictos aun, usa: $clientes = User::all();
        
        return view('mascotas.create', compact('clientes'));
    }

    // Guardar en BD
    public function store(Request $request)
    {
        // 1. Validar
        $request->validate([
            'nombre' => 'required|string|max:255',
            'especie' => 'required|string|max:100',
            'edad' => 'required|integer|min:0',
            'user_id' => 'required|exists:users,id', // El dueño debe existir
        ]);

        // 2. Crear
        Mascota::create($request->all());

        // 3. Redirigir
        return redirect()->route('mascotas.index');
    }

    // Ver detalle (Opcional, por ahora redirigimos al edit)
    public function show(Mascota $mascota)
    {
        return redirect()->route('mascotas.edit', $mascota);
    }

    // Formulario de Editar
    public function edit(Mascota $mascota)
    {
        $clientes = User::role('client')->get();
        return view('mascotas.edit', compact('mascota', 'clientes'));
    }

    // Actualizar en BD
    public function update(Request $request, Mascota $mascota)
    {
        $request->validate([
            'nombre' => 'required|string|max:255',
            'especie' => 'required|string|max:100',
            'edad' => 'required|integer|min:0',
            'user_id' => 'required|exists:users,id',
        ]);

        $mascota->update($request->all());

        return redirect()->route('mascotas.index');
    }

    // Eliminar
    public function destroy(Mascota $mascota)
    {
        $mascota->delete();
        return redirect()->route('mascotas.index');
    }
}