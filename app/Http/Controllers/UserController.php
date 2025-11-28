<?php

namespace App\Http\Controllers;

use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Hash;
use Spatie\Permission\Models\Role;

class UserController extends Controller
{
    /**
     * Controlador para la gestión de usuarios administrativos.
     * Maneja el CRUD para usuarios con roles de 'admin' y 'staff'.
     */
    // Listar usuarios (solo administradores y staff)
    public function index()
    {
        // Exclude clients - only show admin and staff
        $users = User::role(['admin', 'staff'])->with('roles')->paginate(10);
        return view('users.index', compact('users'));
    }

    // Formulario de Crear
    public function create()
    {
        // Only allow admin and staff roles (not client)
        $roles = Role::whereIn('name', ['admin', 'staff'])->get();
        return view('users.create', compact('roles'));
    }

    // Guardar nuevo usuario
    public function store(Request $request)
    {
        $request->validate([
            'name' => 'required|string|max:255',
            'email' => 'required|email|unique:users,email',
            'password' => 'required|min:8',
            'role' => 'required|exists:roles,name', // Validar que el rol exista
        ]);

        // Crear usuario
        $user = User::create([
            'name' => $request->name,
            'email' => $request->email,
            'password' => Hash::make($request->password),
        ]);

        // Asignar el rol seleccionado
        $user->assignRole($request->role);

        return redirect()->route('administradores.index');
    }

    // Formulario de Editar
    public function edit(User $user)
    {
        // Only allow admin and staff roles (not client)
        $roles = Role::whereIn('name', ['admin', 'staff'])->get();
        return view('users.edit', compact('user', 'roles'));
    }

    // Actualizar usuario
    public function update(Request $request, User $user)
    {
        $request->validate([
            'name' => 'required|string|max:255',
            'email' => 'required|email|unique:users,email,' . $user->id,
            'role' => 'required|exists:roles,name',
        ]);

        // Actualizar datos básicos
        $user->update([
            'name' => $request->name,
            'email' => $request->email,
        ]);

        // Si escribieron password nuevo, lo actualizamos (si no, lo dejamos igual)
        if ($request->filled('password')) {
            $user->update(['password' => Hash::make($request->password)]);
        }

        // Actualizar el rol (Sync quita los viejos y pone el nuevo)
        $user->syncRoles([$request->role]);

        return redirect()->route('administradores.index');
    }

    // Eliminar usuario
    public function destroy(User $user)
    {
        // Evitar que te borres a ti mismo por accidente
        if (auth()->id() == $user->id) {
            return redirect()->route('administradores.index')->with('error', 'No puedes borrar tu propia cuenta.');
        }

        // 3. Mensaje al intentar eliminar un usuario (Admin o Staff)
        if ($user->hasRole(['admin', 'staff'])) {
            return redirect()->route('administradores.index')->with('error', 'No puedes borrar este usuario porque es parte del personal administrativo.');
        }

        $user->delete();
        return redirect()->route('administradores.index');
    }
}