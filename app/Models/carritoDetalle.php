<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class carritoDetalle extends Model
{
    protected $table = 'carrito_detalle';
    public $timestamps = false; 
    protected $primaryKey = 'id_carrito_detalle';
    protected $fillable = [ 
        'cantidad', 
        'precio_unitario',
        'precio_unitario',
        'carrito_id_carrito',
        'productos_id_producto',
    ];
}


