<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    /**
     * Run the migrations.
     */
    public function up(): void
    {
        Schema::create('mascotas', function (Blueprint $table) {
            $table->id();

            // Relación: Una mascota pertenece a un Usuario (el dueño)
            $table->foreignId('user_id')->constrained()->onDelete('cascade');
            
            // Datos de la mascota
            $table->string('nombre');
            $table->string('especie'); // Perro, Gato, Conejo...
            $table->string('raza')->nullable(); // nullable porque a veces son mestizos
            $table->integer('edad'); // Edad en años
            $table->text('observaciones')->nullable(); // Notas médicas o alergias
            
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('mascotas');
    }
};