<!DOCTYPE html>
<html lang="en">
    <head>
        <meta charset="UTF-8">
        <meta name="viewport" content="width=device-width, initial-scale=1.0">
        <link rel="stylesheet" href="{{ asset('DV325G') }}" /> 
        <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.8/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-..." crossorigin="anonymous">
        <title>Document</title>
    </head>

    <body>
        <nav class="barra-ayuda">
            <a href="" style="text-decoration: none; color: white;">Inicio</a>
            <div>
                <a class="nav-link dropdown-toggle account-link-custom" href="#" role="button" data-bs-toggle="dropdown" aria-expanded="false">
                    Mi Cuenta
                </a>
                <ul class="dropdown-menu">
                    <li><a class="dropdown-item" href="#">Datos de tu cuenta</a></li>
                    <li><a class="dropdown-item" href="#">Seguridad e inicio de sesion</a></li>
                    <li><a class="dropdown-item" href="#">Pedidos y compras</a></li>
                    <li><a class="dropdown-item" href="#">Direcciones</a></li>
                    <li><hr class="dropdown-divider"></li>
                    <li>
                        <a class="dropdown-item" href="{{ route('cerrarsesion') }}"onclick="event.preventDefault(); document.getElementById('logout-form').submit();">Cerrar sesión</a>
                        <form id="logout-form" action="{{ route('cerrarsesion') }}" method="POST" class="d-none">
                            @csrf
                        </form>
                    </li>
                </ul>
            </div>
        </nav>



        <div class="cuerpocarrito">

            <div class="carrito">
                <div class="card card-grande">
                    <span class="t2c">Productos</span>
                </div>
            </div>
            <div class="cuadropagar"> 
                <div class="card card-cobro">
                    <div class=t1c>
                        <span>Resumen de la compra</span><hr>
                    </div>
                    <div class=nc>
                        <span>Productos</span> <hr>
                        <span style="color: green;">Envío</span><hr>
                        <span>Total</span><hr>
                    </div>
                    <button type="button" class="btn btn-primary">Comprar</button>
                </div>
            </div>

        </div>


        




    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.8/dist/js/bootstrap.bundle.min.js" integrity="sha384-FKyoEForCGlyvwx9Hj09JcYn3nv7wiPVlz7YYwJrWVcXK/BmnVDxM+D2scQbITxI" crossorigin="anonymous"></script>
    </body>
</html>