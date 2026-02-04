<nav class="barra">
    <div class="BarraContenido">
        <div class="Logo">
            <div class="logo"><img src="{{ asset('img/gatologo3.png') }}"></img></div>
            <div class="direcicones">Dirección de envío</div>
        </div>
        <div class="search-pill-container">
            <i class="fa-solid fa-magnifying-glass"style="padding:10px"></i>
            <form action="{{ route('productosbusqueda') }}" method="get" class="d-flex search-form-pill" role="search">
                <input class="form-control search-input-pill" type="search" placeholder="Buscar productos..." aria-label="Search"name = "busqueda"/>
                <input type="hidden" name="categoriaToken" value="{{ $categoriaToken }}"/>
            </form>
        </div>
            <form action="{{ route('productosbusqueda') }}" method="get">{{-- combo de categorias junto a la barra --}}
                <select class='opcionesCategorias' name="categoriaToken" id="filtroCategoriaBusqueda"  onchange="this.form.submit()"> 
                        <option value="" {{ empty(old('categoria', $categoriaToken)) ? 'selected' : '' }}>Todas</option> 
                        @foreach ($categorias as $categoria)   
                        <option value="{{ $categoria->id_categoria }}" {{ old('categoria', $categoriaToken) == $categoria->id_categoria ? 'selected' : '' }}>
                        {{ $categoria->nombre }}
                        </option>
                        @endforeach
                </select>
            </form>
        <div class="carrito2">
            <a href="{{route ('desplegar')}}"> <i class="fa-solid fa-cart-shopping"></i> Mi carrito </a>
        </div>
        <div class="vender">
            <a href="{{ route('categorias') }}"><i class="fa-solid fa-hand-holding-dollar"></i> Vender Producto</a>
        </div>
        @include('contenido.comboMicuenta')
    </div>
</nav>