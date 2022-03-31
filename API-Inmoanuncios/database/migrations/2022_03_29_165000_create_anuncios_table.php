<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateAnunciosTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('anuncios', function (Blueprint $table) {
            $table->id();
            $table->string('referencia');
            $table->unsignedBigInteger('vendedor_id');
            $table->foreign('vendedor_id')->references('usuario_id')->on('generals');
            // $table->string('referencia')->default(randomReferencia());
            $table->string('imagen');
            // $table->unsignedBigInteger('provincia_id');
            // $table->foreign('provincia_id')->references('id')->on('provincias');
            $table->unsignedBigInteger('municipio_id');
            $table->foreign('municipio_id')->references('id')->on('municipios');
            $table->integer('cp');
            $table->double('precio');
            $table->unsignedBigInteger('tipo_id');
            $table->foreign('tipo_id')->references('id')->on('tipos');
            $table->enum('trato', ["Alquiler", "Venta"]);
            $table->integer('habitaciones');
            $table->integer('area');
            $table->text('descripcion');
            $table->timestamp('created_at');
            // $table->timestamps();
        });
        // referencia imagen vendedor provincia municipio cp precio tipo habitaciones area descripcion trato
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('anuncios');
    }

    public function randomReferencia()
    {
        $characters = '0123456789abcdefghijklmnopqrstuvwxyzABCDEFGHIJKLMNOPQRSTUVWXYZ';
        $referenciaLength = 10;
        $charactersLength = strlen($characters);

        $referencia = '';
        for ($i = 0; $i < $referenciaLength; $i++) {
            $referencia .= $characters[rand(0, $charactersLength - 1)];
        }

        return $referencia;
    }
}
