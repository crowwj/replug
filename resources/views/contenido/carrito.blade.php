<!DOCTYPE html>
<html lang="en">
    <head>
        <meta charset="UTF-8">
        <meta name="viewport" content="width=device-width, initial-scale=1.0">
        <link rel="stylesheet" href="{{ asset('DV325G') }}" /> 
        <meta name="csrf-token" content="{{ csrf_token() }}">
        <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.8/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-..." crossorigin="anonymous">
        <title>Document</title>
    </head>

    <div class="cuerpocarrito">
    {{-- Mensajes de sesión de ÉXITO --}}
    @if (session('success'))
        <div id="alert-session-success" class="bg-green-100 border border-green-400 text-green-700 px-4 py-3 rounded relative mb-4">
            <span class="block sm:inline">{{ session('success') }}</span>
        </div>
    @endif
    
    {{-- Mensajes de sesión de ERROR --}}
    @if (session('error'))
        <div id="alert-session-error" class="bg-red-100 border border-red-400 text-red-700 px-4 py-3 rounded relative mb-4">
            <span class="block sm:inline">{{ session('error') }}</span>
        </div>
    @endif
    
    {{-- Contenedor de Alertas Dinámicas (solo para errores críticos de red/ruta) --}}
    <div id="dynamic-alert" style="display:none;" class="px-4 py-3 rounded relative mb-4 font-medium"></div>

    <div class="carrito">
        <div class="card card-grande shadow-xl rounded-xl p-6 bg-white">
            <span class="t2c text-2xl font-bold text-gray-800 border-b pb-2 block mb-4">Productos</span>
            <div id="carrito-items-container">
                @if ($productoscar->isEmpty())
                    <p class="text-gray-600" id="empty-cart-message">Tu carrito está vacío.</p>
                @else
                    <div class="space-y-4">
                        {{-- Inicia el bucle foreach --}}
                        @foreach ($productoscar as $item)
                            <div class="item-row flex items-center justify-between p-4 bg-gray-50 shadow-md rounded-lg border"
                                data-id-detalle="{{ $item->id_carrito_detalle }}"
                                data-precio-unitario="{{ $item->precio_unitario }}"
                                data-stock-maximo="{{ $item->stock_maximo }}">
                                
                                {{-- 1. IMAGEN DEL PRODUCTO (80x80) --}}
                                <div class="w-20 h-20 mr-4 flex-shrink-0">
                                    <img src="{{ asset('storage/' . $item->imagen) }}" 
                                         alt="Imagen de {{ $item->nombre }}"
                                         class="w-full h-full object-cover rounded-md border border-gray-200 shadow-sm">
                                </div>

                                {{-- 2. Nombre del Producto y Stock --}}
                                <div class="flex-1 min-w-0 mr-4">
                                    <p class="text-lg font-semibold text-gray-800">{{ $item->nombre }}</p>
                                    <p class="text-xs text-gray-400">Stock máx: {{ $item->stock_maximo }}</p>
                                </div>

                                {{-- 3. Controles de Cantidad (+/-) y Feedback de Stock --}}
                                <div class="flex flex-col items-end space-y-1 mx-4"> 
                                    {{-- Contenedor de Botones --}}
                                    <div class="flex items-center border border-indigo-500 rounded-lg overflow-hidden shadow-sm">
                                        {{-- Botón Menos --}}
                                        <button onclick="updateQuantity({{ $item->id_carrito_detalle }}, 'minus')" 
                                                class="p-2 bg-indigo-50 hover:bg-indigo-100 text-indigo-700 font-bold transition duration-150 text-base" 
                                                aria-label="Disminuir cantidad">
                                            &minus;
                                        </button>
                                        
                                        {{-- Display de Cantidad --}}
                                        <span class="quantity-display w-10 text-center font-bold text-base text-gray-800" 
                                              data-cantidad-actual="{{ $item->cantidad }}">
                                            {{ $item->cantidad }}
                                        </span>
                                        
                                        {{-- Botón Más --}}
                                        <button onclick="updateQuantity({{ $item->id_carrito_detalle }}, 'plus')" 
                                                class="p-2 bg-indigo-50 hover:bg-indigo-100 text-indigo-700 font-bold transition duration-150 text-base" 
                                                aria-label="Aumentar cantidad">
                                            &plus;
                                        </button>
                                    </div>
                                    
                                    {{-- FEEDBACK DE STOCK --}}
                                    <span class="stock-feedback text-xs font-semibold text-red-600 mt-1" style="height: 12px;"></span>
                                </div>

                                {{-- 4. Precio Unitario --}}
                                <div class="w-24 text-right hidden sm:block">
                                    <p class="text-sm font-medium text-gray-600">P. Unitario</p>
                                    <p class="text-lg font-bold text-green-600">
                                        ${{ number_format($item->precio_unitario, 2) }}
                                    </p>
                                </div>

                                {{-- 5. Subtotal (calculado) --}}
                                <div class="w-24 text-right ml-4">
                                    <p class="text-sm font-medium text-gray-600">Subtotal</p>
                                    @php
                                        $subtotal = $item->cantidad * $item->precio_unitario;
                                    @endphp
                                    <p class="subtotal-display text-xl font-extrabold text-blue-800">
                                        ${{ number_format($subtotal, 2) }}
                                    </p>
                                </div>
                                
                                {{-- 6. BOTÓN DE ELIMINACIÓN (Usando el formulario DELETE) --}}
                                <div class="ml-4 flex-shrink-0">
                                    <form action="{{ route('eliminarproducto', $item->id_carrito_detalle) }}" method="POST" 
                                          onsubmit="return confirm('¿Estás seguro de que quieres eliminar este producto del carrito?');">
                                        @csrf
                                        @method('DELETE') {{-- DIRECTIVA CLAVE para enviar DELETE --}}
                                        <button type="submit" 
                                                class="p-2 text-red-500 rounded-full hover:bg-red-100 transition duration-150" 
                                                title="Eliminar producto del carrito">
                                            <!-- Icono de Basura (SVG simple) -->
                                            <svg class="w-6 h-6" fill="none" stroke="currentColor" viewBox="0 0 24 24" xmlns="http://www.w3.org/2000/svg"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M19 7l-.867 12.142A2 2 0 0116.138 21H7.862a2 2 0 01-1.995-1.858L5 7m5 4v6m4-6v6m1-10V4a1 1 0 00-1-1h-4a1 1 0 00-1 1v3M4 7h16"></path></svg>
                                        </button>
                                    </form>
                                </div>
                                
                            </div>
                        @endforeach
                        {{-- Finaliza el bucle foreach --}}
                    </div>
                @endif
            </div>
        </div>
    </div>

    <div class="cuadropagar mt-8 lg:mt-0"> 
        {{-- Clases de deshabilitación si el carrito está vacío --}}
        <div class="card card-cobro shadow-xl rounded-xl p-6 bg-white @if ($productoscar->isEmpty()) opacity-50 pointer-events-none @endif" id="resumen-totales">
            <div class="t1c">
                <span class="text-2xl font-bold text-gray-800">Resumen de la compra</span><hr class="my-3">
            </div>
            
            <div class="nc space-y-3 text-gray-700">
                {{-- Total de Productos --}}
                <div class="flex justify-between items-center">
                    <span>Productos(<span id="cantidad-total-items-display">{{$cantidadT}}</span>):</span>
                    <span id="subtotal-global-display">${{ number_format($total, 2) }}</span>
                </div>
                <hr>
                
                {{-- Costo de Envío (manteniendo tu estilo) --}}
                <div class="flex justify-between items-center">
                    <span style="color: green;">Envío</span>
                    <span style="color: green;">GRATIS</span>
                </div>
                <hr>
                
                {{-- Total Final --}}
                <div class="flex justify-between items-center text-xl font-extrabold text-gray-900 pt-2">
                    <span>Total:</span>
                    <span id="total-monetario" class="text-red-600">${{ number_format($total, 2) }}</span>
                </div>
                <hr>
            </div>
            
            {{-- EL BOTÓN DE COMPRA AHORA ES UN SUBMIT DENTRO DE UN FORMULARIO --}}
            <form action="{{ route('carrito.confirmar') }}" method="POST"
                  onsubmit="return confirm('Continuar el pedido? Se procesará el cobro del pedido.');">
                @csrf
                <button type="submit" 
                        id="btn-comprar"
                        @if ($productoscar->isEmpty()) disabled @endif
                        class="btn btn-primary w-full mt-6 py-3 bg-indigo-600 text-white text-lg font-semibold rounded-lg hover:bg-indigo-700 transition duration-300 shadow-md disabled:bg-gray-400 disabled:cursor-not-allowed">
                    Comprar y Pagar
                </button>
            </form>
        </div>
    </div>
