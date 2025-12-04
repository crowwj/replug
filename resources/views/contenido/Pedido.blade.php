<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    {{-- Archivo de estilos personalizado --}}
    <link rel="stylesheet" href="{{ asset('contenido.css') }}" /> 
    
    {{-- Iconos Font Awesome --}}
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.0.0/css/all.min.css" xintegrity="sha512-9usAa10IRO0HhonpyAIVpjrylPvoDwiPUiKdWk5t3PyolY1cOd4DSE0Ga+ri4AuTroPR5aQvXU9xC6qOPnzFeg==" crossorigin="anonymous" referrerpolicy="no-referrer" />
    
    {{-- Bootstrap (solo si las clases Tailwind no están disponibles, lo mantengo por si acaso) --}}
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.8/dist/css/bootstrap.min.css" rel="stylesheet" xintegrity="sha384-sRIl4kxILFvY47J16cr9ZwB07vP4J8+LH7qKQnuqkuIAvNWLzeN8tE5YBujZqJLB" crossorigin="anonymous">
    
    <title>Mis Compras</title>
</head>
{{-- Se aplica la clase CuerpoPadrePedidos definida en el CSS --}}
<body class="CuerpoPadrePedidos">
    
    {{-- ==================================== --}}
    {{-- BARRA DE NAVEGACIÓN (HEADER) --}}
    {{-- ==================================== --}}
    <nav class="barra-ayuda">   
        {{-- Se aplica la clase botonInicioBarra definida en el CSS --}}
       <a href="{{ route('productosbusqueda') }}" style="text-decoration: none; color: white; font-size: 20px;" class="botonInicioBarra">Inicio</a>
        <div class="menu-derecha"> 
            <div class="carrito2">
                <a href="{{ route('desplegar') }}"> <i class="fa-solid fa-cart-shopping"></i> Mi carrito </a>
            </div>
            <div class="vender">
                <a href="{{ route('micuenta') }}"><i class="fa-solid fa-hand-holding-dollar"></i> Vender Producto</a>
            </div>
            <div class="cerrar">
                <div class="d-flex align-items-center" class="cerrar">
                <a class="dropdown-item" href="{{ route('cerrarsesion') }}"onclick="event.preventDefault(); document.getElementById('logout-form').submit();" style="text-decoration: none; color: white; font-size: 16px; width:auto;  background-color: #422e60; padding: 10px;  border-radius: 10px;  box-shadow: 0 2px 4px rgba(0, 0, 0, 0.2); "> Cerrar sesión </a>
                    <form id="logout-form" action="{{ route('cerrarsesion') }}" method="POST" class="d-none">@csrf</form>   
            </div>
            </div>
        </div>
    </nav>

    {{-- ==================================== --}}
    {{-- CONTENEDOR PRINCIPAL --}}
    {{-- ==================================== --}}
    <div class="main-container-pedidos">

        {{-- Encabezado y Filtros --}}
        <div class="CabezaPedidos mb-6 border-b pb-3 flex justify-between items-center">
            <div class="tituloPedidos flex gap-4">
                <h1>Mis Compras</h1>
                {{-- Los enlaces de filtro usan las clases HisCompra y Pend definidas en el CSS --}}
                <a href="#" class="HisCompra text-lg font-semibold pb-1">
                    <span>Historial</span>
                </a>
            </div>
        </div>

        {{-- Mensajes de Sesión (Éxito/Error) --}}
        @if (session('success'))
            <div class="bg-green-100 border border-green-400 text-green-700 px-4 py-3 rounded relative mb-4" role="alert">
                <span class="block sm:inline">{{ session('success') }}</span>
            </div>
        @endif
        @if (session('error'))
            <div class="bg-red-100 border border-red-400 text-red-700 px-4 py-3 rounded relative mb-4" role="alert">
                <span class="block sm:inline">{{ session('error') }}</span>
            </div>
        @endif

        {{-- Contenedor Principal de Pedidos --}}
        <div class="MostrarPedidos space-y-6">

            @forelse ($pedidos as $pedido)
                
                {{-- Tarjeta de Pedido Individual: Se aplica la clase Pedido-Card --}}
                <div class="Pedido-Card p-5 bg-white">
                    
                    {{-- Resumen del Pedido (ID, Fecha, Estado) --}}
                    <div class="Pedido-Header flex flex-col sm:flex-row justify-between items-start sm:items-center mb-4 pb-3 border-b border-gray-100">
                        <div class="mb-2 sm:mb-0">
                            <h3 class="text-xl font-extrabold text-gray-800">
                                Compra #{{ $pedido->id_pedidos }}
                            </h3>
                            <p class="text-sm text-gray-500 mt-1">
                                Realizada el: {{ $pedido->fecha_pedido}}
                            </p>
                        </div>

                        {{-- Estado del Pedido --}}
                        <p class="font-bold text-sm px-3 py-1 rounded-full uppercase tracking-wider 
                            @if ($pedido->estado == 'pendiente') bg-yellow-100 text-yellow-800 
                            @elseif ($pedido->estado == 'enviado') bg-blue-100 text-blue-800 
                            @elseif ($pedido->estado == 'entregado') bg-green-100 text-green-800 
                            @else bg-gray-100 text-gray-600 @endif">
                            {{ $pedido->estado }}
                        </p>
                    </div>

                    {{-- Productos dentro de este Pedido --}}
                    <div class="Pedido-Items space-y-4">
                        
                        @php
                            $totalPedido = 0;
                            $cantidadItems = $pedido->detalles->sum('cantidad');
                        @endphp
                        
                        @foreach ($pedido->detalles as $detalle)
                            @php
                                $subtotal = $detalle->cantidad * $detalle->precio_unitario;
                                $totalPedido += $subtotal;
                            @endphp
                            
                            {{-- Visualización de Detalle de Producto (Solo muestra la primera o las primeras dos imágenes para el resumen) --}}
                            {{-- Mantendremos solo el primer producto para el resumen de la tarjeta --}}
                            @if ($loop->first)
                                <div class="VisualizacionPedido flex items-center py-2 border-b border-dashed border-gray-100 last:border-b-0">
                                    
                                    {{-- Imagen: Se aplica la clase ImagenProducto --}}
                                    <div class="ImagenProducto w-16 h-16 mr-4 flex-shrink-0 rounded-lg overflow-hidden">
                                        <img src="{{ asset('storage/' . ($detalle->producto->imagen ?? 'placehold.co/64x64/CCCCCC/333333?text=N/A')) }}" 
                                            onerror="this.onerror=null;this.src='https://placehold.co/64x64/CCCCCC/333333?text=N/A';"
                                            alt="Imagen de {{ $detalle->producto->nombre ?? 'Producto Desconocido' }}"
                                            class="w-full h-full object-cover">
                                    </div>

                                    {{-- Info del Producto --}}
                                    <div class="PedidosInfo flex-grow grid grid-cols-4 gap-4 items-center">
                                        
                                        <div class="NombreProducto col-span-2">
                                            <h4 class="text-base font-semibold text-gray-800">
                                                {{ $detalle->producto->nombre ?? 'Producto Eliminado' }}
                                            </h4>
                                            <p class="text-sm text-gray-500">
                                                {{ $cantidadItems }} producto(s) en total.
                                            </p>
                                        </div>
                                        
                                        <div class="SubTotalPedido text-right col-span-2">
                                            <h4 class="text-lg font-bold text-gray-900">
                                                {{-- Se muestra el total final del pedido en la tarjeta resumen --}}
                                            </h4>
                                        </div>
                                    </div>
                                </div>
                            @endif
                        @endforeach

                    </div>
                    
                    {{-- Pie del Pedido: Total y Botones --}}
                    <div class="Pedido-Footer flex flex-col sm:flex-row justify-between items-center pt-4 mt-4 border-t border-gray-100">
                        <div class="PedidoBotonesP mb-3 sm:mb-0">
                            {{-- BOTÓN CLAVE: Se aplica la clase BotonVerCompra que dirige al detalle --}}
                            <a href="{{ route('pedido.detalle', $pedido->id_pedidos) }}" class="BotonVerCompra">
                                Ver detalle de compra ({{ $cantidadItems }} productos)
                            </a>
                        </div>
                        <div class="TotalPedido text-right">
                            <h5 class="text-xl font-extrabold">
                                Total: ${{ number_format($totalPedido, 2) }}
                            </h5>
                        </div>
                    </div>
                </div> {{-- Fin de Pedido-Card --}}

            @empty
                {{-- Mensaje si no hay pedidos --}}
                <div class="text-center p-8 bg-white rounded-lg border border-gray-200 shadow-md">
                    <p class="text-gray-600 text-xl font-semibold">Aún no tienes pedidos registrados.</p>
                    <p class="text-gray-400 mt-2">¡Es hora de empezar a comprar!</p>
                </div>
            @endforelse
        </div>
    </div>


    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.8/dist/js/bootstrap.bundle.min.js" xintegrity="sha384-FKyoEForCGlyvwx9Hj09JcYn3nv7wiPVlz7YYwJrWVcXK/BmnVDxM+D2scQbITxI" crossorigin="anonymous"></script>
</body>
</html>