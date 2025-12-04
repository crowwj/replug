<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Carrito;
use App\Models\CarritoDetalle;
use App\Models\Pedido;
use App\Models\PedidoDetalle;
use App\Models\Producto;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Collection;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Session;
use Illuminate\Support\Facades\Log;

class CarritoController extends Controller
{
    protected function obtenerDatosCarrito()
    {
        $idUsuario = session('id_usuario');
        $idCarrito = Carrito::where('Usuarios_id_usuario', $idUsuario)->value('id_carrito');

        if (!$idCarrito) {
            return [
                'productoscar' => collect(), 
                'total' => 0.00,
                'cantidadT' => 0 
            ]; 
        }

        // Obtener datos consolidados con el stock máximo para validación en la vista
        $productoscar = CarritoDetalle::select([
            'carrito_detalle.id_carrito_detalle', // CLAVE para la actualización interactiva
            'carrito_detalle.productos_id_producto',
            'productos.nombre',
            'productos.stock as stock_maximo', // Stock del producto real
            'carrito_detalle.cantidad', // Cantidad consolidada
            'carrito_detalle.precio_unitario',
            'imagen'
        ])
        ->join('productos', 'productos.id_producto', '=', 'carrito_detalle.productos_id_producto')
        ->where('carrito_detalle.carrito_id_carrito', $idCarrito)
        ->get();
        
        $total = $productoscar->sum(function ($item) {
            return $item->cantidad * $item->precio_unitario;
        });
        
        $cantidadT = $productoscar->sum('cantidad');

        return [
            'productoscar' => $productoscar,
            'total' => $total,
            'cantidadT' => $cantidadT
        ];
    }

    /**
     * Muestra la vista del carrito.
     */
    public function desplegarproductos()
    {
        if (!session()->has('id_usuario')) {
            return redirect()->route('login')->with('error', 'Debes iniciar sesión.');
        }

        $datos = $this->obtenerDatosCarrito();

        return view('contenido.carrito', $datos); 
    }
    
    /**
     * Agrega o actualiza la cantidad de un producto en el carrito (CONSOLIDACIÓN).
     */
    public function agregaralcarrito(Request $producto)
    {
        $idCarrito = $producto->input('id_carrito');
        $idProducto = $producto->input('id_producto');
        $cantidadNueva = $producto->input('cantidad');

        // Validaciones iniciales
        $producto->validate([
            'cantidad' => 'required|integer|min:1',
            'id_producto' => 'required|integer|min:0',
            'precio' => 'required|numeric|min:0.01|max:9999999999.99',
            'id_carrito' => 'required|integer|min:0',
        ]);
        
        // 1. BUSCAR CANTIDAD ACTUAL
        $cantidadActual = CarritoDetalle::where('carrito_id_carrito', $idCarrito)
            ->where('productos_id_producto', $idProducto)
            ->value('cantidad') ?? 0;
            
        // 2. CALCULAR CANTIDAD FINAL
        $cantidadFinal = $cantidadActual + $cantidadNueva;
        
        // 3. OBTENER STOCK Y VALIDAR
        $ProductoStockTotal = Producto::where('id_producto', $idProducto)->value('stock');
        
        if ($ProductoStockTotal === null) {
            return back()->with('error', 'Producto no encontrado o sin stock definido.');
        }

        if ($cantidadFinal > $ProductoStockTotal)
        {
            return back()->with('error', 'La cantidad total (' . $cantidadFinal . ') excede el stock disponible (' . $ProductoStockTotal . ').');
        }
        
        // 4. CREAR O ACTUALIZAR (CONSOLIDAR)
        CarritoDetalle::updateOrCreate(
            [
                'carrito_id_carrito' => $idCarrito, 
                'productos_id_producto' => $idProducto
            ],
            [
                'cantidad' => $cantidadFinal, 
                'precio_unitario' => $producto->input('precio'), 
            ]
        );
        
        return back()->with('success', 'Producto agregado al carrito. Cantidad total: ' . $cantidadFinal);
    }

