<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Producto;
use App\Models\Categorias;

class ProductoController extends Controller
{
    public function index(Request $request)
    {
    if (!session()->has('id_usuario')) {
        return redirect()->route('login')->with('error', 'Debes iniciar sesión.');
    }
    //obtiene el filtro categoria de la url por el metodo get. la varible sera null si no hay un filtro, mostrara todos los productos pues.
    $categoriaToken = $request->query('categoria');

    $query = Producto::query(); //variable apuntando a el modelo Producto que tiene de referencia la tabla productos. 

    if ($categoriaToken) {
       $query->where('categorias_id_categoria', $categoriaToken);  //se le da forma a la consulta   
    }
    // ejecuta la consulta y paginar(trae los 15 productos que caben en la pagina)
    $categorias = Categorias::select('id_categoria', 'nombre')->get(); //variable para todas las categorias en forma de lista.
    $productos = $query->paginate(15);
    return view('contenido.contenido', compact('productos', 'categorias', 'categoriaToken'));
    }
}