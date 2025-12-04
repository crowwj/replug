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
{{-- BARRA DE NAVEGACIÓN (HEADER) - REPARADA --}}
{{-- ==================================== --}}
<nav class="barra-ayuda" style="display: flex; justify-content: space-between; align-items: center; padding: 10px 20px;">   
{{-- Botón Inicio --}}
<a href="{{ route('productosbusqueda') }}" class="botonInicioBarra" style="text-decoration: none; color: white; font-size: 20px; padding: 10px; border-radius: 10px; background-color: #422e60;">Inicio</a>

<div class="menu-derecha" style="display: flex; align-items: center; gap: 10px;"> 

    <div class="carrito2">
        <a href="{{ route('desplegar') }}" style="text-decoration: none; color: white; font-size: 20px; padding: 10px; border-radius: 10px; background-color: #422e60;"> <i class="fa-solid fa-cart-shopping"></i> Mi carrito </a>
    </div>

    <div class="vender">
        <a href="{{ route('micuenta') }}" style="text-decoration: none; color: white; font-size: 20px; padding: 10px; border-radius: 10px; background-color: #422e60;"><i class="fa-solid fa-hand-holding-dollar"></i> Vender Producto</a>
    </div>

    <div class="cerrar">
        <div class="d-flex align-items-center">
        <a class="dropdown-item" href="{{ route('cerrarsesion') }}"onclick="event.preventDefault(); document.getElementById('logout-form').submit();" style="text-decoration: none; color: white; font-size: 20px; width:auto;  background-color: #422e60; padding: 10px;  border-radius: 10px;  box-shadow: 0 2px 4px rgba(0, 0, 0, 0.2); "> Cerrar sesión </a>
        <form id="logout-form" action="{{ route('cerrarsesion') }}" method="POST" class="d-none">@csrf</form>   
    </div>
    </div>
    </div>
</nav>