    /**
     * Maneja las peticiones AJAX/Fetch de la vista para actualizar la cantidad (+/-).
     */
    public function actualizarCantidad(Request $request)
    {
        try {
            $request->validate([
                'id_detalle' => 'required|integer',
                'nueva_cantidad' => 'required|integer|min:0', // El 0 es para permitir la eliminación
            ]);

            $idDetalle = $request->input('id_detalle');
            $nuevaCantidad = $request->input('nueva_cantidad');

            $detalle = CarritoDetalle::find($idDetalle);

            if (!$detalle) {
                return response()->json(['success' => false, 'message' => 'Detalle de carrito no encontrado.'], 404);
            }
            
            // 1. Obtener Stock del producto real para re-validar
            $ProductoStockTotal = Producto::where('id_producto', $detalle->productos_id_producto)->value('stock');
            
            if ($ProductoStockTotal === null) {
                return response()->json(['success' => false, 'message' => 'Producto asociado no encontrado.'], 404);
            }

            // 2. Validar Máximo
            if ($nuevaCantidad > $ProductoStockTotal) {
                return response()->json([
                    'success' => false, 
                    'message' => 'Cantidad excede el stock disponible (' . $ProductoStockTotal . ').'
                ], 400);
            }
            
            // 3. Validar Mínimo (si es 0, se elimina)
            if ($nuevaCantidad > 0) {
                $detalle->cantidad = $nuevaCantidad;
                $detalle->save();
                return response()->json(['success' => true, 'message' => 'Cantidad actualizada.'], 200);
            } else {
                // Si la cantidad es 0 o menos, eliminar el registro del detalle
                $detalle->delete();
                return response()->json(['success' => true, 'message' => 'Producto eliminado del carrito.'], 200);
            }
        } catch (\Illuminate\Validation\ValidationException $e) {
            // Error de validación de Laravel (ej. faltan datos en el JSON)
            return response()->json(['success' => false, 'message' => 'Error de validación: ' . $e->getMessage()], 422);
        } catch (\Exception $e) {
            // Cualquier otro error, como un error de base de datos
            return response()->json(['success' => false, 'message' => 'Error interno del servidor: ' . $e->getMessage()], 500);
        }
    }

    public function eliminarproducto(int $detalle)
    {
        try {
            $item = CarritoDetalle::findOrFail($detalle);
            $item->delete();
            return redirect()->route('desplegar') ->with('success', 'El producto fue eliminado del carrito.');

        } catch (\Exception $e) {
            \Log::error("Error al eliminar detalle del carrito ID {$detalle}: " . $e->getMessage());
            
            return redirect()->back()
                             ->with('error', 'No se pudo eliminar el ítem del carrito. Por favor, inténtalo de nuevo.');
        }
    }

    public function eliminarDetalle(int $detalle)
    {
        try {
            // 1. Encontrar el registro del detalle del carrito por su clave primaria.
            $item = CarritoDetalle::findOrFail($detalle);
            
            // 2. Ejecutar la eliminación.
            $item->delete();

            // 3. Redirige de vuelta al carrito con un mensaje de éxito.
            return redirect()->route('carrito.index') 
                             ->with('success', 'El producto fue eliminado del carrito exitosamente.');

        } catch (\Exception $e) {
            // Manejo de error si el registro no existe o hay un problema de DB.
            Log::error("Error al eliminar detalle del carrito ID {$detalle}: " . $e->getMessage());
            
            // 4. Si hay un error REAL, mostramos este mensaje.
            return redirect()->back()
                             ->with('error', 'Error al procesar la eliminación. Revisa los logs.');
        }
    }

    /**
     * Mueve todos los productos del carrito actual a un nuevo pedido, 
     * ejecutando una transacción de base de datos.
     * @param Request $request
     * @return \Illuminate\Http\Response
     */
    public function confirmarCompra(Request $request)
    {
        // 1. Obtener el ID del usuario actual. 
        $userId = Auth::id();
        if (!$userId) {
            return redirect()->route('login')->with('error', 'Debes iniciar sesión para completar la compra.');
        }

        // 2. Obtener el ID del carrito principal del usuario.
        $carrito = Carrito::where('Usuarios_id_usuario', $userId)->first();
        
        if (!$carrito) {
             return redirect()->back()->with('error', 'No se encontró un carrito activo para este usuario.');
        }

        // 3. Obtener los detalles del carrito del usuario.
        $detallesCarrito = CarritoDetalle::where('carrito_id_carrito', $carrito->id_carrito)->get();

        if ($detallesCarrito->isEmpty()) {
            return redirect()->back()->with('error', 'Tu carrito está vacío. Añade productos para comprar.');
        }
        
        // 4. Iniciar la transacción de base de datos para asegurar atomicidad
        DB::beginTransaction();

        try {
            // 5. Crear el Pedido principal
            $nuevoPedido = Pedido::create([
                'Usuarios_id_usuario' => $userId,
                'estado' => 'pendiente', 
            ]);

            // 6. Mover los detalles del carrito a los detalles del pedido y ACTUALIZAR EL STOCK
            $detallesParaEliminar = [];
            foreach ($detallesCarrito as $detalle) {
                
                // Crear el registro en pedido_detalle
                PedidoDetalle::create([
                    'pedidos_id_pedidos' => $nuevoPedido->id_pedidos,
                    'productos_id_producto' => $detalle->productos_id_producto,
                    'cantidad' => $detalle->cantidad,
                    'precio_unitario' => $detalle->precio_unitario,
                ]);
                
                // *** INICIO: Lógica para descontar stock ***
                $producto = Producto::find($detalle->productos_id_producto);
                if ($producto) {
                    $producto->stock -= $detalle->cantidad;
                    // Esto fallará si el stock cae por debajo de cero y tienes una regla de DB.
                    // La validación se hace al añadir, pero es un buen punto de control.
                    $producto->save(); 
                }
                // *** FIN: Lógica para descontar stock ***

                // Guardar el ID del detalle del carrito para eliminarlo
                $detallesParaEliminar[] = $detalle->id_carrito_detalle;
            }

            // 7. Eliminar todos los detalles del carrito del usuario
            CarritoDetalle::destroy($detallesParaEliminar);

            // 8. Confirmar la transacción: Si todo salió bien, guardamos los cambios.
            DB::commit();

            // 9. Redirigir a una vista de éxito o de listado de pedidos
            // **IMPORTANTE**: Cambia 'nombre_de_tu_ruta_pedidos' por la ruta real.
            return redirect()->route('nombre_de_tu_ruta_pedidos') 
                             ->with('success', '¡Compra realizada con éxito! Tu pedido #' . $nuevoPedido->id_pedidos . ' ha sido procesado.');

        } catch (\Exception $e) {
            // 10. Revertir todos los cambios de la transacción si algo falló.
            DB::rollBack();

            Log::error("Error FATAL al confirmar la compra para el usuario {$userId}: " . $e->getMessage());
            
            return redirect()->back()->with('error', 'Error crítico al procesar la compra. Tu carrito no fue vaciado. Inténtalo de nuevo.');
        }
    }

