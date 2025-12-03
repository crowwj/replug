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
            <a href="{{ route('productosbusqueda') }}" style="text-decoration: none; color: white; font-size: 20px;" class="botonInicioBarra">Inicio</a>  
           <div class="menu-derecha"> <div class="carrito2">
                <a href=""> <i class="fa-solid fa-cart-shopping"></i> Mi carrito </a>
            </div>
            <div class="vender">
                <a href="{{ route('micuenta') }}"><i class="fa-solid fa-hand-holding-dollar"></i> Vender Producto</a>
            </div>
            <div class="cerrar">
            <div class="d-flex align-items-center" class="cerrar">
                <a class="dropdown-item" href="{{ route('cerrarsesion') }}"onclick="event.preventDefault(); document.getElementById('logout-form').submit();" style="text-decoration: none; color: white; font-size: 20px; width:auto;  background-color: #422e60; padding: 10px;  border-radius: 10px;  box-shadow: 0 2px 4px rgba(0, 0, 0, 0.2); "> Cerrar sesión </a>
                    <form id="logout-form" action="{{ route('cerrarsesion') }}" method="POST" class="d-none">@csrf</form>   
            </div>
            </div>
   </div> </nav>

   {{-- CORREO, NOMBRE, TELEFONO --}}
   
  <div class="datoscuenta card">
      <div class="cuentaDatos card">
      <h3>Configuracion de datos</h3>
        <p>Modifica y actualiza informacion de la cuenta</p>
      </div>
      <div class="nombre card"> 
        <strong> <p>Nombre completo</p> </strong>
          <input type="text" class="form-control" id="floatingInput" placeholder="" style="">
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
      <button class="btn btn-primary" type="submit" style="background-color: #422e60; padding: 10px;  border-radius: 10px;  box-shadow: 0 2px 4px rgba(0, 0, 0, 0.2);  border: none;">Guardar configuracion</button>
     
      <button class="btn btn-primary" type="submit" style="background-color: #422e60; padding: 10px;  border-radius: 10px;  box-shadow: 0 2px 4px rgba(0, 0, 0, 0.2);  border: none;">Modificar informacion</button>
       <a href="{{ route('micuenta')}}">
      <button class="btn btn-primary" type="submit" style="background-color: #422e60; padding: 10px;  border-radius: 10px;  box-shadow: 0 2px 4px rgba(0, 0, 0, 0.2);  border: none;">Regresar</button>
      </a>
      </div>
  </div>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.8/dist/js/bootstrap.bundle.min.js" integrity="sha384-FKyoEForCGlyvwx9Hj09JcYn3nv7wiPVlz7YYwJrWVcXK/BmnVDxM+D2scQbITxI" crossorigin="anonymous"></script>
  </body>
</html>