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

    <div class="tituloProductos">
        <h3>PRODUCTOS NUEVOS</h3>
    </div>
    <div class="mostrarproductos">
        @if (!empty($productos))
            <div class="productosVisual"> 
                @foreach ($productos as $producto) 
                    <div class="productoBorde">   
                        <div class="productosCuadros">
                            <div class="productosImagen">
                                <img src="{{ asset('storage/'.$producto->imagen) }}">
                             </div>
                            {{-- Mostrar Clave, nombre y precio del producto--}}
                            <div class="producto-texto-wrapper">
                                <p class="productoSub"></p>{{ $producto['nombre'] ?? $producto->nombre }}</p>
                                <p style="font-size: 20px; font-weight: bold; color: #333; margin-bottom: 5px;">${{ number_format($producto['precio'] ?? $producto->precio, 2) }}</p>
                            </div>
                            
                                <button type="button" class="btn btn-primary" data-bs-toggle="modal" data-bs-target="#modal-unico-producto" data-nombre="{{ $producto->nombre }}" data-precio="{{ number_format($producto->precio, 2) }}" data-descripcion="{{ $producto->descripcion }}" data-imagen="{{ asset('storage/'.$producto->imagen) }}" style="background:rgb(82, 11, 149); border: none;">
                                 Ver
                            </button>
                        </div>
                    </div>  
                @endforeach
           
                </div>
                <div class="modal fade" id="modal-unico-producto" tabindex="-1" aria-labelledby="modal-nombre-producto" aria-hidden="true">
                    <div class="modal-dialog modal-xl">
                        <div class="modal-content">
                            <div class="modal-header">
                                <h1 class="modal-title fs-5" id="modal-nombre-producto">Nombre del Producto</h1>
                                <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                            </div>
                            <div class="modal-body">
                                <div class="grid grid-cols-2 gap-4">
                                    <div class="flex items-center justify-center">
                                        <img id="modal-imagen-producto" src="" alt="Imagen de Producto" class="max-h-96 object-contain">
                                    </div>
                                    <div>
                                        <p class="text-xl font-bold text-green-600 mb-3" id="modal-precio-producto">Precio</p>
                                        <p id="modal-descripcion-producto" class="text-gray-700"></p>
                                    </div>
                                </div>
                            </div>
                            <div class="modal-footer">
                                <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Cerrar</button>
                                <button type="button" class="btn btn-primary">Comprar</button>
                            </div>
                        </div>
                    </div>
                    </div>
                {{-- **3. Script para inyectar los datos cuando se abre el modal** --}}
                <script>
                    document.addEventListener('DOMContentLoaded', function () {
                        const modalUnico = document.getElementById('modal-unico-producto');
                        modalUnico.addEventListener('show.bs.modal', function (event) {
                            // Botón que disparó el modal
                            const button = event.relatedTarget;
                            
                            // Extraer los datos de los atributos data-* del botón
                            const nombre = button.getAttribute('data-nombre');
                            const precio = button.getAttribute('data-precio');
                            const descripcion = button.getAttribute('data-descripcion');
                            const imagen = button.getAttribute('data-imagen');

                            // Inyectar los datos en el modal
                            document.getElementById('modal-nombre-producto').textContent = nombre;
                            document.getElementById('modal-precio-producto').textContent = `$${precio}`;
                            document.getElementById('modal-descripcion-producto').textContent = descripcion;
                            document.getElementById('modal-imagen-producto').src = imagen;
                        });
                    });
                </script>
            </div>
            
        @else
            <p style="color: red; font-weight: bold;">❌ No se encontraron productos.</p>
        @endif
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