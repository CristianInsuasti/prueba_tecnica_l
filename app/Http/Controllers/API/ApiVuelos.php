<?php

namespace App\Http\Controllers\API;

use App\Http\Controllers\Controller;
use App\Usuario;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;

class ApiVuelos extends Controller
{
    public function misVuelos(Request $request)
    {
        $usuario = new Usuario();
        $id_usuario = $usuario->id_usuario = $request->id_usuario;

        $data = DB::table('vuelos_usuarios')

            ->join('usuarios', 'vuelos_usuarios.id_usuario', '=', 'usuarios.id_usuario')
            ->join('aerolinea', 'vuelos_usuarios.id_aerolinea', '=', 'aerolinea.id_aerolinea')
            ->join('destinos', 'vuelos_usuarios.id_destino', '=', 'destinos.id_destino')
            ->join('origenes', 'vuelos_usuarios.id_origen', '=', 'origenes.id_origen')

            ->select(
                'aerolinea.nombre as Aerolinea',
                'destinos.nombre as Destino',
                'origenes.nombre as Origen'
            )

            ->where('usuarios.id_usuario', $id_usuario)
            ->get();

        if ($data->isEmpty()) {

            return response()->json(['menssage' => 'No se encontraron vuelos para ti'], 401);
        } else {
            return response()->json(['menssage' => 'OK', 'data' => $data], 201);
        }
    }

    public function listarAerolineas()
    {
        $data = DB::table('aerolinea')
            ->get();
        return response()->json(['menssage' => 'OK', 'data' => $data], 201);
    }

    public function listarLugares()
    {
        $data = DB::table('lugares')
            ->get();
        return response()->json(['menssage' => 'OK', 'data' => $data], 201);
    }

    public function adquirirVuelos()
    {
        
    }
}
