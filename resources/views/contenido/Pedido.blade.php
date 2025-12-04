<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
     <link rel="stylesheet" href="{{ asset('contenido.css') }}" /> 
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.0.0/css/all.min.css" integrity="sha512-9usAa10IRO0HhonpyAIVpjrylPvoDwiPUiKdWk5t3PyolY1cOd4DSE0Ga+ri4AuTroPR5aQvXU9xC6qOPnzFeg==" crossorigin="anonymous" referrerpolicy="no-referrer" />
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.8/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-sRIl4kxILFvY47J16cr9ZwB07vP4J8+LH7qKQnuqkuIAvNWLzeN8tE5YBujZqJLB" crossorigin="anonymous">
    <title></title>
</head>
<body class="CuerpoPadrePedidos">
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
        </div>
    </nav>

    <div class="CabezaPedidos">
        <div class="tituloPedidos">
            <a href="" class="HisCompra"><span>Historial de compras</span></a>
            <a href="" class="Pend"><span>Pendientes</span></a>
            
        </div>
    </div>

    <div class="MostrarPedido">
        <div class="SubtituloPedido">
            <h5>Producto</h5>
        </div>
        <div class="VisualizacionPedido">
        <div class="ImagenProducto">
            <img src="{{ asset('img/laptopgaming.png') }}" alt="">
        </div>
        <div class="PedidosInfo">
            <div class="NombreProducto">
                <h4>Titulo</h4>
            </div>
            <div class="PrecioPedido">
                <h4>Mx$1000</h4>
                <p>Devoluciones Gratis y Entrega Rapida</p>
            </div>
            <div class="CantidadPedido">
                <h4>5</h4>
            </div>
        </div>
        <div class="PedidoBotones">
            <h5>Total</h5>
            <button>Agregar cesta</button>
            <button>Borrar</button>
        </div>
        </div>
    </div>


<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.8/dist/js/bootstrap.bundle.min.js" integrity="sha384-FKyoEForCGlyvwx9Hj09JcYn3nv7wiPVlz7YYwJrWVcXK/BmnVDxM+D2scQbITxI" crossorigin="anonymous"></script>
</body>
</html>