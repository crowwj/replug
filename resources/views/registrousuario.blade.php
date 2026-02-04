
@extends('inicio') 

@section('login-contenido') 
    ...
@endsection

<!--Registro de usuarios -->
<div class="logo-container"> <h1 class="logo-text">MERCADO POBRE</h1> </div>
    <form action="{{ route('registro') }}" method="POST" class="Registrodeusuario">
        @csrf
        <div class="mb-3">
            <label for="correo" class="form-label"></label>
            <input type="text" class="form-control" id="nombreRegistro" name="email" placeholder="Correo Electronico">
        </div>
        <div class="mb-3">
            <label for="telefono" class="form-label"></label>
            <input type="text" class="form-control" id="registronumero" name="telefono" placeholder="Telefono">
        </div>
        <div class="mb-3">
            <label for="nombre" class="form-label"></label>
            <input type="text" class="form-control" id="registronombre" name="nombre" placeholder="Nombre">
        </div>
        <div class="mb-3">
            <label for="contraseña" class="form-label"></label>
            <input type="password" class="form-control" id="registrocontrasena" name="contrasena" placeholder="Contraseña">
        </div>
        <div class="mb-3">
            <input type="checkbox" name="terminosycondiciones" required>
            <label class="ter">Acepto los <a href="{{ route('terminosycondiciones') }}">Términos y condiciones</a></label>
        </div>
        <div class="d-grid gap-2 col-6 mx-auto detalle">
            <button type="submit" class="btn-primary">Enviar</button>
        </div>
        <div class="cuenta_nueva">
            @if($errors->any())
            <div class="error" style="display: block;">
                {{ $errors->first() }}
            </div>
            @endif
        </div>
    </form>