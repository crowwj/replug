<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\cp;
use App\Models\carrito;
use App\Models\carritoDetalle;

class CarritoController extends Controller
{
    public function agregaralcarrito(Request $producto)
    {
        $producto->validate([
        'cantidad' => 'required|integer|min:1',
        'id_producto' => 'required|integer|min:0',
        'precio' => 'required|numeric|min:0.01|max:9999999999.99',
        'id_carrito' => 'required|integer|min:0',
        ]);

        $producto = carritoDetalle::create([
            'cantidad' => $producto->input('cantidad'),
            'precio_unitario' => $producto->input('precio'),
            'carrito_id_carrito' => $producto->input('id_carrito'),
            'productos_id_producto' => $producto->input('id_producto'),
        ]);
        return back()->with('success', 'Producto agregado al carrito.');
    }
}
