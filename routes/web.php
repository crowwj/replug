<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\ProductoController;
use App\Http\Controllers\UsuarioController;
Route::get('/inicio', function () {
    return view('inicio');
});
Route::get('/contenido', function () {
    return view('contenido.contenido');
});
Route::get('/venderproductos', function () {
    return view('contenido.venderproductos');
});
Route::get('/micuenta', function () {
    return view('contenido.micuenta');
});
// Registro
Route::get('/registrousuario', [UsuarioController::class, 'RegistroFormulario'])->name('registroform');
Route::post('/registrousuario', [UsuarioController::class, 'Registro'])->name('registro');
Route::get('/', [UsuarioController::class, 'InicioSesionFormulario'])->name ("login");
Route::post('/', [UsuarioController::class, 'InicioSesion'])->name ("InicioSesion");