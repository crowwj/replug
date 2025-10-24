<?php
namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\User;
use Illuminate\Support\Facades\Hash;

class UsuarioController extends Controller
{
    // Mostrar el formulario
    public function RegistroFormulario()
    {
        return view('registrousuario');
    }

    // procesar registro
    public function registro(Request $request)
    {
        // Se validan los datos ingresados en el form
        $request->validate([
            'email' => 'required|email|unique:users,email',
            'telefono' => 'required|string',
            'nombre' => 'required|string|max:100',
            'apellido' => 'required|string|max:100',
            'contrasena' => 'required|min:8',
            'terminosycondiciones' => 'accepted'
        ]);

        // crea el usuario
        User::create([
            'nombre' => $request->input('nombre'),
            'apellido' => $request->input('apellido'),
            'correo' => $request->input('email'),
            'telefono' => $request->input('telefono'),
            'contrasena' => Hash::make($request->input('contrasena')),
        ]);

        // Redirigir
        return redirect()->route('formulario')->with('success', 'Usuario registrado correctamente');
    }
}
