<!--SOLAMENTE LA NABVAR: cuando hagas un nuevo php. solo incluye esto en cada pagina -->
<nav class="barra">
    <div class="search-pill-container">
        <i class="fa-solid fa-magnifying-glass" style="padding:10px"></i>
        <form action="{{ route('productosbusqueda') }}" method="get" class="d-flex search-form-pill" role="search">
            <input class="form-control search-input-pill" type="search" placeholder="Buscar productos..." aria-label="Search"name = "busqueda"/>
            <input type="hidden" name="categoriaToken" value="{{ $categoriaToken }}"/>
        </form>
    </div>
        <form action="{{ route('productosbusqueda') }}" method="get">{{-- combo de categorias junto a la barra --}}
            <select class='opcionesCategorias'name="categoriaToken" id="filtroCategoriaBusqueda"  onchange="this.form.submit()"> 
                    <option value="" {{ empty(old('categoria', $categoriaToken)) ? 'selected' : '' }}>Mostrar Categorías</option> 
                    @foreach ($categorias as $categoria)   
                    <option value="{{ $categoria->id_categoria }}" {{ old('categoria', $categoriaToken) == $categoria->id_categoria ? 'selected' : '' }}>
                    {{ $categoria->nombre }} {{-- Se mostrara el valor de nombre que tiene el registro(categoria) de la lista de registros(categorias) --}}
                    </option>
                    @endforeach
                    
            </select>
        </form>
    <div class="carrito2">
        <a href=""> <i class="fa-solid fa-cart-shopping"></i> Mi carrito </a>
    </div>
    <div class="vender">
         <a href="{{ route('micuenta') }}"><i class="fa-solid fa-hand-holding-dollar"></i> Vender Producto</a>
    </div>
    @include('contenido.comboMicuenta')
</nav>