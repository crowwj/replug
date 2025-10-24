<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\ProductoController;
use App\Http\Controllers\UsuarioController;

Route::get('/', function () {
    return view('formulario');
})->name ("formulario");//esto le da un nombre a la ruta y asi se puede mandar a llamar por el nombre de formulario

Route::get('/inicio', function () {
    return view('inicio');
});

Route::get('/contenido', function () {
    return view('contenido');
});

// Registro
Route::get('/registrousuario', [UsuarioController::class, 'RegistroFormulario'])->name('registroform');
Route::post('/registrousuario', [UsuarioController::class, 'registro'])->name('registro');