    /**
     * Procesa la compra de un único producto directamente, sin pasar por el carrito.
     * Esta es la función para el botón "Comprar ahora".
     * @param Request $request Debe contener 'id_producto' y 'cantidad'.
     * @return \Illuminate\Http\Response
     */
    public function comprarDirecto(Request $request)
    {
        // 1. Validar datos de entrada
        $request->validate([
            'id_producto' => 'required|exists:productos,id_producto',
            'cantidad' => 'required|integer|min:1',
        ]);

        $userId = Auth::id();
        if (!$userId) {
            return redirect()->route('login')->with('error', 'Debes iniciar sesión para completar la compra.');
        }

        $idProducto = $request->id_producto;
        $cantidad = $request->cantidad;
        
        // 2. Obtener el precio actual del producto (siempre desde la DB, no del HTML)
        $producto = Producto::find($idProducto);
        if (!$producto) {
            return redirect()->back()->with('error', 'Producto no encontrado o inválido.');
        }

        // Validar stock antes de empezar la transacción (doble chequeo)
        if ($cantidad > $producto->stock) {
            return redirect()->back()->with('error', 'Lo sentimos, la cantidad solicitada (' . $cantidad . ') excede el stock disponible (' . $producto->stock . ').');
        }

        $precioUnitario = $producto->precio;

        // 3. Iniciar la transacción para asegurar atomicidad
        DB::beginTransaction();

        try {
            // 4. Crear el Pedido principal
            $nuevoPedido = Pedido::create([
                'Usuarios_id_usuario' => $userId,
                'estado' => 'pendiente',
            ]);

            // 5. Crear el Pedido Detalle para el único producto comprado
            PedidoDetalle::create([
                'pedidos_id_pedidos' => $nuevoPedido->id_pedidos,
                'productos_id_producto' => $idProducto,
                'cantidad' => $cantidad,
                'precio_unitario' => $precioUnitario,
            ]);
            
            // *** INICIO: Lógica para descontar stock ***
            $producto->stock -= $cantidad;
            $producto->save();
            // *** FIN: Lógica para descontar stock ***

            // 6. Confirmar la transacción
            DB::commit();

            // 7. Redirigir a una vista de éxito o de listado de pedidos
            return redirect()->back() 
                             ->with('success', "¡Compra directa exitosa! Tu pedido simple (#{$nuevoPedido->id_pedidos}) ha sido procesado y el stock actualizado.");

        } catch (\Exception $e) {
            // 8. Revertir y loguear
            DB::rollBack();

            Log::error("Error al procesar compra directa para el usuario {$userId}: " . $e->getMessage());
            
            return redirect()->back()->with('error', 'Error al procesar la compra directa. Inténtalo de nuevo. Error: ' . $e->getMessage());
        }
    }

    public function desplegarpedidos()
    {
        // Lógica de desplegar pedidos (aún por implementar)
        if (!session()->has('id_usuario')) {
            return redirect()->route('login')->with('error', 'Debes iniciar sesión.');
        }
        
    }
}