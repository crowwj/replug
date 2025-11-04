<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>MercadoPobre</title>
    <link rel="stylesheet" href="{{ asset('contenido.css') }}" /> 
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.8/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-..." crossorigin="anonymous">
</head>
<body>
@include('contenido.barranavegar')
<div class="mostrarproductos">
    <h2>Lo mas nuevo</h2>
    <h2>✅ Productos Recibidos del Controlador:</h2>

@if (!empty($productos))
    
    <div style="border: 2px solid green; padding: 15px;">
        
        {{-- Aquí se inicia el bucle FOREACH para iterar sobre la colección $productos --}}
        @foreach ($productos as $producto)    
            
            <div style="border-bottom: 1px dashed #ccc; padding: 10px; margin-bottom: 10px;">
                
                {{-- Muestra la clave y el valor del array o la propiedad del objeto --}}
                <p><strong>Nombre:</strong> {{ $producto['nombre'] ?? $producto->nombre }}</p>
                <p><strong>Precio:</strong> ${{ number_format($producto['precio'] ?? $producto->precio, 2) }}</p>
                <p><strong>Categoría:</strong> {{ $producto['categoria'] ?? $producto->categorias_id_categoria }}</p>
            
            </div>  
            
        @endforeach
        
    </div>

@else
    
    <p style="color: red; font-weight: bold;">❌ No se recibieron productos o la lista está vacía.</p>
    
@endif

</div>
<!-- CONTENIDO -->
<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.8/dist/js/bootstrap.bundle.min.js" integrity="sha384-..." crossorigin="anonymous"></script>
</body>
</html>