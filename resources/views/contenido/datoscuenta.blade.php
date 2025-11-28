<!DOCTYPE html>
<html lang="en">
  
  <head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="{{ asset('contenido.css') }}" /> 
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.8/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-..." crossorigin="anonymous">
    <title>Document</title>
  </head>

  <body class="cuerpoDatos">
   <nav class="barra-ayuda">   
            <a href="" style="text-decoration: none; color: white; font-size: 20px;">Inicio</a>  
                <div class="d-flex align-items-center">
                    <a class="dropdown-item" href="{{ route('cerrarsesion') }}"onclick="event.preventDefault(); document.getElementById('logout-form').submit();" style="text-decoration: none; color: white; font-size: 20px; width:auto;"> Cerrar sesión </a>
                        <form id="logout-form" action="{{ route('cerrarsesion') }}" method="POST" class="d-none">@csrf</form>   
                </div>
   </nav>

   {{-- CORREO, NOMBRE, TELEFONO --}}
  <div class="datoscuenta">
      <div class="cuentaDatos">
      <h3>Configuracion de datos</h3>
      </div>
      <div class="nombre"> 
      <h4>Nombre de usuario</h4>
      </div>
      <div class="contacto">
      <h4>Correo electronico</h4>
      </div>
      <div class="correo">
      <h4>Numero telefonico</h4>
      </div>
  </div>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.8/dist/js/bootstrap.bundle.min.js" integrity="sha384-FKyoEForCGlyvwx9Hj09JcYn3nv7wiPVlz7YYwJrWVcXK/BmnVDxM+D2scQbITxI" crossorigin="anonymous"></script>
  </body>
</html>