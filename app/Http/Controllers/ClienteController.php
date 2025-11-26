<?php

namespace App\Http\Controllers;

use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Hash;

class ClienteController extends Controller
{
    /**
     * Display a listing of clients.
     */
    public function index()
    {
        // Only get users with 'client' role
        $clientes = User::role('client')->with('roles')->paginate(10);
        return view('clientes.index', compact('clientes'));
    }

    /**
     * Show the form for creating a new client.
     */
    public function create()
    {
        return view('clientes.create');
    }

    /**
     * Store a newly created client in storage.
     */
    public function store(Request $request)
    {
        $request->validate([
            'name' => 'required|string|max:255',
            'email' => 'required|email|unique:users,email',
            'password' => 'required|min:8',
        ]);

        // Create user
        $user = User::create([
            'name' => $request->name,
            'email' => $request->email,
            'password' => Hash::make($request->password),
        ]);

        // Always assign 'client' role
        $user->assignRole('client');

        return redirect()->route('clientes.index');
    }

    /**
     * Display the specified client.
     */
    public function show(User $cliente)
    {
        // Redirect to edit for now
        return redirect()->route('clientes.edit', $cliente);
    }

    /**
     * Show the form for editing the specified client.
     */
    public function edit(User $cliente)
    {
        // Verify this user is actually a client
        if (!$cliente->hasRole('client')) {
            abort(404);
        }
        
        return view('clientes.edit', compact('cliente'));
    }

    /**
     * Update the specified client in storage.
     */
    public function update(Request $request, User $cliente)
    {
        $request->validate([
            'name' => 'required|string|max:255',
            'email' => 'required|email|unique:users,email,' . $cliente->id,
        ]);

        // Update basic data
        $cliente->update([
            'name' => $request->name,
            'email' => $request->email,
        ]);

        // Update password if provided
        if ($request->filled('password')) {
            $cliente->update(['password' => Hash::make($request->password)]);
        }

        return redirect()->route('clientes.index')->with('success', 'Cliente actualizado exitosamente.');
    }

    /**
     * Remove the specified client from storage.
     */
    public function destroy(User $cliente)
    {
        // Verify this user is actually a client
        if (!$cliente->hasRole('client')) {
            abort(404);
        }

        $cliente->delete();
        return redirect()->route('clientes.index')->with('success', 'Cliente eliminado exitosamente.');
    }
}
