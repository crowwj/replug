<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Foundation\Auth\User as Authenticatable;
use Illuminate\Notifications\Notifiable;

class User extends Authenticatable
{
    use HasFactory, Notifiable;

    protected $table = 'usuarios';
    protected $primaryKey = 'id_usuario';
    public $incrementing = true;
    public $timestamps = false;

    protected $fillable = [ //Columnas que se pueden llenar masivamente
        'nombre',
        'correo',
        'telefono',
        'contrasena',
    ];

    protected $hidden = [// Ocultar campos sensibles
        'contrasena',
    ];

    public function getAuthPassword()//para que Auth use contrasena en lugar de password
    {
        return $this->contrasena;
    }

    public function getRememberTokenName()//Deshabilita columna que intenta buscar en usuarios pero que no existe. Para evitar error de Token precoz.
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

    public function username()
    {
        return 'correo';
    }

    protected $casts = [
        'correo' => 'string',
    ];
}