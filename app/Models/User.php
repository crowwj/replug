<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Foundation\Auth\User as Authenticatable;
use Illuminate\Notifications\Notifiable;

class User extends Authenticatable
{
    use HasFactory, Notifiable;

    // Tabla y primary key
    protected $table = 'usuarios';
    protected $primaryKey = 'id_usuario'; // tu columna real
    public $incrementing = true;
    public $timestamps = false;

    // Columnas que se pueden llenar masivamente
    protected $fillable = [
        'nombre',
        'correo',
        'telefono',
        'contrasena',
    ];

    // Ocultar campos sensibles
    protected $hidden = [
        'contrasena',
        // 'remember_token', // ya no usamos remember_token
    ];

    // Devuelve la contraseña para Auth
    public function getAuthPassword()
    {
        return $this->contrasena;
    }

    // Deshabilitar remember_token
    public function getRememberTokenName()
    {
        return null;
    }

    public function setRememberToken($value)
    {
        // no hace nada
    }

    public function getRememberToken()
    {
        return null;
    }

    // Opcional: username para login
    public function username()
    {
        return 'correo';
    }

    // Casts si quieres
    protected $casts = [
        'correo' => 'string',
        // 'contrasena' => 'hashed', // no usar, Laravel ya maneja Hash::make
    ];
}