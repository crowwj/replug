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
   
  <div class="datoscuenta card">
      <div class="cuentaDatos card">
      <h3>Configuracion de datos</h3>
        <p>Modifica y actualiza informacion de la cuenta</p>
      </div>
      <div class="nombre card"> 
        <strong> <p>Nombre completo</p> </strong>
          <input type="text" class="form-control" id="floatingInput" placeholder="">
      </div>
      <div class="contacto card">
        <strong><p>Correo electronico</p> </strong>
          <p>Administra la direccion de correo electronico  en tu cuenta</p>
            <input type="email" class="form-control" id="floatingInput" placeholder="">
      </div>
      <div class="correo card">
        <strong> <p>Numero telefonico</p> </strong>
          <p>Numero telefonico asociada a la cuenta</p>
            <input type="text" class="form-control" id="floatingInput" placeholder="">  
      </div>
      <div class="configuraciones">
      <button class="btn btn-primary" type="submit">Guardar configuracion</button>
      <button class="btn btn-primary" type="submit">Modificar informacion</button>
      </div>
  </div>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.8/dist/js/bootstrap.bundle.min.js" integrity="sha384-FKyoEForCGlyvwx9Hj09JcYn3nv7wiPVlz7YYwJrWVcXK/BmnVDxM+D2scQbITxI" crossorigin="anonymous"></script>
  </body>
</html>