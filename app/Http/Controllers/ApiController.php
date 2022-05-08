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

/**
 * @OA\Info(
 *      version="1.0.0",
 *      title="API INMOANUNCIOS",
 * )
 *  @OA\Server(
 *      url="http://localhost/daw/m14/Inmoanuncios/API-Inmoanuncios/public/index.php",
 *      description="Jordi Martinez"
 *  )
 * 
 * @OA\Server(
 *      url="http://localhost/2021-2022/M14/proyecto/API-Inmoanuncios/public/index.php",
 *      description="Octavio Iorio"
 *  )
 */
class ApiController extends BaseController
{
    use AuthorizesRequests, DispatchesJobs, ValidatesRequests;

    // Anuncios

    /**
     * @OA\Get(
     *      path="/api/anuncios",
     *      tags={"Anuncios"},
     *      summary="Ver todos los anuncios.",
     *      @OA\Response(
     *          response=200,
     *          description="Devuelve todos los anuncios."
     *       ),
     *      @OA\Response(response=400, description="Bad request"),
     *      @OA\Response(response=404, description="Resource Not Found"),
     * )
     */
    function getAnuncios () {
        return Anuncio::all();
    }

    function getTipoAnuncio ($id) {
        return Anuncio::find($id)->tipo;
    }

    function getMunicipioAnuncio ($id) {
        return Anuncio::find($id)->municipio;
    }

    function getProvinciaAnuncio ($id) {
        return Anuncio::find($id)->municipio->provincia;
    }

        function getProvinciaMunicipio ($id) {
            return Municipio::find($id)->provincia;
        }

    function getVendedorAnuncio ($id) {
        return Anuncio::find($id)->vendedor;
    }

    function getImagenesAnuncio ($id) {
        return Anuncio::find($id)->anuncioimagen;
    }

    /**
     * @OA\Get(
     *      path="/api/anuncio/{id}",
     *      tags={"Anuncios"},
     *      summary="Ver un anuncio.",
     *      @OA\Parameter(
     *          name="id",
     *          description="id del anuncio",
     *          required=true,
     *          in="path",
     *          @OA\Schema(
     *              type="integer"
     *          )
     *      ),
     *      @OA\Response(
     *          response=200,
     *          description="Resultado de buscar el anuncio por id."
     *       ),
     *      @OA\Response(response=400, description="Bad request"),
     *      @OA\Response(response=404, description="Resource Not Found"),
     * )
     */
    function getAnuncio (Request $request, $id) {
        return Anuncio::find($id);
    }

    /**
    * @OA\Put(
    *      path="/api/anuncio/{id}",
    *      tags={"Anuncios"},
    *      summary="Publicar un anuncio.",
    *      @OA\Parameter(
    *          name="id",
    *          description="id del anuncio",
    *          required=true,
    *          in="path",
    *          @OA\Schema(
    *              type="integer"
    *          )
    *      ),
    *      @OA\Parameter(
    *          name="referencia",
    *          description="referencia del anuncio",
    *          required=false,
    *          in="query",
    *          @OA\Schema(
    *              type="string"
    *          )
    *      ),
    *      @OA\Parameter(
    *          name="vendedor_id",
    *          description="id del usuario-vendedor del anuncio",
    *          required=false,
    *          in="query",
    *          @OA\Schema(
    *              type="integer"
    *          )
    *      ),
    *      @OA\Parameter(
    *          name="imagen",
    *          description="imagen del anuncio",
    *          required=false,
    *          in="query",
    *          @OA\Schema(
    *              type="string"
    *          )
    *      ),
    *      @OA\Parameter(
    *          name="municipio_id",
    *          description="id del municipio del anuncio",
    *          required=false,
    *          in="query",
    *          @OA\Schema(
    *              type="integer"
    *          )
    *      ),
    *      @OA\Parameter(
    *          name="cp",
    *          description="codigo postal del anuncio",
    *          required=false,
    *          in="query",
    *          @OA\Schema(
    *              type="integer"
    *          )
    *      ),
    *      @OA\Parameter(
    *          name="precio",
    *          description="precio del anuncio",
    *          required=false,
    *          in="query",
    *          @OA\Schema(
    *              type="double"
    *          )
    *      ),
    *      @OA\Parameter(
    *          name="tipo_id",
    *          description="id del tipo de inmueble del anuncio",
    *          required=false,
    *          in="query",
    *          @OA\Schema(
    *              type="integer"
    *          )
    *      ),
    *      @OA\Parameter(
    *          name="trato",
    *          description="trato de inmueble del anuncio",
    *          required=false,
    *          in="query",
    *          @OA\Schema(
    *              type="string",
    *              enum={"Alquiler", "Venta"}
    *          )
    *      ),
    *      @OA\Parameter(
    *          name="habitaciones",
    *          description="habitaciones del anuncio",
    *          required=false,
    *          in="query",
    *          @OA\Schema(
    *              type="integer"
    *          )
    *      ),
    *      @OA\Parameter(
    *          name="area",
    *          description="area/m2 del anuncio",
    *          required=false,
    *          in="query",
    *          @OA\Schema(
    *              type="integer"
    *          )
    *      ),
    *      @OA\Parameter(
    *          name="descripcion",
    *          description="descripcion del anuncio",
    *          required=false,
    *          in="query",
    *          @OA\Schema(
    *              type="text"
    *          )
    *      ),
    *      @OA\Parameter(
    *          name="created_at",
    *          description="fecha de creacion del anuncio",
    *          required=false,
    *          in="query",
    *          @OA\Schema(
    *              type="string"
    *          )
    *      ),
    *      @OA\Response(
    *          response=200,
    *          description="Devuelve el anuncio que hemos modificado."
    *       ),
    *      @OA\Response(response=400, description="Bad request"),
    *      @OA\Response(response=404, description="Resource Not Found"),
    * )
    */
    function updateAnuncio (Request $request, $id) {
        // $anuncio = Anuncio::find($id);
        // $anuncio->update($request->all());

        // return $anuncio;
        return Anuncio::find($id)->update($request->all());
    }

