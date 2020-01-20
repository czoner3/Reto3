<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateIncidenciasTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('incidencia', function (Blueprint $table) {
            $table->bigIncrements('id');
            $table->integer('tipoIncidencia');
            $table->string('lugar');
            $table->time('hora');
            $table->integer('estado');
            $table->unsignedBigInteger('Usuario_id');
            $table->unsignedBigInteger('Tecnico_id');
            $table->unsignedBigInteger('Cliente_id');

            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('incidencia');
    }
}
