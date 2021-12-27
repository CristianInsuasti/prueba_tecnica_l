<?php

namespace App\Http\Controllers\API;

use App\Http\Controllers\Controller;
use App\Usuario;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;

class ApiUsuarios extends Controller
{
    public function autentication(Request $request)
    {
        $usuario = new Usuario();

        $email = $usuario->email = $request->email;
        $password = $usuario->password = $request->password;

        $data = DB::table('usuarios')
            ->where('email', $email)
            ->where('password', $password)
            ->get();

        if ($data->isEmpty()) {

            return response()->json(['menssage' => 'Usuario y/o Contraseña Incorrectos'], 401);
        } else {

            return response()->json(['menssage' => 'OK', 'data' => $data], 201);
        }
    }
}