    /**
    * @OA\Post(
    *      path="/api/anuncio/{id}",
    *      tags={"Anuncios"},
    *      summary="Insertar un anuncio.",
    *      @OA\Parameter(
    *          name="referencia",
    *          description="referencia del anuncio",
    *          required=true,
    *          in="query",
    *          @OA\Schema(
    *              type="string"
    *          )
    *      ),
    *      @OA\Parameter(
    *          name="vendedor_id",
    *          description="id del usuario-vendedor del anuncio",
    *          required=true,
    *          in="query",
    *          @OA\Schema(
    *              type="integer"
    *          )
    *      ),
    *      @OA\Parameter(
    *          name="imagen",
    *          description="imagen del anuncio",
    *          required=false,
    *          in="query",
    *          @OA\Schema(
    *              type="string"
    *          )
    *      ),
    *      @OA\Parameter(
    *          name="municipio_id",
    *          description="id del municipio del anuncio",
    *          required=true,
    *          in="query",
    *          @OA\Schema(
    *              type="integer"
    *          )
    *      ),
    *      @OA\Parameter(
    *          name="cp",
    *          description="codigo postal del anuncio",
    *          required=true,
    *          in="query",
    *          @OA\Schema(
    *              type="integer"
    *          )
    *      ),
    *      @OA\Parameter(
    *          name="precio",
    *          description="precio del anuncio",
    *          required=true,
    *          in="query",
    *          @OA\Schema(
    *              type="integer"
    *          )
    *      ),
    *      @OA\Parameter(
    *          name="tipo_id",
    *          description="id del tipo de inmueble del anuncio",
    *          required=true,
    *          in="query",
    *          @OA\Schema(
    *              type="integer"
    *          )
    *      ),
    *      @OA\Parameter(
    *          name="trato",
    *          description="trato de inmueble del anuncio",
    *          required=true,
    *          in="query",
    *          @OA\Schema(
    *              type="string",
    *              enum={"Alquiler", "Venta"}
    *          )
    *      ),
    *      @OA\Parameter(
    *          name="habitaciones",
    *          description="habitaciones del anuncio",
    *          required=true,
    *          in="query",
    *          @OA\Schema(
    *              type="integer"
    *          )
    *      ),
    *      @OA\Parameter(
    *          name="area",
    *          description="area/m2 del anuncio",
    *          required=true,
    *          in="query",
    *          @OA\Schema(
    *              type="integer"
    *          )
    *      ),
    *      @OA\Parameter(
    *          name="descripcion",
    *          description="descripcion del anuncio",
    *          required=false,
    *          in="query",
    *          @OA\Schema(
    *              type="text"
    *          )
    *      ),
    *      @OA\Response(
    *          response=200,
    *          description="Devuelve el anuncio que hemos insertado."
    *       ),
    *      @OA\Response(response=400, description="Bad request"),
    *      @OA\Response(response=404, description="Resource Not Found"),
    * )
    */
    function insertAnuncio (Request $request) {
        return Anuncio::create($request->all());
    }

