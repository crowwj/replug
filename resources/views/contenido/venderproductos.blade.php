<!DOCTYPE html>
<html lang="en">
  <head>
      <meta charset="UTF-8">
      <meta name="viewport" content="width=device-width, initial-scale=1.0">
      <title>Document</title>
      <link rel="stylesheet" href="{{ asset('contenido.css') }}" /> 
      <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.8/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-..." crossorigin="anonymous">
  </head>
  <body class="bodyproductos">

    <nav class="barra-ayuda">
      <a href="" style="text-decoration: none; color: white;">Inicio</a>   
    </nav>


  <!--Vender productos -->
  <div class="formularioproductos">
    <form action="{{ route('producto+') }}" method="post" class="formulario-form" enctype="multipart/form-data">
      @csrf
      <h3>Vender producto</h3>

      <div class="mb-3">
        <label for="nombre" class="form-label"></label>
        <input type="text" class="form-control" id="nombreProducto" name="NombreProducto" placeholder="Nombre del producto">
      </div>

      <div class="mb-3">
        <label for="Descripcion" class="form-label"></label>
        <input type="text" class="form-control" id="DescripcionProducto" name="DescripcionProducto" placeholder="Descripcion del producto">
      </div>

      <div class="mb-3">
        <label for="Precio" class="form-label"></label>
        <input type="number" step="0.01" class="form-control" id="PrecioProducto" name="PrecioProducto" placeholder="Precio del producto">
      </div>

      <div class="mb-3">
        <label for="Stock" class="form-label"></label>
        <input type="number" class="form-control" id="StockProducto" name="StockProducto" placeholder="Stock">
      </div>

      <div class="mb-3">
            <select name="categoria" id="filtroCategoriaBusqueda" style="padding: 8px; border-radius: 4px;">                    
                    @foreach ($categorias as $categoria)   
                    <option value="{{ $categoria->id_categoria }}">{{ $categoria->nombre }}</option>
                    @endforeach
            </select>
      </div>

      <div class="mb-3">
        <label for="imagen" class="form-label"> Agregue una imagen para el producto</label>
        <input type="file" class="form-control" id="imagenProducto" name="ImagenProducto">
      </div>

      <button type="submit" class="btn btn-primary btn-lg" style="background:rgb(82, 11, 149); border: none;">Vender productos
      </button>

      <button type="button" class="btn btn-primary btn-lg" style="background:rgb(82, 11, 149); border: none;" data-bs-toggle="modal" data-bs-target="#staticBackdrop">
      Requisitos
      </button>

      <div class="modal fade" id="staticBackdrop" data-bs-backdrop="static" data-bs-keyboard="false" tabindex="-1" aria-labelledby="staticBackdropLabel" aria-hidden="true">
        <div class="modal-dialog">
          <div class="modal-content">

            <div class="modal-header">
              <h1 class="modal-title fs-5" id="staticBackdropLabel">Requisitos en la publicacion de venta</h1>
              <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
            </div>

            <div class="modal-body">
              <p>1:El nombre debe tener relación con lo que vendes. <br>
                2:Debes describir a detalle lo que vendes (Medidas, especificaciones, peso, tiempo de uso, fecha de creación) <br>
                3:La imagen debe ser en formato png o jpg, con fondo blanco, el producto debe ser visible sin ningún tipo de problema. <br>
                4:Agregar la cantidad correcta de stock disponible de dicho producto.
              </p>
            </div>
            
            <div class="modal-footer">
              <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Cerrar ventana</button>
            </div>

          </div>
        </div>
      </div>

      <!--<button type="button" class="btn btn-primary btn-lg" style="background:rgb(82, 11, 149); border: none;">Ver requisitos del producto</button> -->
    </form>

    
  </div>
  <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.8/dist/js/bootstrap.bundle.min.js" integrity="sha384-FKyoEForCGlyvwx9Hj09JcYn3nv7wiPVlz7YYwJrWVcXK/BmnVDxM+D2scQbITxI" crossorigin="anonymous"></script>
  </body>
</html>