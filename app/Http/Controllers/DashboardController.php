<?php

namespace App\Http\Controllers;

use App\Models\Mascota;
use App\Models\User;
use Illuminate\Http\Request;

class DashboardController extends Controller
{
    /**
     * Controlador para el panel principal (Dashboard).
     * Muestra resúmenes y estadísticas de mascotas y clientes.
     */
    /**
     * Display the admin dashboard with summary data.
     */
    public function index()
    {
        // Get summary data
        $totalMascotas = Mascota::count();
        $totalClientes = User::role('client')->count();
        
        // Get recent pets (limit to 10)
        $mascotas = Mascota::with('user')->latest()->take(10)->get();
        
        // Get recent clients (limit to 10)
        $clientes = User::role('client')->latest()->take(10)->get();

        return view('dashboard', compact('totalMascotas', 'totalClientes', 'mascotas', 'clientes'));
    }
}
