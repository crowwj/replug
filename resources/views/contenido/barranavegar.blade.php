<!--SOLAMENTE LA NABVAR: cuando hagas un nuevo php. solo incluye esto en cada pagina -->
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
    <div class="carrito">
        <a href=""> Mi carrito </a>
    </div>
    <div class="vender">
         <a href="">Vender Producto</a>
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
        <li>
            <a class="dropdown-item" href="{{ route('cerrarsesion') }}"
                onclick="event.preventDefault(); document.getElementById('logout-form').submit();">
                Cerrar sesión
            </a>
            <form id="logout-form" action="{{ route('cerrarsesion') }}" method="POST" class="d-none">
                @csrf
            </form>
        </li>
    </ul>
</nav>