    /**
     * @OA\Delete(
     *      path="/api/anuncio/{id}",
     *      tags={"Anuncios"},
     *      summary="Eliminar un anuncio.",
     *      @OA\Parameter(
     *          name="id",
     *          description="id del anuncio",
     *          required=true,
     *          in="path",
     *          @OA\Schema(
     *              type="integer"
     *          )
     *      ),
     *      @OA\Response(
     *          response=200,
     *          description="Devuelve el anuncio que hemos eliminado."
     *       ),
     *      @OA\Response(response=400, description="Bad request"),
     *      @OA\Response(response=404, description="Resource Not Found"),
     * )
     */
    function deleteAnuncio (Request $request, $id) {
        return Anuncio::find($id)->delete();
    }

    // Usuarios
    
    /**
         * @OA\Get(
         *      path="/api/usuarios",
         *      tags={"Usuarios"},
         *      summary="Ver todos los usuarios.",
         *      @OA\Response(
         *          response=200,
         *          description="Devuelve todos los usuarios."
         *       ),
         *      @OA\Response(response=400, description="Bad request"),
         *      @OA\Response(response=404, description="Resource Not Found"),
         * )
         */
    function getUsuarios () {
        return Usuario::all();
    }

    /**
         * @OA\Get(
         *      path="/api/usuario/{id}",
         *      tags={"Usuarios"},
         *      summary="Ver un usuario.",
         *      @OA\Parameter(
         *          name="id",
         *          description="id del usuario",
         *          required=true,
         *          in="path",
         *          @OA\Schema(
         *              type="integer"
         *          )
         *      ),
         *      @OA\Response(
         *          response=200,
         *          description="Resultado de buscar el usuario por id."
         *       ),
         *      @OA\Response(response=400, description="Bad request"),
         *      @OA\Response(response=404, description="Resource Not Found"),
         * )
         */
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

        /**
         * @OA\Get(
         *      path="/api/admins",
         *      tags={"Usuarios admin"},
         *      summary="Ver todos los usuarios admins.",
         *      @OA\Response(
         *          response=200,
         *          description="Devuelve todos los usuarios admins."
         *       ),
         *      @OA\Response(response=400, description="Bad request"),
         *      @OA\Response(response=404, description="Resource Not Found"),
         * )
         */
        function getAdmins () {
            return Admin::all();
        }

        /**
         * @OA\Get(
         *      path="/api/admin/{id}",
         *      tags={"Usuarios admin"},
         *      summary="Ver un usuario admin.",
         *      @OA\Parameter(
         *          name="id",
         *          description="id del usuario admin",
         *          required=true,
         *          in="path",
         *          @OA\Schema(
         *              type="integer"
         *          )
         *      ),
         *      @OA\Response(
         *          response=200,
         *          description="Resultado de buscar el usuario admin por id."
         *       ),
         *      @OA\Response(response=400, description="Bad request"),
         *      @OA\Response(response=404, description="Resource Not Found"),
         * )
         */
        function getAdmin (Request $request, $id) {
            return Admin::find($id);
        }

        // Generals

        /**
         * @OA\Get(
         *      path="/api/generals",
         *      tags={"Usuarios generales"},
         *      summary="Ver todos los usuarios generales.",
         *      @OA\Response(
         *          response=200,
         *          description="Devuelve todos los usuarios generales."
         *       ),
         *      @OA\Response(response=400, description="Bad request"),
         *      @OA\Response(response=404, description="Resource Not Found"),
         * )
         */
        function getGenerals () {
            return General::all();
        }

        /**
         * @OA\Get(
         *      path="/api/general/{id}",
         *      tags={"Usuarios generales"},
         *      summary="Ver un usuario general.",
         *      @OA\Parameter(
         *          name="id",
         *          description="id del usuario general",
         *          required=true,
         *          in="path",
         *          @OA\Schema(
         *              type="integer"
         *          )
         *      ),
         *      @OA\Response(
         *          response=200,
         *          description="Resultado de buscar el usuario general por id."
         *       ),
         *      @OA\Response(response=400, description="Bad request"),
         *      @OA\Response(response=404, description="Resource Not Found"),
         * )
         */
        function getGeneral (Request $request, $id) {
            return General::find($id);
        }
        
