<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class carrito extends Model
{
    protected $table = 'carrito';
    public $timestamps = false; 
    protected $primaryKey = 'id_carrito';
    protected $fillable = [ 
        'fecha_creacion', 
        'Usuarios_id_usuario',
    ];
}


