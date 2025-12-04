<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Pedido extends Model
{

    use HasFactory;
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

    public function detalles()
    {
        // El primer argumento es el modelo relacionado (PedidoDetalle)
        // El segundo argumento es la foreign key en la tabla pedido_detalle ('pedidos_id_pedidos')
        // El tercer argumento es la local key en la tabla pedidos ('id_pedidos')
        return $this->hasMany(PedidoDetalle::class, 'pedidos_id_pedidos', 'id_pedidos');
    }

    /**
     * Relación: Un pedido pertenece a un usuario (asumiendo que User es el modelo de usuario).
     */
    public function usuario()
    {
        return $this->belongsTo(User::class, 'Usuarios_id_usuario', 'id_usuario');
    }
}

