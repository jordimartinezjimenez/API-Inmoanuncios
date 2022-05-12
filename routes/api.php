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
Route::post('/anuncio/{id}', [ApiController::class, 'updateAnuncio']);
Route::post('/anuncio', [ApiController::class, 'insertAnuncio']);
Route::delete('/anuncio/{id}', [ApiController::class, 'deleteAnuncio']);

Route::get('/anuncio/tipo/{id}', [ApiController::class, 'getTipoAnuncio']);
Route::get('/anuncio/municipio/{id}', [ApiController::class, 'getMunicipioAnuncio']);
Route::get('/anuncio/provincia/{id}', [ApiController::class, 'getProvinciaAnuncio']);
    Route::get('/municipio/provincia/{id}', [ApiController::class, 'getProvinciaMunicipio']);
Route::get('/anuncio/vendedor/{id}', [ApiController::class, 'getVendedorAnuncio']);
Route::get('/anuncio/imagenes/{id}', [ApiController::class, 'getImagenesAnuncio']);

// Usuarios
Route::get('/usuarios', [ApiController::class, 'getUsuarios']);
Route::get('/usuario/{id}', [ApiController::class, 'getUsuario']);

    // Admins
    Route::get('/admins', [ApiController::class, 'getAdmins']);
    Route::get('/admin/{id}', [ApiController::class, 'getAdmin']);

    // Generals
    Route::get('/generals', [ApiController::class, 'getGenerals']);
    Route::get('/general/{id}', [ApiController::class, 'getGeneral']);
    Route::post('/general/{id}', [ApiController::class, 'updateGeneral']);
    Route::post('/general', [ApiController::class, 'insertGeneral']);
    Route::delete('/general/{id}', [ApiController::class, 'deleteGeneral']);

// Provincias
Route::get('/provincias', [ApiController::class, 'getProvincias']);
Route::get('/provincia/{id}', [ApiController::class, 'getProvincia']);

// Municipios
Route::get('/municipios', [ApiController::class, 'getMunicipios']);
Route::get('/municipio/{id}', [ApiController::class, 'getMunicipio']);

// Tipos
Route::get('/tipos', [ApiController::class, 'getTipos']);
Route::get('/tipo/{id}', [ApiController::class, 'getTipo']);

// Email
Route::post('/contactar-vendedor', [ApiController::class, 'contactarVendedor']);

// Ejemplos
// Route::get('/comptes', [ApiController::class, 'getComptes']);
// Route::get('/compte/{id}', [ApiController::class, 'getCompte']);
// Route::put('/compte/{id}', [ApiController::class, 'updateCompte']);
// Route::post('/compte', [ApiController::class, 'insertCompte']);
// Route::delete('/compte/{id}', [ApiController::class, 'deleteCompte']);