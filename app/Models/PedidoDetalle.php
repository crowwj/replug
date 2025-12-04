<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class PedidoDetalle extends Model
{
    use HasFactory;
    protected $table = 'pedido_detalle';
    protected $primaryKey = 'id_pedido_detalle';
    public $timestamps = false; // Asumiendo que esta tabla no tiene timestamps

    protected $fillable = [
        'pedidos_id_pedidos',
        'productos_id_producto',
        'cantidad',
        'precio_unitario',
    ];

    /**
     * Relación: Un detalle pertenece a un producto.
     * Esto resuelve el error "Call to undefined relationship [producto]".
     */
    public function producto()
    {
        // El detalle pertenece a un Producto (modelo Producto).
        // La clave foránea en esta tabla es 'productos_id_producto'.
        // La clave local en la tabla productos es 'id_producto'.
        return $this->belongsTo(Producto::class, 'productos_id_producto', 'id_producto');
    }

    /**
     * Relación: Un detalle pertenece a un pedido.
     */
    public function pedido()
    {
        return $this->belongsTo(Pedido::class, 'pedidos_id_pedidos', 'id_pedidos');
    }
}