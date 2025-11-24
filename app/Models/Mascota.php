<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Mascota extends Model
{
    use HasFactory;

    protected $fillable = [
        'user_id',
        'nombre',
        'especie',
        'raza',
        'edad',
        'observaciones',
    ];

    // Relación: Una mascota pertenece a un dueño (User)
    public function user()
    {
        return $this->belongsTo(User::class);
    }
}