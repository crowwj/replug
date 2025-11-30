@extends('inicio') 

@section('login-contenido') 
    ...
@endsection
<!--Cabezero -->
    <div class="logo-container"> <h1 class="logo-text">MERCADO POBRE</h1> </div>
<!--Formulario: Capta los user y password -->
<form action="{{ route('InicioSesion') }}" method="POST" class="formulario" >
   @csrf
  <br><br>
  <div class="mb-3">
    <label for="usuario" class="form-label" ></label>
    <input type="email" class="form-control" id="usuario" name="correo" placeholder="Correo Electronico"> 
  </div>
  <div class="mb-3">
    <label for="contra" class="form-label"></label>
    <input type="password" class="form-control" id="contrasena" name="contrasena" placeholder="Contraseña"> <br>
  </div>
  <div class="d-grid gap-2 col-6 mx-auto">
  <button type="submit" class="btn btn-primary " style="background:#3c0050">Enviar</button> <br>
  </div>
  <div class="cuenta_nueva">
  <p>No tienes cuenta? <a href="{{ route('registroform') }}">registrate</a></p>
   @error('correo')
  <div class="invalid-feedback" style="display: block;">
            {{ $message }}
  </div>
  @enderror
  @if (session('success'))
  <div class="alert alert-success" role="alert">
        {{ session('success') }}
  </div>
  @endif
  </div>
</form>