</div>

<script>
    // 1. MANEJO ROBUSTO DEL CSRF TOKEN
    var csrfToken = '';
    var csrfMetaTag = document.querySelector('meta[name="csrf-token"]');
    if (csrfMetaTag) {
        csrfToken = csrfMetaTag.getAttribute('content');
    } else {
        console.error("ERROR CRÍTICO (CSRF): No se encontró la metaetiqueta 'csrf-token'. Asegúrate de que tu plantilla principal tenga: <meta name='csrf-token' content='{{ csrf_token() }}'>");
    }

    var apiUrl = '/carrito/actualizar-cantidad'; 

    function formatCurrency(value) {
        return `$${parseFloat(value).toFixed(2).replace(/\B(?=(\d{3})+(?!\d))/g, ",")}`;
    }

    /**
     * Muestra una alerta dinámica en la interfaz, solo para errores críticos (red/ruta).
     */
    function showAlert(message, type) {
        // Solo maneja errores críticos
        if (type !== 'error') {
            return; 
        }
        
        const alertDiv = document.getElementById('dynamic-alert');
        alertDiv.textContent = message;
        alertDiv.className = ''; 
        
        alertDiv.classList.add('bg-red-100', 'border-red-400', 'text-red-700', 'border', 'px-4', 'py-3', 'rounded', 'relative', 'mb-4', 'font-medium');
        
        alertDiv.style.display = 'block';
        
        document.getElementById('alert-session-success')?.remove();
        document.getElementById('alert-session-error')?.remove();

        setTimeout(() => {
            alertDiv.style.display = 'none';
        }, 6000);
    }
    
    /**
     * Muestra el feedback de stock en la fila del ítem y lo oculta después de 3 segundos.
     */
    function showStockFeedback(itemRow, message) {
        const feedbackElement = itemRow.querySelector('.stock-feedback');
        if (feedbackElement) {
            feedbackElement.textContent = message;
            setTimeout(() => {
                feedbackElement.textContent = ''; // Ocultar mensaje
            }, 3000);
        }
    }


    /**
     * Recalcula y actualiza el total monetario y la cantidad total de ítems.
     */
    function recalculateTotals() {
        let globalTotal = 0;
        let globalItems = 0;

        document.querySelectorAll('.item-row').forEach(row => {
            const qtyElement = row.querySelector('.quantity-display');
            const qty = parseInt(qtyElement.dataset.cantidadActual) || 0; 
            const price = parseFloat(row.dataset.precioUnitario);
            
            globalItems += qty;
            globalTotal += (qty * price);
        });

        const formattedTotal = formatCurrency(globalTotal);
        
        // Actualizar resumen de totales
        document.getElementById('cantidad-total-items-display').textContent = globalItems;
        document.getElementById('subtotal-global-display').textContent = formattedTotal;
        document.getElementById('total-monetario').textContent = formattedTotal;
        
        // --- LÓGICA DE DESHABILITAR/HABILITAR EL RESUMEN DE COMPRA ---
        const container = document.getElementById('carrito-items-container');
        const resumen = document.getElementById('resumen-totales');
        // NOTA: El botón de compra ahora está dentro del formulario. Lo buscamos.
        const buyButton = resumen.querySelector('#btn-comprar');
        
        if (globalItems === 0) {
            // Reinsertar el mensaje de carrito vacío si fue eliminado por una eliminación
            if (!document.getElementById('empty-cart-message')) {
                container.innerHTML = `<p class="text-gray-600" id="empty-cart-message">Tu carrito está vacío.</p>`;
            }

            // Deshabilitar visualmente el resumen de compra
            resumen.classList.add('opacity-50', 'pointer-events-none');
            if (buyButton) buyButton.disabled = true;

        } else {
            // Habilitar visualmente el resumen de compra
            resumen.classList.remove('opacity-50', 'pointer-events-none');
            if (buyButton) buyButton.disabled = false;
        }
        // --- FIN DE LA LÓGICA DE DESHABILITAR/HABILITAR ---
    }

    /**
     * Lógica principal para actualizar la cantidad del carrito (DB y UI).
     */
    async function updateQuantity(idDetalle, operation) {
        const itemRow = document.querySelector(`.item-row[data-id-detalle="${idDetalle}"]`);
        if (!itemRow) return;
        
        // Limpiar feedback de stock anterior
        showStockFeedback(itemRow, ''); 

        const qtyDisplay = itemRow.querySelector('.quantity-display');
        const stockMaximo = parseInt(itemRow.dataset.stockMaximo);

        let currentQty = parseInt(qtyDisplay.dataset.cantidadActual);
        let newQty = currentQty;

        if (operation === 'plus') {
            newQty += 1;
        } else if (operation === 'minus') {
            newQty -= 1;
        }
        
        // --- VALIDACIÓN CONTEXTUAL DE STOCK (CLIENTE) ---
        if (newQty > stockMaximo) {
            showStockFeedback(itemRow, `Máx. ${stockMaximo}`); // Muestra el mensaje contextual
            return;
        }
        if (newQty < 0) return; 
        
        if (!csrfToken) {
            showAlert('Error de seguridad: Token CSRF no disponible. (Revisa la consola)', 'error');
            return;
        }

        // Bloquear botones e indicar carga
        const buttons = itemRow.querySelectorAll('button');
        buttons.forEach(btn => btn.disabled = true);
        qtyDisplay.classList.add('opacity-50');

        try {
            const response = await fetch(apiUrl, {
                method: 'POST',
                headers: {
                    'Content-Type': 'application/json',
                    'X-CSRF-TOKEN': csrfToken 
                },
                body: JSON.stringify({
                    id_detalle: idDetalle,
                    nueva_cantidad: newQty
                })
            });

            // --- MANEJO DE ERRORES HTTP (4xx, 5xx) ---
            if (!response.ok) {
                let errorMessage = `Error al actualizar: Status ${response.status}`;
                
                if (response.status === 404) {
                    errorMessage = 'ERROR 404: Ruta API no encontrada. Asegúrate de definir la ruta POST en Laravel.';
                } else if (response.status === 419) {
                    errorMessage = 'Sesión expirada (Error CSRF). Recarga la página.';
                } else {
                    const errorBody = await response.json().catch(() => ({})); 
                    if (errorBody.message) {
                        errorMessage = errorBody.message; 
                    } 
                }
                
                showAlert(errorMessage, 'error');
                return; 
            }
            
            // --- PROCESAMIENTO DE RESPUESTA EXITOSA (Status 200) ---
            const data = await response.json();

            if (data.success) {
                // Actualizar UI sin mostrar alerta
                if (newQty > 0) {
                    qtyDisplay.textContent = newQty;
                    qtyDisplay.dataset.cantidadActual = newQty; 
                    const precioUnitario = parseFloat(itemRow.dataset.precioUnitario);
                    const newSubtotal = newQty * precioUnitario;
                    const subtotalDisplay = itemRow.querySelector('.subtotal-display');
                    subtotalDisplay.textContent = formatCurrency(newSubtotal);
                } else {
                    itemRow.remove(); 
                }

                recalculateTotals();

            } else {
                // Si el backend devuelve success: false (ej. error de stock del servidor)
                showStockFeedback(itemRow, data.message || 'Error de stock.');
            }

        } catch (error) {
            // Esto atrapa errores de red
            showAlert('Error de red. Revisa tu conexión y que el servidor esté activo.', 'error');
        } finally {
            // Desbloquear botones
            buttons.forEach(btn => btn.disabled = false);
            qtyDisplay.classList.remove('opacity-50');
        }
    }
    
    /**
     * Lógica para que los mensajes de sesión (éxito o error) desaparezcan automáticamente
     */
    document.addEventListener('DOMContentLoaded', () => {
        recalculateTotals(); // Asegura que los totales se calculen al cargar la página

        const successAlert = document.getElementById('alert-session-success');
        const errorAlert = document.getElementById('alert-session-error');

        // Función para ocultar alertas después de un tiempo
        const hideAlert = (element) => {
            if (element) {
                setTimeout(() => {
                    element.remove();
                }, 4000); // 4 segundos
            }
        };

        hideAlert(successAlert);
        hideAlert(errorAlert); 
    });
</script>

                
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.8/dist/js/bootstrap.bundle.min.js" integrity="sha384-FKyoEForCGlyvwx9Hj09JcYn3nv7wiPVlz7YYwJrWVcXK/BmnVDxM+D2scQbITxI" crossorigin="anonymous"></script>
    </body>
</html>