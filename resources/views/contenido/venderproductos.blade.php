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


<!--Vender productos -->
<div class="formularioproductos">
<form action="" method="post" class="formulario-form">
    <h3>Vender producto</h3>
    <div class="mb-3">
        <label for="nombre" class="form-label"></label>
        <input type="text" class="form-control" id="nombreProducto" name="nombreProducto" placeholder="Nombre del producto">
    </div>
    <div class="mb-3">
        <label for="Descripcion" class="form-label"></label>
        <input type="text" class="form-control" id="DescripcionProducto" name="DescripcionProducto" placeholder="Descripcion del producto">
    </div>
    <div class="mb-3">
        <label for="Precio" class="form-label"></label>
        <input type="number" class="form-control" id="PrecioProducto" name="PrecioProducto" placeholder="Precio del producto">
    </div>
    <div class="mb-3">
        <label for="Stock" class="form-label"></label>
        <input type="number" class="form-control" id="StockProducto" name="StockProducto" placeholder="Stock">
    </div>
    <div class="mb-3">
        <label for="imagen" class="form-label"> Agrege una imagen para el producto</label>
        <input type="file" class="form-control" id="imagenProducto" name="imagenProducto">
    </div>
    <button type="button" class="btn btn-primary btn-lg" style="background:rgb(82, 11, 149); border: none;">Vender productos</button>
    <button type="button" class="btn btn-primary btn-lg" style="background:rgb(82, 11, 149); border: none;">Ver requisitos del producto</button> 
    <button type="button" class="btn btn-primary btn-lg" style="background:rgb(82, 11, 149); border: none;">Regresar al inicio</button>

</form>
</div>
<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.8/dist/js/bootstrap.bundle.min.js" integrity="sha384-FKyoEForCGlyvwx9Hj09JcYn3nv7wiPVlz7YYwJrWVcXK/BmnVDxM+D2scQbITxI" crossorigin="anonymous"></script>
</body>
</html>