<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Producto;

class ProductoController extends Controller
{
    public function index(Request $request)
    {
    if (!session()->has('id_usuario')) {
        return redirect()->route('login')->with('error', 'Debes iniciar sesión.');
    }
    //obtiene el filtro categoria de la url por el metodo get. la varible sera null si no hay un filtro, mostrara todos los productos pues.
    $categoriaToken = $request->query('categoria');

    $query = Producto::query(); //consulta en espera de una asignacion de filtrado. 

    if ($categoriaToken) {
       $query->where('categorias_id_categoria', $categoriaToken);  //se le da forma a la consulta   
    }
    // ejecuta la consulta y paginar(trae los 15 productos que caben en la pagina)
    $productos = $query->paginate(15);
    return view('contenido.contenido', compact('productos'));
    }
}