        /**
        * @OA\Put(
        *      path="/api/general/{id}",
        *      tags={"Usuarios generales"},
        *      summary="Registrar usuario general.",
        *      @OA\Parameter(
        *          name="id",
        *          description="Id del usuario general",
        *          required=true,
        *          in="path",
        *          @OA\Schema(
        *              type="integer"
        *          )
        *      ),
        *      @OA\Parameter(
        *          name="nombre",
        *          description="Nombre del usuario general",
        *          required=false,
        *          in="query",
        *          @OA\Schema(
        *              type="string"
        *          )
        *      ),
        *      @OA\Parameter(
        *          name="apellidos",
        *          description="Apellidos del usuario general",
        *          required=false,
        *          in="query",
        *          @OA\Schema(
        *              type="string"
        *          )
        *      ),
        *      @OA\Parameter(
        *          name="email",
        *          description="Email del usuario general",
        *          required=false,
        *          in="query",
        *          @OA\Schema(
        *              type="string"
        *          )
        *      ),
        *      @OA\Parameter(
        *          name="telefono",
        *          description="Telefono del usuario general",
        *          required=false,
        *          in="query",
        *          @OA\Schema(
        *              type="integer"
        *          )
        *      ),
        *      @OA\Parameter(
        *          name="imagen",
        *          description="Imagen del usuario general",
        *          required=false,
        *          in="query",
        *          @OA\Schema(
        *              type="string"
        *          )
        *      ),
        *      @OA\Response(
        *          response=200,
        *          description="Devuelve el usuario general que hemos modificado."
        *       ),
        *      @OA\Response(response=400, description="Bad request"),
        *      @OA\Response(response=404, description="Resource Not Found"),
        * )
        */
        function updateGeneral (Request $request, $id) {
            $general = General::find($id);
            $general->update($request->all());

            return $general;
            // return General::find($id)->update($request->all());
        }
        
        /**
        * @OA\Post(
        *      path="/api/general",
        *      tags={"Usuarios generales"},
        *      summary="Registrar usuario general.",
        *      @OA\Parameter(
        *          name="nickname",
        *          description="Nickname del usuario general",
        *          required=true,
        *          in="query",
        *          @OA\Schema(
        *              type="string"
        *          )
        *      ),
        *      @OA\Parameter(
        *          name="password",
        *          description="Password del usuario general",
        *          required=true,
        *          in="query",
        *          @OA\Schema(
        *              type="string"
        *          )
        *      ),
        *      @OA\Parameter(
        *          name="nombre",
        *          description="Nombre del usuario general",
        *          required=true,
        *          in="query",
        *          @OA\Schema(
        *              type="string"
        *          )
        *      ),
        *      @OA\Parameter(
        *          name="apellidos",
        *          description="Apellidos del usuario general",
        *          required=true,
        *          in="query",
        *          @OA\Schema(
        *              type="string"
        *          )
        *      ),
        *      @OA\Parameter(
        *          name="email",
        *          description="Email del usuario general",
        *          required=true,
        *          in="query",
        *          @OA\Schema(
        *              type="string"
        *          )
        *      ),
        *      @OA\Parameter(
        *          name="telefono",
        *          description="Telefono del usuario general",
        *          required=true,
        *          in="query",
        *          @OA\Schema(
        *              type="integer"
        *          )
        *      ),
        *      @OA\Parameter(
        *          name="imagen",
        *          description="Imagen del usuario general",
        *          required=false,
        *          in="query",
        *          @OA\Schema(
        *              type="string"
        *          )
        *      ),
        *      @OA\Response(
        *          response=200,
        *          description="Devuelve el usuario general que hemos insertado."
        *       ),
        *      @OA\Response(response=400, description="Bad request"),
        *      @OA\Response(response=404, description="Resource Not Found"),
        * )
        */
        function insertGeneral (Request $request) {
            $usuario = Usuario::create($request->all());

            return General::create([
                'id' =>  $usuario->id,
                'nombre' =>  $request->nombre,
                'apellidos' => $request->apellidos,
                'email' => $request->email,
                'telefono' => $request->telefono,
                'imagen' =>  $request->imagen,
            ]);

        }
        
