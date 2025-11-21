<!DOCTYPE html>
<html lang="en">
  
  <head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="{{ asset('contenido.css') }}" /> 
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.8/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-..." crossorigin="anonymous">
    <title>Document</title>
  </head>

  <body>
  @include('contenido.barranavegar')

    <div class="contenido-contenidocuenta">
      <h3>Mi cuenta > Datos de tu cuenta</h3>
      <h2>Datos de tu cuenta</h2>
      <div class="card">
        <div class="card-header">
          Email
        </div>
        <div class="card-body">
          <!--Creo que aqui debemos poner un input o un larabel para que nos muestre la direccion que nosotros agregamos previamente. : TOCA INVESTIGAR -->
          <button class="btn btn-primary btn-lg" style="background:rgb(82, 11, 149);border: none;"> Modificar</button>
        </div>
      </div>
    </div>
      
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.8/dist/js/bootstrap.bundle.min.js" integrity="sha384-FKyoEForCGlyvwx9Hj09JcYn3nv7wiPVlz7YYwJrWVcXK/BmnVDxM+D2scQbITxI" crossorigin="anonymous"></script>
  </body>
</html>