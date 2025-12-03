<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\UsuarioController;
use App\Http\Controllers\ProductoController;
use App\Http\Controllers\DireccionesController;

Route::middleware(['web'])->group(function () {
    
    // Login / registro
    Route::get('/', [UsuarioController::class, 'InicioSesionFormulario'])->name('login');
    Route::post('/', [UsuarioController::class, 'InicioSesion'])->name('InicioSesion');
    Route::get('/registrousuario', [UsuarioController::class, 'RegistroFormulario'])->name('registroform');
    Route::post('/registrousuario', [UsuarioController::class, 'Registro'])->name('registro');
    Route::post('/logout', [UsuarioController::class, 'CerrarSesion'])->name('cerrarsesion');
 
 

    // Rutas protegidas
    //Productos
    Route::get('/contenido', [ProductoController::class, 'busquedas'])->name('productosbusqueda');
    Route::get('/venderproductos', [ProductoController::class, 'categorias'])->name('categorias');
    Route::post('/venderproductos', [ProductoController::class, 'agregarproducto'])->name('producto+');

    Route::get('/api/ubicacion/cp/{cp}', [DireccionesController::class, 'buscarCp'])->name('api.ubicacion.cp');
     Route::post('/direcciones', [DireccionesController::class, 'agregardireccion'])->name('direccion+');

    Route::get('/detalle/{id}', [ProductoController::class, 'show'])->name('detalle');



    Route::get('/micuenta', function () {
        if (!session()->has('id_usuario')) {
            return redirect()->route('login')->with('error', 'Debes iniciar sesión.');
        }
        return view('contenido.micuenta');
    }) -> name('micuenta');




     Route::get('/datoscuenta', function () {
        if (!session()->has('id_usuario')) {
            return redirect()->route('login')->with('error', 'Debes iniciar sesión.');
        }
        return view('contenido.datoscuenta');
    }) -> name('datoscuenta');


    Route::get('/ayuda', function () {
        if (!session()->has('id_usuario')) {
            return redirect()->route('login')->with('error', 'Debes iniciar sesión.');
        }
        return view('contenido.ayuda');
    });

    Route::get('/direcciones', function () {
        if (!session()->has('id_usuario')) {
            return redirect()->route('login')->with('error', 'Debes iniciar sesión.');
        }
        return view('contenido.direcciones');
        })-> name('direcciones');


     Route::get('/carrito', function () {
        if (!session()->has('id_usuario')) {
            return redirect()->route('login')->with('error', 'Debes iniciar sesión.');
        }
        return view('contenido.carrito');
    });

    Route::get('/menuDirecciones', function () {
        if (!session()->has('id_usuario')) {
            return redirect()->route('login')->with('error', 'Debes iniciar sesión.');
        }
        return view('contenido.menuDirecciones');
    });

      Route::get('/seguridad', function () {
        if (!session()->has('id_usuario')) {
            return redirect()->route('login')->with('error', 'Debes iniciar sesión.');
        }
        return view('contenido.seguridad');
    }) -> name('seguridad');

    
      Route::get('/terminosycondiciones', function () {
        return view('terminosycondiciones'); 

    }) -> name('terminosycondiciones')  ; 

});