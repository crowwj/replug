<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Producto;
use App\Models\Categorias;

class ProductoController extends Controller
{
    
    public function busquedas(Request $busqueda)
    {
        if (!session()->has('id_usuario')) {
        return redirect()->route('login')->with('error', 'Debes iniciar sesión.');
        }

        $categoriaToken = $busqueda->query('categoriaToken');
        $textoBusqueda = trim($busqueda->query('busqueda'));

        $consultaproductos = Producto::query();
        if ($categoriaToken) {
            $consultaproductos->where('categorias_id_categoria', $categoriaToken);  //se le da forma a la consulta   
        }
        
        if (!empty($textoBusqueda)) {
            // Formateamos la búsqueda con comodines para buscar coincidencias parciales
            $terminoFormateado = '%' . $textoBusqueda . '%';
            
            // Usamos where para buscar por nombre o descripción lo más parecido
            $consultaproductos->where(function ($query) use ($terminoFormateado) {// filtra los productos de la categoria seleccionada por la consulta del usuario.
                $query->where('nombre', 'like', $terminoFormateado)
                    ->orWhere('descripcion', 'like', $terminoFormateado);
            });
        }
        $productos = $consultaproductos->paginate(15);
        $categorias = Categorias::select('id_categoria', 'nombre')->get();
        return view('contenido.contenido', compact('productos', 'categorias', 'categoriaToken'));
    }

    public function agregarproducto(Request $producto)
    {
        $producto->validate([
        'NombreProducto' => 'required|string|max:150|unique:productos,nombre',
        'DescripcionProducto' => 'nullable|string|max:255',
        'PrecioProducto' => 'required|numeric|min:0.01|max:9999999999.99',
        'StockProducto' => 'required|integer|min:0',
        'ImagenProducto' => 'nullable|image|mimes:jpeg,png,jpg,gif,webp' // 2MB max
        ]);
        $imagenPath = null;
        if ($producto->hasFile('ImagenProducto')) {
            $imagenPath = $producto->file('ImagenProducto')->store('productos', 'public');
        }

        Producto::create([
            'nombre' => $producto->input('NombreProducto'),
            'descripcion' => $producto->input('DescripcionProducto'),
            'precio' => $producto->input('PrecioProducto'),
            'stock' => $producto->input('StockProducto'),
            'categorias_id_categoria' => $producto->input('categoria'),
            'imagen' => $imagenPath,
        ]);
        return redirect()->route('categorias')->with('success', 'Producto Agregado con Exito');
    }

    public function categorias()
    {
        if (!session()->has('id_usuario')) {
            return redirect()->route('login')->with('error', 'Debes iniciar sesión.');
        }

        $categorias = Categorias::select('id_categoria', 'nombre')->get();
        return view('contenido.venderproductos', compact('categorias'));
    }
}