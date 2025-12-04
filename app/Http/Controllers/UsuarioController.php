<?php
namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\User;
use App\Models\carrito;
use Illuminate\Support\Facades\Session;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Carbon;
use Illuminate\Support\Facades\Auth;
use Illuminate\Validation\Rule;

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

        $usuario = User::create([
            'nombre' => $request->input('nombre'),
            'correo' => $request->input('email'),
            'telefono' => $request->input('telefono'),
            'contrasena' => Hash::make($request->input('contrasena')),
        ]);

        carrito::create([
            'fecha_creacion' => Carbon::now(),
            'Usuarios_id_usuario' => $usuario->id_usuario,
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
                return redirect()->route('productosbusqueda');
            }
    // datos incorrectos
    return back()->withErrors([
        'correo' => 'Las credenciales no coinciden.',
    ])->withInput($request->except('contrasena'));
    }

    public function CerrarSesion(Request $request)
    {

    Auth::logout();

    $request->session()->invalidate();// invalida token de sesion

    $request->session()->regenerateToken(); //regenera toquen encargado de recolectar datos en forms (CSRF)

    return redirect()->route('login')->with('success', 'Sesión cerrada correctamente');
    
    }

    public function actualizarDatos(Request $request)
    {
        // 1. Obtener el usuario actualmente autenticado
        $user = Auth::user();

        // Si por alguna razón no hay usuario logueado, redirigir
        if (!$user) {
            return redirect()->route('login')->with('error', 'Debes iniciar sesión para actualizar tus datos.');
        }

        // 2. Validación de datos
        $request->validate([
            'nombre' => 'required|string|max:255',
            // Aseguramos que el correo sea único en la tabla 'usuarios', excepto para el propio usuario
            'correo' => [
                'required',
                'string',
                'email',
                'max:255',
                Rule::unique('usuarios', 'correo')->ignore($user->id_usuario, 'id_usuario'),
            ],
            // Asume que el teléfono puede ser de cualquier formato de texto
            'telefono' => 'required|string|max:20', 
        ]);

        // 3. Actualización de la base de datos
        try {
            // Actualizar los campos del modelo con los datos del formulario
            $user->nombre = $request->input('nombre');
            $user->correo = $request->input('correo');
            $user->telefono = $request->input('telefono');
            
            // Guardar los cambios en la base de datos
            $user->save();
            
            // 4. Redirección con mensaje de éxito (usando una vista de ejemplo)
            return redirect()->route('micuenta')->with('success', '¡Información actualizada correctamente!');
            
        } catch (\Exception $e) {
            // Manejo de errores
            // Puedes loggear el error o devolver un mensaje más específico
            return redirect()->back()->with('error', 'Hubo un error al intentar actualizar la información. Por favor, inténtalo de nuevo.');
        }
    }
    
    public function cambiarContrasena(Request $request)
    {
        // Obtener el usuario autenticado
        $user = Auth::user();

        // 1. Validación de datos
        // Se valida que se cumplan todas las reglas antes de intentar actualizar
        $request->validate([
            // Validación personalizada para la contraseña actual
            'password_actual' => [
                'required',
                // Validación manual para verificar la contraseña actual contra la BD (campo 'contrasena')
                function ($attribute, $value, $fail) use ($user) {
                    // Verifica si la contraseña ingresada coincide con la encriptada en el campo 'contrasena'
                    if (!Hash::check($value, $user->contrasena)) { 
                        $fail('La contraseña actual ingresada es incorrecta.');
                    }
                },
            ],
            // La nueva contraseña debe ser requerida, al menos de 8 caracteres, y confirmada 
            // (debe coincidir con el campo 'password_confirmation')
            'password' => 'required|string|min:8|confirmed', 
        ]);

        // 2. Verificación de que la nueva contraseña sea diferente a la actual (opcional, pero buena práctica)
        if (Hash::check($request->input('password'), $user->contrasena)) {
            return redirect()->back()->withErrors(['password' => 'La nueva contraseña no puede ser igual a la contraseña actual.'])->withInput();
        }

        // 3. Actualización de la Contraseña en la Base de Datos
        try {
            // Encriptar la nueva contraseña con Hash::make()
            $user->contrasena = Hash::make($request->input('password'));
            
            // Guardar el modelo en la base de datos
            $user->save();

            // 4. Redirección con mensaje de éxito
            return redirect()->route('micuenta')->with('success', '¡Contraseña actualizada correctamente!');
            
        } catch (\Exception $e) {
            // Manejo de errores en caso de fallo en la base de datos
            // Opcionalmente puedes usar \Log::error($e->getMessage()); para registrar el error
            return redirect()->back()->with('error', 'Hubo un error interno al intentar actualizar la contraseña. Por favor, inténtalo de nuevo.');
        }
    }
}

