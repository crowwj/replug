@extends('inicio') 

@section('login-contenido') 
    ...
@endsection


<!--Cabezero -->
    <div class="logo-container"> <h1 class="logo-text">MERCADO POBRE</h1> </div>
<!--Formulario: Capta los user y password -->
<form class="formulario" >
  <br><br>
  <div class="mb-3">
    <label for="usuario" class="form-label" ></label>
    <input type="text" class="form-control" id="usuario" placeholder="Usuario"> 
  </div>
  <div class="mb-3">
    <label for="contra" class="form-label"></label>
    <input type="password" class="form-control" id="contrasena" placeholder="Contraseña"> <br>
  </div>
  <div class="d-grid gap-2 col-6 mx-auto">
  <button type="submit" class="btn btn-primary " style="background:#3c0050">Enviar</button> <br>
  </div>
  <div class="cuenta_nueva">
  <p>No tienes cuenta? <a href="registrousuario">registrate</a>  </p>
  </div>
</form>
