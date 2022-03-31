<?php

namespace App\Http\Controllers;

use Illuminate\Foundation\Auth\Access\AuthorizesRequests;
use Illuminate\Foundation\Bus\DispatchesJobs;
use Illuminate\Foundation\Validation\ValidatesRequests;
use Illuminate\Routing\Controller as BaseController;
use Illuminate\Http\Request;

use App\Models\Usuario;
use App\Models\Admin;
use App\Models\General;
use App\Models\Anuncio;
use App\Models\Municipio;
use App\Models\Provincia;
use App\Models\Tipo;

class ApiController extends BaseController
{
    use AuthorizesRequests, DispatchesJobs, ValidatesRequests;

    // Anuncios
    function getAnuncios () {
        return Anuncio::all();
    }

    function getAnuncio (Request $request, $id) {
        return Anuncio::find($id);
    }

    function updateAnuncio (Request $request, $id) {
        //cal posar en la peticio PUT el Header field:
        //Content-Type = application/x-www-form-urlencoded
        return Anuncio::find($id)->update($request->all());
    }

    function insertAnuncio (Request $request) {
        return Anuncio::create($request->all());
    }

    function deleteAnuncio (Request $request, $id) {
        return Anuncio::find($id)->delete();
    }

    // Usuarios
    function getUsuarios () {
        return Usuario::all();
    }

    function getUsuario (Request $request, $id) {
        return Usuario::find($id);
    }

    function updateUsuario (Request $request, $id) {
        return Usuario::find($id)->update($request->all());
    }

    function insertUsuario (Request $request) {
        return Usuario::create($request->all());
    }

    function deleteUsuario (Request $request, $id) {
        return Usuario::find($id)->delete();
    }

        // Admins
        function getAdmins () {
            return Admin::all();
        }

        function getAdmin (Request $request, $id) {
            return Admin::find($id);
        }
    
        function updateAdmin (Request $request, $id) {
            return Admin::find($id)->update($request->all());
        }
    
        function insertAdmin (Request $request) {
            return Admin::create($request->all());
        }
    
        function deleteAdmin (Request $request, $id) {
            Usuario::where("id", $id)->delete();
            return Admin::find($id)->delete();
        }

        // Generals
        function getGenerals () {
            return General::all();
        }

        function getGeneral (Request $request, $id) {
            return General::find($id);
        }
    
        function updateGeneral (Request $request, $id) {
            return General::find($id)->update($request->all());
        }
    
        function insertGeneral (Request $request) {
            return General::create($request->all());
        }
    
        function deleteGeneral (Request $request, $id) {
            Anuncio::where("vendedor_id", $id)->delete();
            Usuario::where("id", $id)->delete();
            return General::find($id)->delete();
        }

    // Provincias
    function getProvincias () {
        return Provincia::all();
    }

    function getProvincia (Request $request, $id) {
        return Provincia::find($id);
    }

    // Municipios
    function getMunicipios () {
        return Municipio::all();
    }

    function getMunicipio (Request $request, $id) {
        return Municipio::find($id);
    }

    // Tipos de inmueble
    function getTipos () {
        return Tipo::all();
    }

    function getTipo (Request $request, $id) {
        return Tipo::find($id);
    }

}
