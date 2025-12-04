<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.0.0/css/all.min.css" integrity="sha512-9usAa10IRO0HhonpyAIVpjrylPvoDwiPUiKdWk5t3PyolY1cOd4DSE0Ga+ri4AuTroPR5aQvXU9xC6qOPnzFeg==" crossorigin="anonymous" referrerpolicy="no-referrer" />
    <link rel="stylesheet" href="{{ asset('contenido.css') }}" /> 
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.8/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-..." crossorigin="anonymous">
    <title></title>
</head>
<body class="CuerpoDetalle">
    <nav class="barra-ayuda">   
            <a href="{{ route('productosbusqueda') }}" style="text-decoration: none; color: white; font-size: 20px;">Inicio</a>  
                <div class="d-flex align-items-center">
                    <a class="dropdown-item" href="{{ route('cerrarsesion') }}"onclick="event.preventDefault(); document.getElementById('logout-form').submit();" style="text-decoration: none; color: white; font-size: 20px; width:auto;"> Cerrar sesión </a>
                        <form id="logout-form" action="{{ route('cerrarsesion') }}" method="POST" class="d-none">@csrf</form>   
                </div>
   </nav>

<div class="DetalleContenido">
    <div class="DetalleImagen">
         <img src="{{ asset('storage/'.$producto->imagen) }}" style="border-radius:15px;">
    </div>
    <div class="DetalleInfo">
        <div class="DetalleNombre card">
             <p> <strong>{{$producto->nombre }}</strong></p>  
             <div class="descripcion card">
                <p>{{$producto->descripcion  }}</p>
             </div>
             <div class="descripcionContenido">
            <div class="descripcionPrecioStock">
                <p style="font-size:25px"> <strong>${{$producto->precio }} </strong></p>
                <p class="Stockcolor" style="font-size:24px">Stock: {{$producto->stock  }}</p>
            </div>
            <div class="descripcionEnvioEntrega">
                <p class="DescripcionEnvioDia" style="margin:-1px;">El envio llegara entre el miercoles y sabado</p>
                <div class="Enviogratis">
                <i class="fa-solid fa-truck"></i>
                 <p class="DescripcionEnvioGratis" style="margin:-0.7px">Envios gratis</p>
                </div>
            </div>
            <div class="DetalleInfoButton">
                <form id="form-carrito" action="{{ route('carrito+') }}" method="POST">
                    @csrf
                    <button class="btn btn-primary" type="submit">Agregar al carrito</button>
                    <button class="btn btn-primary" type="button">Comprar ahora</button>
                    <input type="hidden" name="cantidad" id="final-cantidad" value="1">
                    <input type="hidden" name="id_producto" value="{{ $producto->id_producto }}">
                    <input type="hidden" name="precio" value="{{ $producto->precio }}">
                    <input type="hidden" name="id_carrito" value="{{ $carrito->id_carrito }}">
                    <input type="hidden" name="cantidadT" value="{{ $producto->stock }}">
                    <div class="qty-dropdown-container" id="qty-selector-container">    {{--Contenedor del combobox de unidades disponibles--}}
                        <div id="qty-display-header">
                            Cantidad: <span id="current-qty">1</span> unidad
                            (<span id="product-stock">{{ $producto->stock ?? 50 }}</span> disponibles)
                            <span style="margin-left: 5px;">&#9662;</span>
                        </div>

                    <!-- Menu desplegable -->
                    <div class="qty-dropdown-menu" id="qty-dropdown-menu">
                        
                        <div class="qty-option" data-qty="1">1 unidad</div>
                        <div class="qty-option" data-qty="2">2 unidades</div>
                        <div class="qty-option" data-qty="3">3 unidades</div>
                        <div class="qty-option" data-qty="4">4 unidades</div>
                        <div class="qty-option" data-qty="5">5 unidades</div>
                            <div class="qty-option" id="custom-qty-trigger">
                                <span style="font-weight: bold;">6 o más</span> unidades
                            </div>
                        
                            <div class="qty-custom-input-group" id="custom-qty-group" style="display: none;">
                                <input type="number" id="custom-qty-value" placeholder="Cantidad" min="1" value="6">
                                <button id="custom-qty-apply-btn" type="button">Aplicar</button>
                            </div>
                        </div>
                    </div>
                </form>
                <script>
                    const qtyContainer = document.getElementById('qty-selector-container');
                    const qtyHeader = document.getElementById('qty-display-header');
                    const qtyMenu = document.getElementById('qty-dropdown-menu');
                    const customTrigger = document.getElementById('custom-qty-trigger');
                    const customGroup = document.getElementById('custom-qty-group');
                    const customInput = document.getElementById('custom-qty-value');
                    const customApplyBtn = document.getElementById('custom-qty-apply-btn');
                    const currentQtySpan = document.getElementById('current-qty');
                    const productStock = parseInt(document.getElementById('product-stock').textContent);
                    const finalQuantityInput = document.getElementById('final-cantidad'); 

                    // Función para actualizar la cantidad seleccionada
                    function updateSelectedQuantity(qty) {
                        let finalQty = Math.min(qty, productStock); // Limitar al stock
                        if (finalQty < 1) finalQty = 1; // Mínimo 1
                        finalQuantityInput.value = finalQty; 
                        currentQtySpan.textContent = finalQty;
                        // Opcional: Aquí puedes agregar lógica para enviar la cantidad vía AJAX o actualizar un campo oculto del formulario.
                        console.log(`Cantidad actualizada a: ${finalQty}`);
                        
                        // Ocultar el menú después de la selección
                        qtyMenu.classList.remove('show');
                        customGroup.style.display = 'none'; // Asegura que el input se oculte
                        customTrigger.style.display = 'block'; // Asegura que el trigger vuelva
                    }

                    // 1. Mostrar/Ocultar el menú al hacer clic en el encabezado
                    qtyHeader.addEventListener('click', () => {
                        qtyMenu.classList.toggle('show');
                        // Resetear el input personalizado al abrir el menú
                        customGroup.style.display = 'none';
                        customTrigger.style.display = 'block';
                    });

                    // 2. Manejar las opciones predefinidas (1 a 5)
                    qtyMenu.querySelectorAll('.qty-option').forEach(item => {
                        if (!item.id) { // Solo las opciones que tienen data-qty
                            item.addEventListener('click', (e) => {
                                const qty = parseInt(e.target.dataset.qty);
                                updateSelectedQuantity(qty);
                            });
                        }
                    });

                    // 3. Manejar el clic en "6 o más unidades"
                    customTrigger.addEventListener('click', () => {
                        customTrigger.style.display = 'none'; // Ocultar el texto "6 o más"
                        customGroup.style.display = 'flex';   // Mostrar el input y botón
                        customInput.focus();
                    });

                    // 4. Manejar el clic en el botón "Aplicar"
                    customApplyBtn.addEventListener('click', () => {
                        const qty = parseInt(customInput.value);
                        if (isNaN(qty) || qty < 1) {
                            // En un entorno real usarías un modal o un mensaje inline, no alert()
                            alert("Ingresa una cantidad válida."); 
                            return;
                        }
                        updateSelectedQuantity(qty);
                    });

                    // 5. Ocultar si se hace clic fuera
                    document.addEventListener('click', (e) => {
                        if (!qtyContainer.contains(e.target)) {
                            qtyMenu.classList.remove('show');
                            customGroup.style.display = 'none';
                            customTrigger.style.display = 'block';
                        }
                    });

                    // Inicializar la cantidad al cargar (si es mayor a 5)
                    if (productStock < 6) {
                        // Si el stock es bajo, solo muestra las opciones disponibles y oculta el trigger
                        customTrigger.style.display = 'none'; 
                    }
                </script>
            </div>
            <div class="descripcionPoliticas card">
                <p> <strong class="DevolucionGratis">Devolución gratis </strong> <span class="Terminos">tienes 30 días desde que lo recibes, tambien obten el producto que esperabas o te devolvemos tu dinero.</span> </p>
            </div>
             <div class="divDetalleFormadepago card">
                 <h4 class="card title">Metodos de pagos disponible</h4>
                <div class="tituloMetododepago">
                    <h5 > <u> Tarjetas de credito </u></h5>
                </div>
                <div class="TarjetasDePago title">
                    <div class="debito " style="width:100px">
                        <img src="https://http2.mlstatic.com/storage/logos-api-admin/9cf818e0-723a-11f0-a459-cf21d0937aeb-m.svg" alt="">
                    </div>
                    <div class="debito2 " style="width:100px">
                        <img src="https://http2.mlstatic.com/storage/logos-api-admin/312238e0-571b-11e8-823a-758d95db88db-m.svg"" alt="">
                    </div>
                    <div class="debito3" style="width:100px">
                        <img src="https://http2.mlstatic.com/storage/logos-api-admin/1aa15450-627c-11ec-909f-0dbec338a4e0-m.svg" alt="">
                    </div>
                </div>
                <div class="tituloMetododepago2">
                    <h5> <u> Tarjetas de debito </u> </h5>
                </div>
                <div class="TarjetasDePago2">
                    <div class="credito" style="width:100px">
                        <img src="https://http2.mlstatic.com/storage/logos-api-admin/2b3223a0-eaf7-11eb-9a80-1175871fb85a-m.svg" alt="">
                    </div>
                    <div class="credito2" style="width:100px">
                        <img src="https://http2.mlstatic.com/storage/logos-api-admin/a5f047d0-9be0-11ec-aad4-c3381f368aaf-m.svg" alt="">
                    </div>
                    <div class="credito3">
                        <img src="https://http2.mlstatic.com/storage/logos-api-admin/9cf818e0-723a-11f0-a459-cf21d0937aeb-m.svg" alt="">
                    </div>
                </div>
                <div class="tituloMetododepago3">
                    <h5> <u> Pago en efectivo </u></h5>
                </div>

                <div class="TarjetasDePago3">
                    <div class="efectivo" style="width:100px">
                        <img src="https://http2.mlstatic.com/storage/logos-api-admin/87075440-571e-11e8-823a-758d95db88db-m.svg" alt="">
                    </div>
                    <div class="efectivo2" style="width: 100px;">
                       <img src=" https://http2.mlstatic.com/storage/logos-api-admin/23a95840-6817-11ec-a13d-73e40a9e9500-m.svg" alt="">
                    </div>
                </div>
             </div>
             </div>
          </div>
    </div>
</div>



    <footer class="pieContenido">
        <div class="conteInfo">
            <div class="ContenidoEnlaces">
                <ul>
                    <li> <a href="#"></a>Ayuda</li>
                    <li> <a href="#"></a>Privacidad</li>
                    <li> <a href="#"></a>Terminos y condiciones</li>
                    <li> <a href="#"></a>Contactanos</li>
                    <li> <a href="#"></a>Accesibilidad</li>
                    <li> <a href="#"></a>Preguntas frecuentes</li>
                </ul>
            </div>
            <div class="ContenidoCopy">
                Copyright © 2025-2025 El presente canal de instrucción o ambiente, es operado por SkibidiUadeo de México, S. de R.L. de C.V. identificada bajo la marca comercial "Mercado Pobre".
            </div>
        </div>
    </footer>
<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.8/dist/js/bootstrap.bundle.min.js" integrity="sha384-..." crossorigin="anonymous"></script>
</body>
</html>