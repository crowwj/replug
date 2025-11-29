<!DOCTYPE html>
<html lang="en">
  <head>
      <meta charset="UTF-8">
      <meta name="viewport" content="width=device-width, initial-scale=1.0">
      <link rel="stylesheet" href="{{ asset('contenido.css') }}" /> 
      <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.8/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-..." crossorigin="anonymous">
      <title></title>
  </head>
  
  <body>
    <nav class="barra-ayuda">
      <a href="" style="text-decoration: none; color: white;">Inicio</a>  
    </nav>
    <div class="direcciones">
      <div class="card text-center w-50 mx-auto">
        {{-- hey, aqui se pondra la palabra clave --}}

        <div class="card-header"> <span>Direcciones</span></div>

        <div class="card-body">
          {{-- AQUI VAN VARIABLES DONDE SE PONDRA LA DIRECCIONES --}}
        </div>

        <div class="d-grid gap-2 d-md-block">
          <button class="btn btn-primary" type="button">Modificar</button>
          <button class="btn btn-primary disable" type="button">Eliminar</button>
        </div>

        <span>agregar nueva direccion</span> {{-- temporal --}}

      </div>
    </div>
        
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.8/dist/js/bootstrap.bundle.min.js" integrity="sha384-FKyoEForCGlyvwx9Hj09JcYn3nv7wiPVlz7YYwJrWVcXK/BmnVDxM+D2scQbITxI" crossorigin="anonymous"></script>
  </body>
</html>