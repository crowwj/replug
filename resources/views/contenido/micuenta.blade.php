<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="{{ asset('contenido.css') }}" /> 
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.8/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-sRIl4kxILFvY47J16cr9ZwB07vP4J8+LH7qKQnuqkuIAvNWLzeN8tE5YBujZqJLB" crossorigin="anonymous">
    <title>Document</title>
</head>
@include('contenido.barranavegar')
<div class="titulo">
<h2>Mi cuenta</h2>
</div>
<div class="contenido">
<div class=" card col-3 mb-3 mx-2">
  <div class="card-body">
    <h5 class="card-title">Datos de la cuenta</h5>
    <p class="card-text">Datos que representan tu cuenta..</p>
    <a href="#" class="btn btn-primary btn-lg" style="background:rgb(82, 11, 149); border: none;">Ir</a>
  </div>
</div>
<div class="card col-3 mb-3 mx-2">
  <div class="card-body">
    <h5 class="card-title">Inicio de sesion</h5>
    <p class="card-text">Cambiar correo electronico, contraseña y correo telefonico</p>
    <a href="#" class="btn btn-primary btn-lg" style="background:rgb(82, 11, 149); border: none;">Ir</a>
  </div>
</div>
<div class="card col-3 mb-3 mx-2">
  <div class="card-body">
    <h5 class="card-title">Pedidos y compras</h5>
    <p class="card-text">Ver historial de pedidos y compras de la cuenta.</p>
    <a href="#" class="btn btn-primary btn-lg" style="background:rgb(82, 11, 149); border: none;">Ir</a>
  </div>
</div>
<div class="card col-3 mb-3 mx-2">
  <div class="card-body">
    <h5 class="card-title">Direcciones</h5>
    <p class="card-text">Editar direcciones de los pedidos.</p>
    <a href="#" class="btn btn-primary btn-lg" style="background:rgb(82, 11, 149); border: none;">Ir</a>
  </div>
</div>
</div>
<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.8/dist/js/bootstrap.bundle.min.js" integrity="sha384-FKyoEForCGlyvwx9Hj09JcYn3nv7wiPVlz7YYwJrWVcXK/BmnVDxM+D2scQbITxI" crossorigin="anonymous"></script>
</body>
</html>