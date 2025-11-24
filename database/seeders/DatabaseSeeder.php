<?php

namespace Database\Seeders;

use App\Models\User;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use Spatie\Permission\Models\Role; // <--- AGREGADO: Importar modelo de Roles

class DatabaseSeeder extends Seeder
{
    use WithoutModelEvents;

    /**
     * Seed the application's database.
     */
    public function run(): void
    {
        // 1. Crear los Roles del sistema
        $roleAdmin  = Role::create(['name' => 'admin']);
        $roleStaff  = Role::create(['name' => 'staff']);  // Veterinarios
        $roleClient = Role::create(['name' => 'client']); // Dueños de mascotas

        // 2. Crear el Super Admin (TÚ)
        $admin = User::factory()->create([
            'name' => 'Administrador',
            'email' => 'admin@veterinaria.com',
            'password' => bcrypt('password'), // La contraseña será 'password'
        ]);
        $admin->assignRole($roleAdmin);

        // 3. Crear un Veterinario de prueba (Staff)
        $vet = User::factory()->create([
            'name' => 'Dr. House',
            'email' => 'vet@veterinaria.com',
            'password' => bcrypt('password'),
        ]);
        $vet->assignRole($roleStaff);

        // 4. Crear un Cliente de prueba (Dueño de mascota)
        $cliente = User::factory()->create([
            'name' => 'Juan Dueño',
            'email' => 'cliente@veterinaria.com',
            'password' => bcrypt('password'),
        ]);
        $cliente->assignRole($roleClient);
    }
}