<?php

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Route;

/*
|--------------------------------------------------------------------------
| API Routes
|--------------------------------------------------------------------------
|
| Here is where you can register API routes for your application. These
| routes are loaded by the RouteServiceProvider within a group which
| is assigned the "api" middleware group. Enjoy building your API!
|
*/

// Route::middleware('auth:api')->get('/user', function (Request $request) {
//     return $request->user();
// });

Route::post("login", "API\ApiUsuarios@autentication")->middleware("cors");
Route::get("listar-lugares", "API\ApiVuelos@listarLugares");
Route::get("listar-aerolineas", "API\ApiVuelos@listarAerolineas");
// Route::match(['post', 'options'], "mis-vuelos", "API\ApiVuelos@misVuelos")->middleware("cors");
Route::post("mis-vuelos", "API\ApiVuelos@misVuelos");// Route::post("mis-vuelos", "API\ApiVuelos@misVuelos");
Route::post('adquirir-vuelos', "API\ApiVuelos@adquirirVuelos");
