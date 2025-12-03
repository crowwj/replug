<!DOCTYPE html>
<html lang="en">

  <head>
      <meta charset="UTF-8">
      <meta name="viewport" content="width=device-width, initial-scale=1.0">
      <link rel="stylesheet" href="{{ asset('contenido.css') }}" /> 
      <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.8/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-sRIl4kxILFvY47J16cr9ZwB07vP4J8+LH7qKQnuqkuIAvNWLzeN8tE5YBujZqJLB" crossorigin="anonymous">
      <title>Document</title>
  </head>

  <body class="cuerpocontenido">
   {{--   @include('contenido.barranavegar')  --}}
<div class="content-wrapper">

    <nav class="barra-ayuda">   
            <a href="{{ route('productosbusqueda') }}" style="text-decoration: none; color: white; font-size: 20px;">Inicio</a>  
                <div class="d-flex align-items-center">
                    <a class="dropdown-item" href="{{ route('cerrarsesion') }}"onclick="event.preventDefault(); document.getElementById('logout-form').submit();" style="text-decoration: none; color: white; font-size: 20px; width:auto;"> Cerrar sesión </a>
                        <form id="logout-form" action="{{ route('cerrarsesion') }}" method="POST" class="d-none">@csrf</form>   
                </div>
   </nav>

  {{-- Contenido --}}
  <div class="contenido" style="  background: rgb(223, 220, 220);"> 
    <h2>Mi Cuenta</h2>
    <div class="row mb-5 justify-content-center gx-5"> 
        <div class="col-12 col-md-6"> 
            <div class="card h-100"> 
                <div class="card-header"><span>Datos de la cuenta</span></div>
                
                <div class="card-body d-flex flex-column"> 
                    <p class="card-text">Gestiona tu <strong>información personal</strong> (nombre, correo, teléfono) y preferencias de comunicación.</p>
                    <a href="{{ route('datoscuenta')}}">
                    <button class="btn btn-primary mt-auto"style="width: auto !important; max-width: none !important;">Actualizar información</button> 
                    </a>
                </div>
            </div>
        </div>
        <div class="col-12 col-md-6">
            <div class="card h-100">
                <div class="card-header"><span>Seguridad e inicio de sesion</span></div>
                
                <div class="card-body d-flex flex-column"> 
                    <p class="card-text">Cambia tu <strong>contraseña</strong> de forma segura, revisa tu <strong>actividad</strong> reciente e implementa la verificación en dos pasos.</p>
                     <a href="{{ route('seguridad')}}">
                    <button class="btn btn-primary mt-auto"style="width: auto !important; max-width: none !important;">Configurar Seguridad</button>
                    </a>
                </div>
            </div>
        </div>
    </div> 
    <div class="row justify-content-center gx-5" style="margin-top:100px">
        <div class="col-12 col-md-6">
            <div class="card h-100">
                <div class="card-header"><span>Pedido y compras</span></div>
                <div class="card-body d-flex flex-column">
                    <p class="card-text">Revisa el historial completo de tus compras, verifica el estado de tus <strong>pedidos</strong> activos y gestiona tus facturas.</p>
                      <a href="{{ route('seguridad')}}">
                    <button class="btn btn-primary mt-auto align-self-start" style="width: auto !important; max-width: none !important;">Mostrar pedidos e historial</button>
                    </a>
                </div>
            </div>
        </div>
        <div class="col-12 col-md-6">
            <div class="card h-100">
                <div class="card-header"><span>Direcciones</span></div>
                <div class="card-body d-flex flex-column">
                    <p class="card-text"> Añade, edita o elimina tus <strong>direcciones</strong> de envío y facturación para agilizar futuras compras.</p>
                     <a href="{{ route('direcciones')}}">
                    <button class="btn btn-primary mt-auto"style="width: auto !important; max-width: none !important;">Administrar direcciones</button>
                    </a>
                </div>
            </div>
        </div>
    </div>
</div>
</div>
<footer class="pie">
        <div class="row">
            <div class="col-md-6 footer-col1" style="">
                <h3>Sobre nosotros</h3>
                <div class="sobrenosotros">
                    <p>Nos especializamos en la comercialización de productos electrónicos de segunda mano y artículos reacondicionados de alta calidad, una alternativa inteligente y sostenible. <br>  garantizamos calidad y confianza en cada transacción, permitiendo a nuestros clientes disfrutar de tecnología de punta con la tranquilidad de estar tomando una decisión económica y ecológicamente responsable.</p>

                    <h4>Enlaces rapidos</h4>
                    <div class="enlaces">
                            <a href="#">Ayuda</a>
                            <br>
                            <a href="#">Terminos y condiciones</a>
                            <br>
                            <a href="#">Privacidad</a>
                    </div>
                </div>
            </div>
             <div class=" col-md-5 footer-col2">
                <h3>Contactanos</h3>
                <div class="contactanos">
                   <label for="name" class="form-label" ></label>
                    <input type="text" class="form-control" id="" name="" placeholder="Nombre"> 
                    <label for="correo" class="form-label" ></label>
                    <input type="email" class="form-control" id="" name="" placeholder="Correo"> 
                    <label for="mensaje" class="form-label" ></label>
                     <textarea class="form-control" placeholder="Mensaje" id="floatingTextarea"></textarea>
                     <br>
                     <button class="btn btn-primary" type="submit">Enviar mensaje</button>
                </div>
            </div>
        </div>
</footer>

    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.8/dist/js/bootstrap.bundle.min.js" integrity="sha384-FKyoEForCGlyvwx9Hj09JcYn3nv7wiPVlz7YYwJrWVcXK/BmnVDxM+D2scQbITxI" crossorigin="anonymous"></script>
  </body>
</html>