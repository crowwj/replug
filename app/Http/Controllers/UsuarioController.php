<?php
namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\User;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\Auth;

class UsuarioController extends Controller
{
    // Mostrar el formulario
    public function RegistroFormulario()
    {
        return view('registrousuario');
    }

    // procesar registro
    public function Registro(Request $request)
    {
        // Se validan los datos ingresados en el form
        $request->validate([
            'email' => 'required|email|unique:users,email',
            'telefono' => 'required|string',
            'nombre' => 'required|string|max:100',
            'contrasena' => 'required|min:8',
            'terminosycondiciones' => 'accepted'
        ]);

        // crea el usuario
        User::create([
            'nombre' => $request->input('nombre'),
            'correo' => $request->input('email'),
            'telefono' => $request->input('telefono'),
            'contrasena' => Hash::make($request->input('contrasena')),
        ]);

        // Redirigir
        return redirect()->route('login')->with('success', 'Usuario registrado correctamente');
    }

    public function InicioSesionFormulario()
    {
        return view('formulario');
    }

    public function InicioSesion(Request $request)
    {
        $credentials = $request->validate([     //validando que sean correctos los datos
            'correo' => ['required', 'email'],
            'contrasena' => ['required']
        ]);

        if (Auth::attempt(['correo' => $credentials['correo'], 'password' => $credentials['contrasena']])) {
        $request->session()->regenerate();
        return redirect()->route('contenido');
    }

       return redirect()->route('login')->withErrors([
    'correo' => 'Las credenciales no coinciden con nuestros registros.',
])->withInput();
    }

    public function CerrarSesion(Request $request)
    {
        Auth::logout(); //cierrra la sesion

        $request->session()->invalidate();  //invalida la sesion
        $request->session()->regenerateToken(); //regenra token el token asignado al usuario

        return response()->json([
            'message' => 'Sesión cerrada correctamente'
        ], 200);
    }
}
