<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\ProductoController;

Route::get('/', function () {
    return view('formulario');
});

Route::get('/inicio', function () {
    return view('inicio');
});

Route::get('/registrousuario', function () {
    return view('registrousuario');
});


Route::get('/contenido', function () {
    return view('contenido');
});


Route::get('/productos', [ProductoController::class, 'index']);