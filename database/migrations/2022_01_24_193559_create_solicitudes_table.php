<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateSolicitudesTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('solicitudes', function (Blueprint $table) {
            $table->id('idSolicitud');
            $table->unsignedBigInteger('idUsuarioFK');
            $table->foreign('idUsuarioFK')->references('idUsuario')->on('usuarios');
            $table->unsignedBigInteger('idServicioFK');
            $table->foreign('idServicioFK')->references('idServicio')->on('servicios');
            $table->unsignedBigInteger('idEstadoFK');
            $table->foreign('idEstadoFK')->references('idEstado')->on('estados');
            $table->text('descripcionSolicitud');
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
        Schema::dropIfExists('solicitudes');
    }
}
