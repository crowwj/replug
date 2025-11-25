<!DOCTYPE html>
<html lang="en">

  <head>
      <meta charset="UTF-8">
      <meta name="viewport" content="width=device-width, initial-scale=1.0">
      <link rel="stylesheet" href="{{ asset('contenido.css') }}" /> 
      <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.8/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-sRIl4kxILFvY47J16cr9ZwB07vP4J8+LH7qKQnuqkuIAvNWLzeN8tE5YBujZqJLB" crossorigin="anonymous">
      <title>Document</title>
  </head>

  <body>
   {{--   @include('contenido.barranavegar')  --}}

    <nav class="barra-ayuda">
      <a href="" style="text-decoration: none; color: white;">Inicio</a>
        
   </nav>

  {{-- Contenido --}}
  <div class="contenido"> 

    <div class="row mb-5 justify-content-center gx-5"> 
        
        <div class="col-12 col-md-6"> 
            <div class="card h-100"> 
                <div class="card-header"><span>Datos de la cuenta</span></div>
                
                <div class="card-body d-flex flex-column"> 
                    
                    <p class="card-text">Gestiona tu <strong>información personal</strong> (nombre, correo, teléfono) y preferencias de comunicación.</p>
                    
                    <button class="btn btn-primary mt-auto">Ir</button> 
                </div>
            </div>
        </div>
        
        <div class="col-12 col-md-6">
            <div class="card h-100">
                <div class="card-header"><span>Seguridad e inicio de sesion</span></div>
                
                <div class="card-body d-flex flex-column"> 
                    <p class="card-text">Cambia tu <strong>contraseña</strong> de forma segura, revisa tu <strong>actividad</strong> reciente e implementa la verificación en dos pasos.</p>
                    <button class="btn btn-primary mt-auto">Ir</button>
                </div>
            </div>
        </div>
    </div> 

    <div class="row justify-content-center gx-5">
        
        <div class="col-12 col-md-6">
            <div class="card h-100">
                <div class="card-header"><span>Pedido y compras</span></div>
                <div class="card-body d-flex flex-column">
                    <p class="card-text">Revisa el historial completo de tus compras, verifica el estado de tus <strong>pedidos</strong> activos y gestiona tus facturas.</p>
                    <button class="btn btn-primary mt-auto">Ir</button>
                </div>
            </div>
        </div>
       
        
        <div class="col-12 col-md-6">
            <div class="card h-100">
                <div class="card-header"><span>Direcciones</span></div>
                <div class="card-body d-flex flex-column">
                    <p class="card-text"> Añade, edita o elimina tus <strong>direcciones</strong> de envío y facturación para agilizar futuras compras.</p>
                    <button class="btn btn-primary mt-auto">Ir</button>
                </div>
            </div>
        </div>
    </div>
</div>


    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.8/dist/js/bootstrap.bundle.min.js" integrity="sha384-FKyoEForCGlyvwx9Hj09JcYn3nv7wiPVlz7YYwJrWVcXK/BmnVDxM+D2scQbITxI" crossorigin="anonymous"></script>
  </body>
</html>