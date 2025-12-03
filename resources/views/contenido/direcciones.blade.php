<!DOCTYPE html>
<html lang="en">
  <head>
      <meta charset="UTF-8">
      <meta name="viewport" content="width=device-width, initial-scale=1.0">
      <link rel="stylesheet" href="{{ asset('DV325G') }}" />
      <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.8/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-..." crossorigin="anonymous">
      <title></title>
  </head>
  
  <body class="PadreDirecciones">
    <nav class="barra-ayuda">   
            <a href="{{ route('productosbusqueda') }}" style="text-decoration: none; color: white; font-size: 20px; width:auto;  background-color: #422e60; padding: 10px;  border-radius: 10px;  box-shadow: 0 2px 4px rgba(0, 0, 0, 0.2); " class="botonInicioBarra">Inicio</a>  
            <div class="menu-derecha"> <div class="carrito2">
                <a href="" style="text-decoration: none; color: white; font-size: 20px; width:auto;  background-color: #422e60; padding: 10px;  border-radius: 10px;  box-shadow: 0 2px 4px rgba(0, 0, 0, 0.2); "> <i class="fa-solid fa-cart-shopping"></i> Mi carrito </a>
            </div>
            <div class="vender">
                <a href="{{ route('micuenta') }}" style="text-decoration: none; color: white; font-size: 20px; width:auto;  background-color: #422e60; padding: 10px;  border-radius: 10px;  box-shadow: 0 2px 4px rgba(0, 0, 0, 0.2); "><i class="fa-solid fa-hand-holding-dollar"></i> Vender Producto</a>
            </div>
            <div class="cerrar">
                <div class="d-flex align-items-center" class="cerrar">
                <a class="dropdown-item" href="{{ route('cerrarsesion') }}"onclick="event.preventDefault(); document.getElementById('logout-form').submit();" style="text-decoration: none; color: white; font-size: 20px; width:auto;  background-color: #422e60; padding: 10px;  border-radius: 10px;  box-shadow: 0 2px 4px rgba(0, 0, 0, 0.2); "> Cerrar sesión </a>
                    <form id="logout-form" action="{{ route('cerrarsesion') }}" method="POST" class="d-none">@csrf</form>   
                </div>
            </div></div>
    </nav>

    <div class="direcciones">
    <div class="card text-center w-50 mx-auto">
        <div class="card-header"> <span>Domicilio</span></div>
        <div class="card-body">
            <!-- INICIO DEL FORMULARIO -->
            <form id="form-direccion" action="{{ route('direccion+') }}" method="POST">
              @csrf
                <div class="Entrada">
                    <div class="input-group mb-3">
                        <span class="input-group-text" id="inputGroup-sizing-default">CP</span>
                        <!-- ID AÑADIDO: cp-input -->
                        <input type="text" name="cp" id="cp-input" class="form-control" maxlength="5" placeholder="Ingrese 5 dígitos" aria-describedby="inputGroup-sizing-default">
                    </div>
                    <!-- Contenedor para mensajes de feedback -->
                    <small id="cp-feedback" class="form-text text-muted mb-3 d-block"></small>
                </div>

                <!-- 2. ESTADO -->
                <div class="Entrada">
                    <div class="input-group mb-3">
                        <span class="input-group-text">Estado</span>
                        <!-- ID AÑADIDO: estado-select, DESHABILITADO por defecto -->
                        <select class="form-select" id="estado-select" disabled>
                            <option selected value="">Ingresa CP</option>
                        </select>
                    </div>
                </div>

                <!-- 3. MUNICIPIO -->
                <div class="Entrada">
                    <div class="input-group mb-3">
                        <span class="input-group-text">Municipio</span>
                        <!-- ID AÑADIDO: municipio-select, DESHABILITADO por defecto -->
                        <select class="form-select" id="municipio-select" disabled>
                            <option selected value="">Ingresa CP</option>
                        </select>
                    </div>
                </div>

                <!-- 4. CIUDAD -->
                <div class="Entrada">
                    <div class="input-group mb-3">
                        <span class="input-group-text">Ciudad</span>
                        <!-- ID AÑADIDO: ciudad-select, DESHABILITADO por defecto -->
                        <select class="form-select" id="ciudad-select" disabled>
                            <option selected value="">Ingresa CP</option>
                        </select>
                    </div>
                </div>

                <!-- 5. COLONIA (ASENTAMIENTO) -->
                <div class="Entrada">
                    <div class="input-group mb-3">
                        <span class="input-group-text">Colonia</span>
                        <!-- ID AÑADIDO: colonia-select, DESHABILITADO por defecto -->
                        <select class="form-select" name="colonia" id="colonia-select" disabled>
                            <option selected value="">Ingresa CP</option>
                        </select>
                    </div>
                </div>

                <div class="Entrada">
                    <div class="input-group mb-3">
                        <span class="input-group-text">Calle</span>
                        <input type="text" name="calle" id="calle-input" class="form-control" disabled>
                    </div>
                </div>

                <div class="Entrada">
                    <div class="input-group mb-3">
                        <span class="input-group-text">Número Exterior</span>
                        <input type="text" name="num_ext" id="numero-exterior-input" class="form-control" disabled>
                    </div>
                </div>

                <div class="Entrada">
                    <div class="input-group flex-nowrap">
                        <span class="input-group-text" id="addon-wrapping">Numero Interior</span>
                        <input type="text" name="num_int" id="numero-interior-input" class="form-control" placeholder="Opcional" aria-label="Opcional" aria-describedby="addon-wrapping" disabled>
                    </div>
                </div>

                <div class="Separacion">
                    <div class="form-floating">
                        <textarea class="form-control" name="indicaciones" placeholder="Leave a comment here" id="floatingTextarea" disabled></textarea>
                        <label for="floatingTextarea" >Indicaciones para la entrega (opcional)</label>
                    </div>
                </div>

                <div class="Separacion">
                    <!-- ID AÑADIDO: btn-agregar-direccion, DESHABILITADO por defecto -->
                    <button type="submit" class="btn btn-primary" id="btn-agregar-direccion" style="text-decoration: none; color: white; font-size: 20px; width:auto;  background-color: #422e60; padding: 10px;  border-radius: 10px;  box-shadow: 0 2px 4px rgba(0, 0, 0, 0.2); border: none; ">Agregar dirección</button>
                </div>
            </form>
        </div>
    </div>
