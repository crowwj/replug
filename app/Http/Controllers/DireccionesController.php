<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\cp;
use App\Models\Direcciones;

class DireccionesController extends Controller
{
    /**
     * * @param string $cp
     * @return \Illuminate\Http\JsonResponse
     */
    public function buscarCp($cp)
    {
        // 1. Validar que el CP tenga 5 dígitos
        if (!preg_match('/^\d{5}$/', $cp)) {
            return response()->json([
                'error' => 'Código Postal debe tener 5 dígitos.',
                'results' => []
            ], 400);
        }

        // 2. Ejecutar la consulta: obtener todos los registros que coinciden con el CP
        $resultados = cp::where('CodigoPostal', $cp)
                         ->get();

        if ($resultados->isEmpty()) {
            return response()->json([
                'error' => 'Código Postal no encontrado.',
                'results' => []
            ], 404);
        }

        // 3. Procesar los datos para la respuesta (siempre son los mismos para un CP)
        // Obtenemos los datos únicos del primer resultado:
        $datosPrincipales = [
            'CodigoPostal' => $resultados->first()->CodigoPostal,
            'NombreE' => $resultados->first()->NombreE, // Nombre del Estado
            'NombreM' => $resultados->first()->NombreM, // Nombre del Municipio
            'Ciudad' => $resultados->first()->Ciudad,   // Nombre de la Ciudad
        ];

        // Obtenemos la lista de asentamientos (Colonias)
        $colonias = $resultados->map(function ($item) {
            return [
                'idCP' => $item->idCP,
                'Asentamiento' => $item->Asentamiento, // Nombre de la Colonia
                'Tipo' => $item->Tipo // Tipo de Asentamiento
            ];
        });

        // 4. Devolver la respuesta en formato JSON
        return response()->json([
            'datosPrincipales' => $datosPrincipales,
            'colonias' => $colonias->toArray()
        ]);
    }

    public function agregardireccion(Request $request)
    {
        // 1. Validar los datos de entrada según el esquema de la BD
        // NumExt, Calle, NumInt, idCPF y idUsuarioF son NOT NULL.
        $request->validate([
            'cp' => 'required|digits:5', // Para buscar idCPF
            'colonia' => 'required|string', // Para buscar idCPF
            'calle' => 'required|string|max:80', 
            'num_ext' => 'required|string|max:8', 
            'num_int' => 'required|string|max:8', // ESTRICTAMENTE REQUERIDO (NOT NULL en BD)
            'indicaciones' => 'nullable|string|max:100', // NULLABLE en BD
        ]);

        $data = $request->all();

        // 1.1. Obtener ID de Usuario de la Sesión
        $userId = session('id_usuario'); 

        if (empty($userId)) {
            Log::warning("Intento de guardar dirección sin 'id_usuario' en sesión.");
            return response()->json([
                'error' => 'Error de autenticación: la sesión del usuario no es válida o ha expirado.'
            ], 403); 
        }

        // 2. OBTENER EL idCPF (Clave foránea)
        // Buscamos el idCP que coincide con el CP y la Colonia
        $cp_registro = cp::where('CodigoPostal', $data['cp'])
                          ->where('Asentamiento', $data['colonia'])
                          ->first();

        if (!$cp_registro) {
            return response()->json([
                'error' => 'Colonia no encontrada para el CP proporcionado. Revise los datos.'
            ], 404);
        }

        $idCPF_a_guardar = $cp_registro->idCP;

        // 3. Crear y guardar la nueva dirección
        try {
            $nuevaDireccion = Direcciones::create([
                // Mapeo 100% preciso a los campos NOT NULL de la tabla 'direcciones'
                'idCPF' => $idCPF_a_guardar,
                'Calle' => $data['calle'],
                'NumExt' => $data['num_ext'],
                'NumInt' => $data['num_int'],
                'Indicaciones' => $data['indicaciones'] ?? null, // Usamos null si viene vacío, ya que la BD lo acepta.
                'idUsuarioF' => $userId, 
            ]);

            return redirect()->route('direcciones')->with('success', 'Direccion registrada correctamente');

        } catch (\Exception $e) {
            // Loguea el error de la base de datos (Foreign Key, etc.)
            Log::error("ERROR AL GUARDAR DIRECCIÓN (DB): " . $e->getMessage(), ['user_id' => $userId, 'data' => $data]);
            
            return response()->json([
                'error' => 'Error interno del servidor al guardar la dirección. Causa: ' . $e->getMessage()
            ], 500);
        }
    }
}
