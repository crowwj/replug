<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Pedido extends Model
{
    protected $table = 'pedidos';
    public $timestamps = false; 
    protected $primaryKey = 'id_pedidos';
    protected $fillable = [ 
        'fecha_pedido', 
        'estado',
        'fecha_llegada_estimada',
        'fecha_llegada_real',
        'Usuarios_id_usuario',
    ];
}