</div>

<script>
    // Referencias a los elementos del DOM
    const $cpInput = document.getElementById('cp-input');
    const $estadoSelect = document.getElementById('estado-select');
    const $municipioSelect = document.getElementById('municipio-select');
    const $ciudadSelect = document.getElementById('ciudad-select');
    const $coloniaSelect = document.getElementById('colonia-select');
    const $cpFeedback = document.getElementById('cp-feedback');
    const $btnAgregar = document.getElementById('btn-agregar-direccion');

    // Referencias a los campos de dirección
    const $calleInput = document.getElementById('calle-input');
    const $numExteriorInput = document.getElementById('numero-exterior-input');
    const $numInteriorInput = document.getElementById('numero-interior-input');
    const $indicacionesTextarea = document.getElementById('floatingTextarea');


    /**
     * Habilita/Deshabilita un conjunto de elementos y limpia su contenido al deshabilitar.
     * @param {boolean} enable Si es true, habilita. Si es false, deshabilita y limpia.
     */
    const toggleFields = (enable) => {
        // Combos que se llenan automáticamente
        [$estadoSelect, $municipioSelect, $ciudadSelect].forEach(select => {
            select.disabled = !enable;
            if (!enable) {
                // Borra y pone la opción inicial
                select.innerHTML = '<option selected value="">Ingresa CP</option>';
            }
        });
        
        // Colonia y campos de dirección (dependientes)
        [$coloniaSelect, $calleInput, $numExteriorInput, $numInteriorInput, $indicacionesTextarea, $btnAgregar].forEach(field => {
            field.disabled = !enable;
            if (!enable) {
                // Limpia el valor de los inputs
                if (field.tagName === 'INPUT' || field.tagName === 'TEXTAREA') {
                    field.value = '';
                }
                // Limpia el select de colonias
                if (field.id === 'colonia-select') {
                    field.innerHTML = '<option selected value="">Ingresa CP</option>';
                }
            }
        });

        // Mensaje de feedback
        $cpFeedback.textContent = enable ? 'CP validado con éxito.' : 'Ingresa los 5 dígitos de tu CP.';
        $cpFeedback.className = enable ? 'form-text text-success mb-3 d-block' : 'form-text text-muted mb-3 d-block';
    };


    /**
     * Rellena y habilita los campos con los datos obtenidos de Laravel.
     * @param {Object} data DatosPrincipales y Colonias
     */
    const rellenarDireccion = (data) => {
        const { datosPrincipales, colonias } = data;

        // 1. Llenar los campos fijos (Estado, Municipio, Ciudad)
        // Se llenan con una única opción seleccionada y deshabilitada (por eso usamos el innerHTML directo)
        $estadoSelect.innerHTML = `<option selected value="${datosPrincipales.NombreE}">${datosPrincipales.NombreE}</option>`;
        $municipioSelect.innerHTML = `<option selected value="${datosPrincipales.NombreM}">${datosPrincipales.NombreM}</option>`;
        $ciudadSelect.innerHTML = `<option selected value="${datosPrincipales.Ciudad}">${datosPrincipales.Ciudad}</option>`;

        // 2. Llenar el select de Colonias (Asentamiento)
        $coloniaSelect.innerHTML = '<option value="" disabled selected>Selecciona tu colonia</option>';
        colonias.forEach(colonia => {
            const option = document.createElement('option');
            option.value = colonia.Asentamiento; // Usar el nombre de la colonia como valor
            option.textContent = `${colonia.Asentamiento} (${colonia.Tipo})`;
            $coloniaSelect.appendChild(option);
        });

        // 3. Habilitar todos los campos restantes para que el usuario complete la calle/número
        toggleFields(true);
    };


    /**
     * FUNCIÓN DEBOUCE: Retrasa la ejecución de la función.
     */
    const debounce = (func, delay) => {
        let timeoutId;
        return (...args) => {
            clearTimeout(timeoutId);
            timeoutId = setTimeout(() => {
                func.apply(this, args);
            }, delay);
        };
    };


    /**
     * Llama a la API de Laravel para buscar el CP y obtener las colonias.
     * @param {string} cpValue El valor de 5 dígitos del CP.
     */
    const buscarCpAPI = async (cpValue) => {
        // Usamos la ruta definida en Laravel (ej: /api/ubicacion/cp/06700)
        const apiUrl = `/api/ubicacion/cp/${cpValue}`; 
        
        $cpFeedback.textContent = 'Buscando...';
        $cpFeedback.className = 'form-text text-primary mb-3 d-block';

        try {
            const response = await fetch(apiUrl);
            const data = await response.json();

            if (!response.ok) {
                // Manejar errores como 404 (CP no encontrado) o 400 (CP inválido)
                toggleFields(false);
                $cpFeedback.textContent = data.error || 'CP inválido o no encontrado. Revisa el número.';
                $cpFeedback.className = 'form-text text-danger mb-3 d-block';
                return;
            }
            
            // Si la respuesta es exitosa (200 OK)
            rellenarDireccion(data);

        } catch (error) {
            console.error("Error de red o servidor:", error);
            toggleFields(false);
            $cpFeedback.textContent = 'Error de conexión. Intenta más tarde.';
            $cpFeedback.className = 'form-text text-danger mb-3 d-block';
        }
    };

    // Crear la función optimizada con Debounce (espera 500ms)
    const buscarCpDebounced = debounce((cpValue) => {
        // Solo enviamos la solicitud si el CP tiene exactamente 5 dígitos
        if (cpValue.length === 5 && /^\d+$/.test(cpValue)) {
            buscarCpAPI(cpValue);
        } else {
            // Limpiar si no tiene 5 dígitos
            toggleFields(false);
        }
    }, 500); // 500ms de espera

    // ----------------------------------------------------
    // Listener principal del Input CP
    // ----------------------------------------------------
    $cpInput.addEventListener('input', (e) => {
        const cpValue = e.target.value.trim();
        
        // Asegurarse de que solo haya números y limitar a 5
        e.target.value = cpValue.replace(/[^0-9]/g, '').slice(0, 5);

        // Llamar a la función optimizada
        buscarCpDebounced(e.target.value);
    });
    
    // Prevenir el envío accidental del formulario al presionar Enter en el CP
    $cpInput.addEventListener('keydown', (e) => {
        if (e.key === 'Enter') {
            e.preventDefault();
        }
    });

</script>
        
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.8/dist/js/bootstrap.bundle.min.js" integrity="sha384-FKyoEForCGlyvwx9Hj09JcYn3nv7wiPVlz7YYwJrWVcXK/BmnVDxM+D2scQbITxI" crossorigin="anonymous"></script>
  </body>
</html>