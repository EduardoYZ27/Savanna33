<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Foundation\Auth\User as Authenticatable;
use Illuminate\Notifications\Notifiable;

class Usuario extends Authenticatable
{
    use HasFactory, Notifiable;

    protected $table = 'usuario'; // Asegura que Laravel use la tabla correcta

    protected $fillable = [
        'nombre',
        'apellido_paterno',
        'apellido_materno',
        'numero_empleado',
        'password',
        'rol',
    ];

    // Desactiva el manejo de created_at y updated_at
    public $timestamps = false;

    protected $hidden = [
        'password', // Ocultar la contraseña en las respuestas JSON
        'remember_token',
    ];
}
