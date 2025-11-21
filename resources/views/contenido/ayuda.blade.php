<!DOCTYPE html>
<html lang="es">
  <head>
    <meta charset="UTF-8">
    <link rel="stylesheet" href="{{ asset('contenido.css') }}" />
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.8/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-..." crossorigin="anonymous">
    <meta name="viewport" content="width=device-width, initial-scale=1.0"> 
  </head>
  
  <body>
    @include('contenido.barranavegar')
    <h1 style="margin: 10px;">AYUDA</h1>

    <div class="Ayuda">
      <div class="Pregunta">
        <a href="#" data-bs-toggle="modal" data-bs-target="#ModalCompra"><p>¿Cómo realizo una compra?</p><a>
      </div>

        <div class="modal" tabindex="-1" id="ModalCompra">
          <div class="modal-dialog">
            <div class="modal-content">
              <div class="modal-header">
                <h5 class="modal-title">¿Cómo realizo una compra?</h5>
                <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
              </div>
              <div class="modal-body">
                <p>Modal body text goes here.</p>
              </div>
              <div class="modal-footer">
                <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Close</button>
                <button type="button" class="btn btn-primary">Save changes</button>
              </div>
            </div>
          </div>
        </div>
    
      <div class="Pregunta">
        <a class="card" href="#" data-bs-toggle="modal" data-bs-target="#ModalEntrega"><p>¿Cómo realizo una compra?</p><a>
      </div>

      <div class="modal" tabindex="-1" id="ModalEntrega">
          <div class="modal-dialog">
            <div class="modal-content">
              <div class="modal-header">
                <h5 class="modal-title">¿Cómo realizo una compra?</h5>
                <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
              </div>
              <div class="modal-body">
                <p>Modal body text goes here.</p>
              </div>
              <div class="modal-footer">
                <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Close</button>
                <button type="button" class="btn btn-primary">Save changes</button>
              </div>
            </div>
          </div>
        </div>
      </div>

    </div>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.8/dist/js/bootstrap.bundle.min.js" integrity="sha384-FKyoEForCGlyvwx9Hj09JcYn3nv7wiPVlz7YYwJrWVcXK/BmnVDxM+D2scQbITxI" crossorigin="anonymous"></script>
  </body>
</html>