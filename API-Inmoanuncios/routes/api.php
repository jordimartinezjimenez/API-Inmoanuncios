<?php

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Route;

use App\Http\Controllers\ApiController;

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

Route::middleware('auth:sanctum')->get('/user', function (Request $request) {
    return $request->user();
});

// Anuncios
Route::get('/anuncios', [ApiController::class, 'getAnuncios']);
Route::get('/anuncio/{id}', [ApiController::class, 'getAnuncio']);
Route::put('/anuncio/{id}', [ApiController::class, 'updateAnuncio']);
Route::post('/anuncio', [ApiController::class, 'insertAnuncio']);
Route::delete('/anuncio/{id}', [ApiController::class, 'deleteAnuncio']);

// Usuarios
Route::get('/usuarios', [ApiController::class, 'getUsuarios']);

    // Admins
    Route::get('/admins', [ApiController::class, 'getAdmins']);

    // Generals
    Route::get('/generals', [ApiController::class, 'getGenerals']);

// Provincias
Route::get('/provincias', [ApiController::class, 'getProvincias']);

// Municipios
Route::get('/municipios', [ApiController::class, 'getMunicipios']);

// Tipos
Route::get('/tipos', [ApiController::class, 'getTipos']);



// Ejemplos
// Route::get('/comptes', [ApiController::class, 'getComptes']);
// Route::get('/compte/{id}', [ApiController::class, 'getCompte']);
// Route::put('/compte/{id}', [ApiController::class, 'updateCompte']);
// Route::post('/compte', [ApiController::class, 'insertCompte']);
// Route::delete('/compte/{id}', [ApiController::class, 'deleteCompte']);