<!DOCTYPE html>
<html lang="en">

    <head>
        <meta charset="UTF-8">
        <meta name="viewport" content="width=device-width, initial-scale=1.0">
        <title>MercadoPobre</title>
         <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.0.0/css/all.min.css" integrity="sha512-9usAa10IRO0HhonpyAIVpjrylPvoDwiPUiKdWk5t3PyolY1cOd4DSE0Ga+ri4AuTroPR5aQvXU9xC6qOPnzFeg==" crossorigin="anonymous" referrerpolicy="no-referrer" />
        <link rel="stylesheet" href="{{ asset('contenido.css') }}" /> 
        <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.8/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-..." crossorigin="anonymous">
    </head>

    <body class="CuerpoContenido">
    @include('contenido.barranavegar')
    <div class="demostracion">
        <div class="contenidoDemostracion">
            <p>OFERTA NAVIDEÑA</p><br>
            <H1>GRANDES OFERTAS EN <strong>MERCADO POBRE</strong></H1>
        </div>
    </div>
    <div class="contenedorDemostrar">
        <div class="producto1Demostrar">
            <div class="productos1Info">
                <h4>LAS MEJORES LAPTOPS</h4>
                <H4>APROVECHA <strong>50% DESCUENTO</strong></H4>
            </div>
            <img src="{{ asset('img/laptopgaming.png') }}" alt="">
         </div>
        <div class="producto2Demostrar">
            <div class="productos2Info">
                <h4>ALTO RENDIMIENTO</h4>
                <H4>CONSIGUE EL 98% DE DESCUENTO<strong> AHORA</strong></H4>
            </div>
            <img src="{{ asset('img/pcgaming.png') }}" alt="">
        </div>
    </div>
    <div class="tituloProductos" style="margin-bottom: -1px;">
        <h4 style="margin-bottom:-5px;" class="Subtitle">PRODUCTOS</h4>
    </div>

   


      <div class="mostrarproductos2" style="margin-top: -5px">
        @if (!empty($productos))
            <div class="productosVisual2"> 
                @foreach ($productos as $producto) 
                    <div class="productoBorde2">   
                        <div class="productosCuadros">
                            <div class="productosImagen">
                                <img src="{{ asset('storage/'.$producto->imagen) }}">
                             </div>
                            {{-- Mostrar Clave, nombre y precio del producto--}}
                            <div class="producto-texto-wrapper">
                                <p class="productoSub"></p>{{ $producto['nombre'] ?? $producto->nombre }}</p>
                                <p style="font-size: 20px; font-weight: bold; color: #333; margin-bottom: 5px;">${{ number_format($producto['precio'] ?? $producto->precio, 2) }}</p>
                            </div>
                            <div class="botonAnimation">
                                <a href="{{ route('detalle',['id'=> $producto ->id_producto ]) }}">
                                <button class="btn btn-primary" style="width:50%; background-image: linear-gradient(90deg, #d420f8, #8d5dfe); border:none;" > <strong> ver </strong></button>
                                </a> 
                            </div>
                        </div>
                    </div>  
                @endforeach
            </div>   
        @else
            <p style="color: red; font-weight: bold;">❌ No se encontraron productos.</p>
        @endif
    </div>
   <div class="paginacion-wrapper" style="display: flex; flex-direction: column; align-items: center; margin-top: 30px;">
    {{ $productos->links() }}
</div>

    <footer class="pieContenido">
        <div class="conteInfo">
            <div class="ContenidoEnlaces">
                <ul>
                    <li> <a href="#"></a>Ayuda</li>
                    <li> <a href="#"></a>Privacidad</li>
                    <li> <a href="#"></a>Terminos y condiciones</li>
                    <li> <a href="#"></a>Contactanos</li>
                    <li> <a href="#"></a>Accesibilidad</li>
                    <li> <a href="#"></a>Preguntas frecuentes</li>
                </ul>
            </div>
            <div class="ContenidoCopy">
                Copyright © 2025-2025 El presente canal de instrucción o ambiente, es operado por SkibidiUadeo de México, S. de R.L. de C.V. identificada bajo la marca comercial "Mercado Pobre".
            </div>
        </div>
    </footer>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.8/dist/js/bootstrap.bundle.min.js" integrity="sha384-..." crossorigin="anonymous"></script>
    </body>
</html>