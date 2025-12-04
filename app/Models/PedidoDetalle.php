<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class PedidoDetalle extends Model
{
    protected $table = 'pedido_detalle';
    public $timestamps = false; 
    protected $primaryKey = 'id_pedido_detalle';
    protected $fillable = [ 
        'cantidad', 
        'precio_unitario',
        'pedidos_id_pedidos',
        'productos_id_producto',
    ];
}

