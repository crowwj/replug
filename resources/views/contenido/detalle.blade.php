<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.0.0/css/all.min.css" integrity="sha512-9usAa10IRO0HhonpyAIVpjrylPvoDwiPUiKdWk5t3PyolY1cOd4DSE0Ga+ri4AuTroPR5aQvXU9xC6qOPnzFeg==" crossorigin="anonymous" referrerpolicy="no-referrer" />
    <link rel="stylesheet" href="{{ asset('contenido.css') }}" /> 
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.8/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-..." crossorigin="anonymous">
    <title></title>
</head>
<body class="CuerpoDetalle">
    <nav class="barra-ayuda">   
            <a href="{{ route('productosbusqueda') }}" style="text-decoration: none; color: white; font-size: 20px;">Inicio</a>  
                <div class="d-flex align-items-center">
                    <a class="dropdown-item" href="{{ route('cerrarsesion') }}"onclick="event.preventDefault(); document.getElementById('logout-form').submit();" style="text-decoration: none; color: white; font-size: 20px; width:auto;"> Cerrar sesión </a>
                        <form id="logout-form" action="{{ route('cerrarsesion') }}" method="POST" class="d-none">@csrf</form>   
                </div>
   </nav>

<div class="DetalleContenido">
    <div class="DetalleImagen">
         <img src="{{ asset('storage/'.$producto->imagen) }}" style="border-radius:15px;">
    </div>
    <div class="DetalleInfo">
        <div class="DetalleNombre card">
             <p> <strong>{{$producto->nombre }}</strong></p>  
             <div class="descripcion card">
                <p>{{$producto->descripcion  }}</p>
             </div>
             <div class="descripcionContenido">
            <div class="descripcionPrecioStock">
                <p style="font-size:25px"> <strong>${{$producto->precio }} </strong></p>
                <p class="Stockcolor" style="font-size:24px">Stock: {{$producto->stock  }}</p>
            </div>
            <div class="descripcionEnvioEntrega">
                <p class="DescripcionEnvioDia" style="margin:-1px;">El envio llegare entre el miercoles y sabado</p>
                <div class="Enviogratis">
                <i class="fa-solid fa-truck"></i>
                 <p class="DescripcionEnvioGratis" style="margin:-0.7px">Envios gratis</p>
                </div>
            </div>
             <div class="DetalleInfoButton">
                <button class="btn btn-primary">Agregar al carrito</button>
                <button class="btn btn-primary">Comprar ahora</button>
            </div>
            <div class="descripcionPoliticas">
                <p> <strong class="DevolucionGratis">Devolución gratis </strong> Tienes 30 días desde que lo recibes, tambien obten el producto que esperabas o te devolvemos tu dinero.</p>
            </div>
             <div class="divDetalleFormadepago card">
                <h4 class="card title">Metodos de pagos disponible</h4>
                <h5>Tarjetas de credito</h5>
                <h5>Tarjetas de debito</h5>
                <h5>Pago en efectivo</h5>
             </div>
             </div>
          </div>
    </div>
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