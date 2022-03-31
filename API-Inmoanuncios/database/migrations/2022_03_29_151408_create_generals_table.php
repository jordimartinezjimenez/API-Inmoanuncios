<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;
use App\Models\Usuario;

class CreateGeneralsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('generals', function (Blueprint $table) {
            // $table->id();
            $table->unsignedBigInteger('usuario_id')->primary();
            $table->foreign('usuario_id')->references('id')->on('usuarios');
            $table->string('nombre');
            $table->string('apellidos');
            $table->string('email');
            $table->integer('telefono');
            $table->string('imagen');
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
        Schema::dropIfExists('generals');
    }
}
