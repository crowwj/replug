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
                @foreach ($categorias as $categoria) {{--Listado de categorias en la pestana desplegable de la izquierda--}}
                <li class="list-group-item">
                    <a href="{{ route('productosbusqueda', ['categoriaToken' => $categoria->id_categoria ]) }}" class="{{ request('categoriaToken') == $categoria->id_categoria ? 'activa' : '' }}">{{ $categoria->nombre }}</a>
                </li>
                @endforeach
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
        
        <form action="{{ route('productosbusqueda') }}" method="get" class="d-flex search-form-pill" role="search">
            <input class="form-control search-input-pill" 
                   type="search" 
                   placeholder="Buscar productos..." 
                   aria-label="Search"
                   name = "busqueda"/>
            <input type="hidden" name="categoriaToken" value="{{ $categoriaToken }}"/>
        </form>
    </div>
        <form action="{{ route('productosbusqueda') }}" method="get">{{-- combo de categorias junto a la barra --}}
            <select name="categoriaToken" id="filtroCategoriaBusqueda" style="padding: 8px; border-radius: 4px;" onchange="this.form.submit()">
                    
                    <option value="" {{ empty(old('categoria', $categoriaToken)) ? 'selected' : '' }}>Todas las Categorías</option> 
                    
                    @foreach ($categorias as $categoria)
                        
                    <option value="{{ $categoria->id_categoria }}" {{ old('categoria', $categoriaToken) == $categoria->id_categoria ? 'selected' : '' }}>
                    {{ $categoria->nombre }} {{-- Se mostrara el valor de nombre que tiene el registro(categoria) de la lista de registros(categorias) --}}
                    </option>
                    @endforeach
                    
            </select>
        </form>
    <div class="carrito2">
        <a href=""> Mi carrito </a>
    </div>
    <div class="vender">
         <a href="">Vender Producto</a>
    </div>
    @include('contenido.comboMicuenta')
</nav>