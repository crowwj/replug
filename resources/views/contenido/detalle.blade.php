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
<body>
    <nav class="barra-ayuda">   
            <a href="{{ route('productosbusqueda') }}" style="text-decoration: none; color: white; font-size: 20px;">Inicio</a>  
                <div class="d-flex align-items-center">
                    <a class="dropdown-item" href="{{ route('cerrarsesion') }}"onclick="event.preventDefault(); document.getElementById('logout-form').submit();" style="text-decoration: none; color: white; font-size: 20px; width:auto;"> Cerrar sesión </a>
                        <form id="logout-form" action="{{ route('cerrarsesion') }}" method="POST" class="d-none">@csrf</form>   
                </div>
   </nav>

<div class="DetalleContenido">
    <div class="DetalleImagen">
       
         <img src="{{ asset('storage/'.$producto->imagen) }}">
    </div>
    <div class="DetalleInfo">
       {{$producto->nombre }}
          {{$producto->descripcion  }}
          {{$producto->precio }}
          {{$producto->stock  }}
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