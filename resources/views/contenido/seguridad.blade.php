<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="{{ asset('contenido.css') }}" /> 
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.0.0/css/all.min.css" integrity="sha512-9usAa10IRO0HhonpyAIVpjrylPvoDwiPUiKdWk5t3PyolY1cOd4DSE0Ga+ri4AuTroPR5aQvXU9xC6qOPnzFeg==" crossorigin="anonymous" referrerpolicy="no-referrer" />
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.8/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-sRIl4kxILFvY47J16cr9ZwB07vP4J8+LH7qKQnuqkuIAvNWLzeN8tE5YBujZqJLB" crossorigin="anonymous">
</head>
<body>
     <nav class="barra-ayuda">   
            <a href="{{ route('productosbusqueda') }}" style="text-decoration: none; color: white; font-size: 20px;">Inicio</a>  
                <div class="d-flex align-items-center">
                    <a class="dropdown-item" href="{{ route('cerrarsesion') }}"onclick="event.preventDefault(); document.getElementById('logout-form').submit();" style="text-decoration: none; color: white; font-size: 20px; width:auto;"> Cerrar sesión </a>
                        <form id="logout-form" action="{{ route('cerrarsesion') }}" method="POST" class="d-none">@csrf</form>   
                </div>
   </nav>
    <br>
    <div class="SeguridadPadre">
        <div class="cuerpoSeguridad ">
            <div class="seguridadTitulo card">
                <h3><i class="fas fa-lock me-2"></i>Seguridad de la cuenta</h3>
                    <p>Actualiza o modifica tu contraseña de la cuenta.</p>
            </div>
            <div class="seguridad card">
               <div class="input-group mb-3">
                <span class="input-group-text"><i class="fas fa-key"></i></span>
                <input type="password" class="form-control" id="floatingInput" placeholder="">
            </div>

            <div class="input-group mb-3">
                <span class="input-group-text"><i class="fas fa-lock"></i></span>
                <input type="password" class="form-control" id="floatingInput" placeholder="Nueva contraseña">
            </div>

            <div class="input-group mb-3">
                <span class="input-group-text"><i class="fas fa-check-circle"></i></span>
                <input type="password" class="form-control" id="floatingInput" placeholder="Confirmar contraseña">
            </div>

                <div class="opcionesSeguridad">
                    <button class="btn btn-primary" type="submit">Guardar contraseña</button>
                    <button class="btn btn-primary" type="submit">Modificar contraseña</button>
                </div>
                
            </div>

        </div>

        <div class="reglamentoSeguridad card">
            <h3><i class="fas fa-shield-alt me-2"></i>Reglamento de seguridad</h3>
            <br>
            <p> Contraseña de 8 caracteres como minimo.</p>
            <p> Combinar mayusculas, numero y simbolos.</p>
            <p> Evita usar informacion personal.</p>
            <p> Evita usar numeros consecutivos.</p>
            <p> Evita usar mismas contraseñas de otras cuentas.</p>
        </div>

    </div>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.8/dist/js/bootstrap.bundle.min.js" integrity="sha384-FKyoEForCGlyvwx9Hj09JcYn3nv7wiPVlz7YYwJrWVcXK/BmnVDxM+D2scQbITxI" crossorigin="anonymous"></script>
</body>
</html>