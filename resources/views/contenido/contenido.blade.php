<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>MercadoPobre</title>
    <link rel="stylesheet" href="{{ asset('contenido.css') }}" /> 
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.8/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-..." crossorigin="anonymous">
</head>
<body>
<!--SOLAMENTE LA NABVAR -->
<div class="offcanvas offcanvas-start" tabindex="-1" id="menuLateral" aria-labelledby="menuLateralLabel">
    <div class="offcanvas-header bg-dark text-white p-3">
        <h5 class="offcanvas-title" id="menuLateralLabel">Menú</h5>
        <button type="button" class="btn-close btn-close-white" data-bs-dismiss="offcanvas" aria-label="Cerrar"></button>
    </div>
    <div class="offcanvas-body p-0" style="background-color: #9854abff;">
        <ul class="list-group list-group-flush menu-list-custom">
            
            <li class="list-group-item bg-dark text-white fw-bold">INICIO</li>
            <li class="list-group-item bg-dark text-white fw-bold mt-2">TENDENCIAS</li>
            <li class="list-group-item">
                <a href="#" class="text-white text-decoration-none">LO MÁS VENDIDO</a>
            </li>
            <li class="list-group-item">
                <a href="#" class="text-white text-decoration-none">LO NUEVO</a>
            </li>
            <li class="list-group-item border-bottom-0">
                <a href="#" class="text-white text-decoration-none">PRODUCTOS DEL MOMENTO</a>
            </li>

            <li class="list-group-item bg-dark text-white fw-bold mt-3">CATEGORÍAS</li>
            <li class="list-group-item">
                <a href="#" class="text-white text-decoration-none">PELÍCULAS</a>
            </li>
            <li class="list-group-item">
                <a href="#" class="text-white text-decoration-none">JUGUETES</a>
            </li>
            <li class="list-group-item bg-dark text-white fw-bold mt-3 border-top border-secondary">AYUDA Y CONFIGURACIÓN</li>
            <li class="list-group-item">
                <a href="#" class="text-white text-decoration-none">CONFIGURACION</a>
            </li>
            <li class="list-group-item">
                <a href="#" class="text-white text-decoration-none">AYUDA</a>
            </li>
        </ul>
    </div>
</div>
<nav class="barra">
    <div class="search-pill-container">
        <button class="btn menu-btn-pill" type="button" 
                data-bs-toggle="offcanvas" data-bs-target="#menuLateral" 
                aria-controls="menuLateral">
            <img src="{{ asset('img/menu.png') }}" alt="Menú">
        </button>
        
        <form class="d-flex search-form-pill" role="search">
            <input class="form-control search-input-pill" 
                   type="search" 
                   placeholder="Buscar productos..." 
                   aria-label="Search"/>
        </form>
    </div>
    <a class="nav-link dropdown-toggle account-link-custom" href="#" role="button" data-bs-toggle="dropdown" aria-expanded="false">
        Mi Cuenta
    </a>
    <ul class="dropdown-menu">
        <li><a class="dropdown-item" href="#">Datos de tu cuenta</a></li>
        <li><a class="dropdown-item" href="#">Seguridad e inicio de sesion</a></li>
        <li><a class="dropdown-item" href="#">Pedidos y compras</a></li>
        <li><a class="dropdown-item" href="#">Direcciones</a></li>
        <li><hr class="dropdown-divider"></li>
        <li><a class="dropdown-item" href="#">Cerrar sesion</a></li>
    </ul>
</nav>

<!-- CONTENIDO -->
<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.8/dist/js/bootstrap.bundle.min.js" integrity="sha384-..." crossorigin="anonymous"></script>
</body>
</html>