{{-- ==================================== --}}
{{-- CONTENEDOR PRINCIPAL (Solo se modifica el interior) --}}
{{-- ==================================== --}}
<div class="main-container-pedidos" style="max-width: 1200px; margin: 30px auto; padding: 0 20px;">
        {{-- Cálculo de Subtotal General (Necesario para el resumen de pago) --}}
        @php $subtotalGeneral = 0; @endphp
        @if ($pedido->detalles)
            @foreach ($pedido->detalles as $detalle)
                @php $subtotalGeneral += $detalle->precio_unitario * $detalle->cantidad; @endphp
            @endforeach
        @endif

        <div style="padding: 20px; font-family: Arial, sans-serif;">
            <h1 style="font-size: 2em; color: #333; margin-bottom: 25px; font-weight: bold; padding-top: 10px;">
                Detalles de la Compra #{{ $pedido->id_pedidos }}
            </h1>
            
            {{-- Mensajes de Sesión (Éxito/Error) --}}
            @if (session('error'))
                <div style="background-color: #f8d7da; color: #721c24; border: 1px solid #f5c6cb; padding: 15px; border-radius: 5px; margin-bottom: 20px;" role="alert">
                    <span>{{ session('error') }}</span>
                </div>
            @endif

            {{-- Botón de Regreso --}}
            <a href="{{ route('desplegarpedidos') }}" style="text-decoration: none; color: #007bff; font-weight: 600; margin-bottom: 20px; display: inline-block;">
                <i class="fa-solid fa-arrow-left" style="margin-right: 5px;"></i> Volver a Mis Compras
            </a>

            {{-- ESTRUCTURA DE DOS COLUMNAS (Flexbox) --}}
            <div style="display: flex; flex-wrap: wrap; gap: 30px;">
                
                {{-- Columna Izquierda (Productos e Info - 65%) --}}
                <div style="flex: 2; min-width: 300px;">
                    
                    {{-- 1. Tarjeta de Información del Pedido --}}
                    <div style="background-color: #fff; padding: 20px; border-radius: 8px; box-shadow: 0 2px 5px rgba(0, 0, 0, 0.05); margin-bottom: 20px;">
                        <h2 style="font-size: 1.2em; font-weight: 600; color: #333; margin-bottom: 15px; border-bottom: 1px solid #eee; padding-bottom: 10px;">Información de Pedido</h2>
                        
                        <div style="display: flex; align-items: center; margin-bottom: 15px;">
                            <i class="fa-solid fa-truck" style="color: #007bff; font-size: 1.5em; margin-right: 10px;"></i>
                            <p style="font-size: 1.1em; font-weight: bold; color: #007bff; margin: 0; text-transform: capitalize;">
                                Estado: {{ $pedido->estado }}
                            </p>
                        </div>

                        <div style="font-size: 0.9em; color: #666; line-height: 1.6;">
                            <p style="margin: 0;">
                                <span style="font-weight: bold;">Fecha del Pedido:</span> 
                                {{ \Carbon\Carbon::parse($pedido->fecha_pedido)->format('d/m/Y H:i') }}
                            </p>
                            <p style="margin: 0;">
                                <span style="font-weight: bold;">Llegada Estimada:</span> 
                                @if ($pedido->fecha_llegada_estimada)
                                    <span style="color: #28a745;">{{ \Carbon\Carbon::parse($pedido->fecha_llegada_estimada)->format('d/m/Y') }}</span>
                                @else
                                    <span style="color: #888;">Pendiente de asignación</span>
                                @endif
                            </p>
                        </div>
                    </div>
                    
                    {{-- 2. Tarjeta de Productos --}}
                    <div style="background-color: #fff; padding: 20px; border-radius: 8px; box-shadow: 0 2px 5px rgba(0, 0, 0, 0.05);">
                        <h2 style="font-size: 1.2em; font-weight: 600; color: #333; margin-bottom: 15px; border-bottom: 1px solid #eee; padding-bottom: 10px;">Productos Comprados</h2>
                        
                        {{-- Iteración sobre los detalles del pedido --}}
                        @forelse ($pedido->detalles as $detalle)
                            @php 
                                $precioUnitario = $detalle->precio_unitario;
                                $cantidad = $detalle->cantidad;

                                $producto = $detalle->producto; // Asumiendo que existe una relación ->producto
                                $nombreProducto = $producto->nombre ?? 'Producto Eliminado o Desconocido';
                                $imagenPath = asset('storage/' . ($producto->imagen ?? 'https://placehold.co/70x70/007bff/FFFFFF?text=PROD'));
                            @endphp

                            <div style="display: flex; padding: 15px 0; border-bottom: 1px solid #f0f0f0; align-items: center;">
                                
                                {{-- Imagen: Estilo de thumbnail --}}
                                <div style="width: 70px; height: 70px; margin-right: 15px; border-radius: 5px; overflow: hidden; border: 1px solid #ddd; flex-shrink: 0;">
                                    <img src="{{ $imagenPath }}" 
                                        onerror="this.onerror=null;this.src='https://placehold.co/70x70/007bff/FFFFFF?text=PROD';"
                                        alt="Imagen de {{ $nombreProducto }}"
                                        style="width: 100%; height: 100%; object-fit: cover;">
                                </div>

                                {{-- Información y Precio --}}
                                <div style="flex-grow: 1; display: flex; justify-content: space-between; align-items: center;">
                                    <div>
                                        <h3 style="font-size: 1em; font-weight: 600; color: #333; margin: 0;">{{ $nombreProducto }}</h3>
                                        <p style="font-size: 0.9em; color: #777; margin: 0;">Cantidad: {{ $cantidad }} u. | Precio Unitario: ${{ number_format($precioUnitario, 2) }}</p>
                                    </div>
                                    <div style="text-align: right;">
                                        <p style="font-size: 1.1em; font-weight: bold; color: #333; margin: 0;">${{ number_format($precioUnitario * $cantidad, 2) }}</p>
                                    </div>
                                </div>
                            </div>

                        @empty
                            <p style="color: #777; padding: 10px 0;">No se encontraron productos para este pedido.</p>
                        @endforelse

                    </div>

                    {{-- 3. Espacio para Calificación o Reclamo (Se deja el diseño pero sin datos falsos) --}}
                    <div style="margin-top: 20px; padding: 20px; border-radius: 8px; box-shadow: 0 2px 5px rgba(0, 0, 0, 0.05); background-color: #fff;">
                        <h2 style="font-size: 1.2em; font-weight: 600; color: #333; margin-bottom: 10px;">¿Necesitas ayuda?</h2>
                        <p style="color: #666; margin-bottom: 15px; font-size: 0.9em;">Contacta al vendedor o inicia un proceso de reclamo si tienes problemas con la entrega o el producto.</p>
                        <a href="#" style="border: 1px solid #ccc; background-color: #f9f9f9; color: #555; padding: 8px 15px; border-radius: 5px; cursor: pointer; font-size: 0.9em; outline: none; text-decoration: none;">
                            Contactar
                        </a>
                    </div>
                </div>

                {{-- Columna Derecha (Resumen y Dirección - 30%) --}}
                <div style="flex: 1; min-width: 300px; max-width: 350px;">
                    
                    {{-- 1. Resumen de Pago --}}
                    <div style="background-color: #fff; padding: 20px; border-radius: 8px; box-shadow: 0 2px 5px rgba(0, 0, 0, 0.05); margin-bottom: 20px;">
                        <h2 style="font-size: 1.2em; font-weight: 600; color: #333; margin-bottom: 15px; border-bottom: 1px solid #eee; padding-bottom: 10px;">Resumen de Pago</h2>
                        
                        <div style="font-size: 0.9em; color: #666; line-height: 2;">
                            <div style="display: flex; justify-content: space-between;">
                                <span>Subtotal Productos</span>
                                <span>${{ number_format($subtotalGeneral, 2) }}</span>
                            </div>
                            <div style="display: flex; justify-content: space-between;">
                                <span>Costo de Envío</span>
                                <span style="color: #28a745; font-weight: bold;">Gratis</span> {{-- Suponemos envío gratis --}}
                            </div>
                        </div>
                        
                        <div style="display: flex; justify-content: space-between; margin-top: 15px; padding-top: 15px; border-top: 1px solid #ccc;">
                            <span style="font-size: 1.4em; font-weight: bold; color: #333;">Total Pagado</span>
                            <span style="font-size: 1.4em; font-weight: bold; color: #333;">${{ number_format($subtotalGeneral, 2) }}</span>
                        </div>
                    </div>

                    {{-- 2. Dirección de Envío (Datos removidos, se deja el placeholder) --}}
                    <div style="background-color: #fff; padding: 20px; border-radius: 8px; box-shadow: 0 2px 5px rgba(0, 0, 0, 0.05);">
                        <h2 style="font-size: 1.2em; font-weight: 600; color: #333; margin-bottom: 15px; border-bottom: 1px solid #eee; padding-bottom: 10px;">Dirección de envío</h2>
                        
                        <div style="font-size: 0.9em; color: #666; line-height: 1.5;">
                            <p style="font-weight: bold; margin-bottom: 5px; color: #333;">[Nombre del Usuario/Cliente]</p>
                            <p style="margin: 0;">[Calle, Número Exterior/Interior]</p>
                            <p style="margin: 0;">[Colonia, Código Postal, Ciudad, Estado]</p>
                            <p style="margin-top: 10px; font-size: 0.8em; color: #888;">
                                * La dirección de envío debe ser inyectada aquí desde los datos del usuario logueado.
                            </p>
                        </div>
                    </div>

                </div>
            </div>
        </div>
    </div>


 <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.8/dist/js/bootstrap.bundle.min.js" xintegrity="sha384-FKyoEForCGlyvwx9Hj09JcYn3nv7wiPVlz7YYwJrWVcXK/BmnVDxM+D2scQbITxI" crossorigin="anonymous"></script>
</body>
</html>