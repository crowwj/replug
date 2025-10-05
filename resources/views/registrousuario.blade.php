
@extends('inicio') 

@section('login-contenido') 
    ...
@endsection

<!--Registro de usuarios -->
 <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.8/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-sRIl4kxILFvY47J16cr9ZwB07vP4J8+LH7qKQnuqkuIAvNWLzeN8tE5YBujZqJLB" crossorigin="anonymous">
<link rel="stylesheet" href="{{ asset("styles.css") }}">
<div class="logo-container"> <h1 class="logo-text">MERCADO POBRE</h1> </div>
<form action="" class="Registrodeusuario">
    <div class="mb-3">
        <label for="correo" class="form-label"></label>
        <input type="text" class="form-control" id="nombreRegistro" placeholder="Correo Electronico">
    </div>
    <div class="mb-3">
        <label for="telefono" class="form-label"></label>
        <input type="text" class="form-control" id="registronumero" placeholder="Telefono">
    </div>
    <div class="mb-3">
        <label for="nombre" class="form-label"></label>
        <input type="text" class="form-control" id="registronombre" placeholder="Nombre">
    </div>
    <div class="mb-3">
        <label for="contraseña" class="form-label"></label>
        <input type="password" class="form-control" id="registrocontrasena" placeholder="Contraseña">
    </div>

    <div class="mb-3">
    <input type="checkbox"  id="terminosycondiciones" name="terminosycondiciones" required>
    <label for="correo" class="form-label"> Acepto los <a href="#"></a> Terminos y condiciones 
    </label>
</div>

    <div class="terminos">
        <p> Al "Continuar", acepto los <a href="#">Términos y condiciones</a> y autorizo <br> el uso de mis datos  de acuerdo a la Declaración de privacidad.</p>
    </div>

    <div class="d-grid gap-2 col-6 mx-auto">
        <button type="submit" class="btn btn-primary " style="background:#3c0050" id="enviarRegistro">Enviar</button> <br>
    </div>
</form>
<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.8/dist/js/bootstrap.bundle.min.js" integrity="sha384-FKyoEForCGlyvwx9Hj09JcYn3nv7wiPVlz7YYwJrWVcXK/BmnVDxM+D2scQbITxI" crossorigin="anonymous"></script>