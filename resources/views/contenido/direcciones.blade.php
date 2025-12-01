<!DOCTYPE html>
<html lang="en">
  <head>
      <meta charset="UTF-8">
      <meta name="viewport" content="width=device-width, initial-scale=1.0">
      <link rel="stylesheet" href="{{ asset('DV325G') }}" />
      <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.8/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-..." crossorigin="anonymous">
      <title></title>
  </head>
  
  <body>
    
    <nav class="barra-ayuda">
      <a href="" style="text-decoration: none; color: white;">Inicio</a>
      <div>
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
                <a class="dropdown-item" href="{{ route('cerrarsesion') }}"onclick="event.preventDefault(); document.getElementById('logout-form').submit();">Cerrar sesión</a>
                <form id="logout-form" action="{{ route('cerrarsesion') }}" method="POST" class="d-none">
                    @csrf
                </form>
            </li>
          </ul>
      </div>
    </nav>
    <div class="direcciones">
      <div class="card text-center w-50 mx-auto">
    

        <div class="card-header"> <span>Domicilio</span></div>

        <div class="card-body">
        </div>
        <div class="Entrada">
          <div class="input-group mb-3">
            <span class="input-group-text" id="inputGroup-sizing-default">CP</span>
            <input type="text" class="form-control" aria-label="Sizing example input" aria-describedby="inputGroup-sizing-default">
          </div>
        </div>

        <div class="Entrada">
          <div class="input-group mb-3">
            <span class="input-group-text" id="inputGroup-sizing-default">Estado</span>
            <select class="form-select" id="inputGroupSelect01">
              <option value="1">One</option>
              <option value="2">Two</option>
              <option value="3">Three</option>
            </select>
          </div>
        </div>

        <div class="Entrada">
          <div class="input-group mb-3">
            <span class="input-group-text" id="inputGroup-sizing-default">Municipio</span>
            <select class="form-select" id="inputGroupSelect01">
              <option value="1">One</option>
              <option value="2">Two</option>
              <option value="3">Three</option>
            </select>
          </div>
        </div>

         <div class="Entrada">
          <div class="input-group mb-3">
            <span class="input-group-text" id="inputGroup-sizing-default">Ciudad</span>
            <select class="form-select" id="inputGroupSelect01">
              <option value="1">One</option>
              <option value="2">Two</option>
              <option value="3">Three</option>
            </select>
          </div>
        </div>

        <div class="Entrada">
          <div class="input-group mb-3">
            <span class="input-group-text" id="inputGroup-sizing-default">Colonia</span>
            <select class="form-select" id="inputGroupSelect01">
              <option value="1">One</option>
              <option value="2">Two</option>
              <option value="3">Three</option>
            </select>
          </div>
        </div>

        <div class="Entrada">
          <div class="input-group mb-3">
            <span class="input-group-text" id="inputGroup-sizing-default">Calle</span>
            <input type="text" class="form-control" aria-label="Sizing example input" aria-describedby="inputGroup-sizing-default">
          </div>
        </div>

        <div class="Entrada">
          <div class="input-group mb-3">
            <span class="input-group-text" id="inputGroup-sizing-default">Número Exterior</span>
            <input type="text" class="form-control" aria-label="Sizing example input" aria-describedby="inputGroup-sizing-default">
          </div>
        </div>

        <div class="Entrada">
          <div class="input-group flex-nowrap">
            <span class="input-group-text" id="addon-wrapping">Numero Interior</span>
            <input type="text" class="form-control" placeholder="Opcional" aria-label="Opcional" aria-describedby="addon-wrapping">
          </div>
        </div>

        <div class="Separacion">
          <div class="form-floating">
            <textarea class="form-control" placeholder="Leave a comment here" id="floatingTextarea"></textarea>
            <label for="floatingTextarea">Indicaciones para la entrega (opcional)</label>
          </div>
        </div>

        <div class="Separacion">
          <button type="button" class="btn btn-primary">Agregar dirección</button>
        </div>

      </div>
    </div>
        
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.8/dist/js/bootstrap.bundle.min.js" integrity="sha384-FKyoEForCGlyvwx9Hj09JcYn3nv7wiPVlz7YYwJrWVcXK/BmnVDxM+D2scQbITxI" crossorigin="anonymous"></script>
  </body>
</html>