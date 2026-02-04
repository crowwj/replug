<!DOCTYPE html>
<html lang="es">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>MercadoPobre</title>

    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.0.0/css/all.min.css">
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css" rel="stylesheet">
    <link rel="stylesheet" href="{{ asset('contenido.css') }}">
</head>

<body class="CuerpoContenido">

    @include('contenido.barranavegar')

    <main class="page-container">

        <!-- CONTENEDOR CENTRADO (CLAVE) -->
        <div class="products-container">

            <header class="section-title">
                <h4 class="Subtitle">PRODUCTOS</h4>
            </header>

            @if (!empty($productos))
                <section class="products-grid">
                    @foreach ($productos as $producto)
                        <article class="product-card">

                            <div class="product-image">
                                <img src="{{ asset('storage/'.$producto->imagen) }}"
                                     alt="{{ $producto->nombre }}">
                            </div>

                            <div class="product-info">
                                <p class="product-name">{{ $producto->nombre }}</p>
                                <p class="product-price">
                                    ${{ number_format($producto->precio, 2) }}
                                </p>
                            </div>

                            <a href="{{ route('detalle',['id'=> $producto->id_producto ]) }}"
                               class="btn btn-primary product-btn">
                                Ver
                            </a>

                        </article>
                    @endforeach
                </section>
            @else
                <p class="no-products">❌ No se encontraron productos.</p>
            @endif

            <div class="pagination-wrapper">
                {{ $productos->links() }}
            </div>

        </div>
    </main>

    <footer class="pieContenido">
        <ul class="footer-links">
            <li><a href="#">Ayuda</a></li>
            <li><a href="#">Privacidad</a></li>
            <li><a href="#">Términos</a></li>
            <li><a href="#">Contacto</a></li>
            <li><a href="#">Accesibilidad</a></li>
            <li><a href="#">FAQ</a></li>
        </ul>

        <p class="footer-copy">
            © 2025 Mercado Pobre — Operado por SkibidiUadeo de México
        </p>
    </footer>

    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/js/bootstrap.bundle.min.js"></script>
</body>
</html>