        /**
         * @OA\Delete(
         *      path="/api/general/{id}",
         *      tags={"Usuarios generales"},
         *      summary="Eliminar un usuario general.",
         *      @OA\Parameter(
         *          name="id",
         *          description="Id del usuario general",
         *          required=true,
         *          in="path",
         *          @OA\Schema(
         *              type="integer"
         *          )
         *      ),
         *      @OA\Response(
         *          response=200,
         *          description="Devuelve el usuario general que hemos eliminado."
         *       ),
         *      @OA\Response(response=400, description="Bad request"),
         *      @OA\Response(response=404, description="Resource Not Found"),
         * )
         */
        function deleteGeneral (Request $request, $id) {
            Anuncio::where("vendedor_id", $id)->delete();
            $general = General::find($id)->delete();
            Usuario::where("id", $id)->delete();
            return $general;
        }

    // Provincias

    /**
     * @OA\Get(
     *      path="/api/provincias",
     *      tags={"Provincias"},
     *      summary="Ver todas las provincias.",
     *      @OA\Response(
     *          response=200,
     *          description="Devuelve todas las provincias."
     *       ),
     *      @OA\Response(response=400, description="Bad request"),
     *      @OA\Response(response=404, description="Resource Not Found"),
     * )
     */
    function getProvincias () {
        return Provincia::all();
    }

    /**
     * @OA\Get(
     *      path="/api/provincia/{id}",
     *      tags={"Provincias"},
     *      summary="Ver una provincia.",
     *      @OA\Parameter(
     *          name="id",
     *          description="id de la provincia",
     *          required=true,
     *          in="path",
     *          @OA\Schema(
     *              type="integer"
     *          )
     *      ),
     *      @OA\Response(
     *          response=200,
     *          description="Resultado de buscar la provincia por id."
     *       ),
     *      @OA\Response(response=400, description="Bad request"),
     *      @OA\Response(response=404, description="Resource Not Found"),
     * )
     */
    function getProvincia (Request $request, $id) {
        return Provincia::find($id);
    }

    // Municipios

    /**
     * @OA\Get(
     *      path="/api/municipios",
     *      tags={"Municipios"},
     *      summary="Ver todos los municipios.",
     *      @OA\Response(
     *          response=200,
     *          description="Devuelve todos los municipios."
     *       ),
     *      @OA\Response(response=400, description="Bad request"),
     *      @OA\Response(response=404, description="Resource Not Found"),
     * )
     */
    function getMunicipios () {
        return Municipio::all();
    }

    /**
     * @OA\Get(
     *      path="/api/municipio/{id}",
     *      tags={"Municipios"},
     *      summary="Ver un municipio.",
     *      @OA\Parameter(
     *          name="id",
     *          description="id del municipio",
     *          required=true,
     *          in="path",
     *          @OA\Schema(
     *              type="integer"
     *          )
     *      ),
     *      @OA\Response(
     *          response=200,
     *          description="Resultado de buscar el municipio por id."
     *       ),
     *      @OA\Response(response=400, description="Bad request"),
     *      @OA\Response(response=404, description="Resource Not Found"),
     * )
     */
    function getMunicipio (Request $request, $id) {
        return Municipio::find($id);
    }

    // Tipos de inmueble

    /**
     * @OA\Get(
     *      path="/api/tipos",
     *      tags={"Tipos"},
     *      summary="Ver todos los tipos.",
     *      @OA\Response(
     *          response=200,
     *          description="Devuelve todos los tipos."
     *       ),
     *      @OA\Response(response=400, description="Bad request"),
     *      @OA\Response(response=404, description="Resource Not Found"),
     * )
     */
    function getTipos () {
        return Tipo::all();
    }

    /**
     * @OA\Get(
     *      path="/api/tipo/{id}",
     *      tags={"Tipos"},
     *      summary="Ver un tipo.",
     *      @OA\Parameter(
     *          name="id",
     *          description="id del tipo",
     *          required=true,
     *          in="path",
     *          @OA\Schema(
     *              type="integer"
     *          )
     *      ),
     *      @OA\Response(
     *          response=200,
     *          description="Resultado de buscar el tipo por id."
     *       ),
     *      @OA\Response(response=400, description="Bad request"),
     *      @OA\Response(response=404, description="Resource Not Found"),
     * )
     */
    function getTipo (Request $request, $id) {
        return Tipo::find($id);
    }

}
