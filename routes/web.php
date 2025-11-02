<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\UsuarioController;
use App\Http\Controllers\ProductoController;

Route::middleware(['web'])->group(function () {
    
    // Login / registro
    Route::get('/', [UsuarioController::class, 'InicioSesionFormulario'])->name('login');
    Route::post('/', [UsuarioController::class, 'InicioSesion'])->name('InicioSesion');

    Route::get('/registrousuario', [UsuarioController::class, 'RegistroFormulario'])->name('registroform');
    Route::post('/registrousuario', [UsuarioController::class, 'Registro'])->name('registro');

    Route::post('/logout', [UsuarioController::class, 'CerrarSesion'])->name('cerrarsesion');
    // Rutas protegidas
    //Productos
   Route::get('/contenido', [ProductoController::class, 'index'])->name('productosfiltro');

    Route::get('/venderproductos', function () {
        if (!session()->has('id_usuario')) {
            return redirect()->route('login')->with('error', 'Debes iniciar sesión.');
        }
        return view('contenido.venderproductos');
    });

    Route::get('/micuenta', function () {
        if (!session()->has('id_usuario')) {
            return redirect()->route('login')->with('error', 'Debes iniciar sesión.');
        }
        return view('contenido.micuenta');
    });

     Route::get('/datoscuenta', function () {
        if (!session()->has('id_usuario')) {
            return redirect()->route('login')->with('error', 'Debes iniciar sesión.');
        }
        return view('contenido.datoscuenta');
    });
    Route::get('/ayuda', function () {
        return view('contenido.ayuda');
    });

});