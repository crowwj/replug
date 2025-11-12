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
    <h2>Productos (test)</h2>
@if (!empty($productos))
    <div class="productosVisual"> 
        {{--no x el qlo no--}}
        @foreach ($productos as $producto) 
            <div class="productoBorde">   
                <div class="productosCuadros">
                    <div class="productosImagen">
                        <img src="{{ asset($producto->imagen) }}"  style="max-height: 100%; max-width: 100%; object-fit: contain;">
                    </div>
                    {{-- Mostrar Clave, nombre y precio del producto--}}
                    <p style="font-size: 14px; height: 3em; overflow: hidden; margin-bottom: 5px;">{{ $producto['nombre'] ?? $producto->nombre }}</p>
                    <p style="font-size: 20px; font-weight: bold; color: #333; margin-bottom: 10px;">Precio: ${{ number_format($producto['precio'] ?? $producto->precio, 2) }}</p>
                    <p style="font-size: 12px; color: green; border: 1px solid green; padding: 2px 5px; border-radius: 4px; display: inline-block;">Categoría: {{ $producto['categoria'] ?? $producto->categorias_id_categoria }}</p>
                    <br>

                    <button type="button" class="btn btn-primary" data-bs-toggle="modal" data-bs-target="#modal-producto-{{ $producto->id_producto ?? $producto['id_producto'] }}" style="background:rgb(82, 11, 149); border: none;">
                    Ver
                    </button>
                    <div class="modal fade" id="modal-producto-{{ $producto->id_producto ?? $producto['id_producto'] }}" data-bs-backdrop="static" data-bs-keyboard="false" tabindex="-1" aria-labelledby="modal-label-{{ $producto->id_producto ?? $producto['id_producto'] }}" aria-hidden="true">
                        <div class="modal-dialog modal-xl">
                            <div class="modal-content">
                                <div class="modal-header">
                                    <h1 class="modal-title fs-5" id="modal-label-{{ $producto->id_producto ?? $producto['id_producto'] }}"> {{ $producto->nombre }}</h1>
                                    
                        <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                    </div>
                        <div class="modal-body">
                            <p>{{$producto->descripcion}}</p>
                    </div>
                    <div class="modal-footer">
                    <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Cerrar</button>
                    <button type="button" class="btn btn-primary">Comprar</button>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>  
        @endforeach
    </div>




@else
    <p style="color: red; font-weight: bold;">❌ No se encontraron productos.</p>
@endif



</div>
<!-- CONTENIDO -->
<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.8/dist/js/bootstrap.bundle.min.js" integrity="sha384-..." crossorigin="anonymous"></script>
</body>
</html>