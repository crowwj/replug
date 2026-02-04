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
    	<input type="email" value="{{ old('correo') }}" class="form-control" id="usuario" name="correo" placeholder="Correo Electronico"> 
  	</div>
  	<div class="mb-3">
    	<label for="contra" class="form-label"></label>
    	<input type="password" class="form-control" id="contrasena" name="contrasena" placeholder="Contraseña"> <br>
  	</div>
  	<div class="d-grid gap-2 col-6 mx-auto">
  		<button type="submit" class="btn-primary">Enviar</button> <br>
  	</div>
  	<div class="cuenta_nueva">
  		<p>¿No tienes cuenta? <a href="{{ route('registroform') }}">Registrate</a></p>
  		@if (session('error') || $errors->any())
  		<div class="error" style="display: block;">
        	{{ session('error') }}
        	{{ $errors->first() }}
  		</div>
  		@endif
		@if (session('success'))
		<div id="alerta" class="alert alert-success" role="alert">
				{{ session('success') }}
		</div>
		<script>setTimeout(() => {document.getElementById('alerta').style.display = 'none';}, 3000);</script>
		@endif
  	</div>
</form>