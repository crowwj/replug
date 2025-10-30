<?php
namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\User;
use Illuminate\Support\Facades\Session;
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

        User::create([
            'nombre' => $request->input('nombre'),
            'correo' => $request->input('email'),
            'telefono' => $request->input('telefono'),
            'contrasena' => Hash::make($request->input('contrasena')),
        ]);

        return redirect()->route('login')->with('success', 'Usuario registrado correctamente');
    }

    public function InicioSesionFormulario()
    {
        return view('formulario');
    }

    public function InicioSesion(Request $request)
    {
    $credentials = $request->validate([//validamos datos resuperados
        'correo' => ['required', 'email'],
        'contrasena' => ['required']
        ]);

        if (Auth::attempt([//compara en la bd
        'correo' => $credentials['correo'],
        'password' => $credentials['contrasena'],
        ])) {

                $request->session()->regenerate();//regenera token de sesion

                $user = auth()->user();//fuerza la creacion de usuario
                Auth::login($user, true);        // <--- clave
                $request->session()->put('id_usuario', auth()->user()->id_usuario); // tu sesión personalizada
                //dd(auth()->user(), session()->all()); debug
                return redirect()->route('contenido');
            }

    // datos incorrectos
    return back()->withErrors([
        'correo' => 'Las credenciales no coinciden con nuestros registros.',
    ])->withInput($request->except('contrasena'));
    }

    public function CerrarSesion(Request $request)
    {

    Auth::logout();

    $request->session()->invalidate();// invalida token de sesion

    $request->session()->regenerateToken(); //regenera toquen encargado de recolectar datos en forms (CSRF)

    return redirect()->route('login')->with('success', 'Sesión cerrada correctamente');
    
    }
}
