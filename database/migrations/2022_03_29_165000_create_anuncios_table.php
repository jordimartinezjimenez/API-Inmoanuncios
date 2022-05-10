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
            $table->foreign('vendedor_id')->references('id')->on('generals');
            // $table->string('referencia')->default(randomReferencia());
            $table->string('imagen')->nullable();
            // $table->unsignedBigInteger('provincia_id');
            // $table->foreign('provincia_id')->references('id')->on('provincias');
            $table->unsignedBigInteger('municipio_id');
            $table->foreign('municipio_id')->references('id')->on('municipios');
            $table->integer('cp')->nullable();
            $table->double('precio');
            $table->unsignedBigInteger('tipo_id');
            $table->foreign('tipo_id')->references('id')->on('tipos');
            $table->enum('trato', ["Alquiler", "Venta"]);
            $table->integer('habitaciones')->nullable();
            $table->integer('area')->nullable();
            $table->text('descripcion')->nullable();
            $table->timestamp('created_at')->nullable();
            // $table->timestamps();
        });
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
}
