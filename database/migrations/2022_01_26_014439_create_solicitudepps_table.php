<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateSolicitudeppsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('solicitudepps', function (Blueprint $table) {
            $table->id('idSolicitudEpp');
            $table->unsignedBigInteger('idSolicitudFK');
            $table->foreign('idSolicitudFK')->references('idSolicitud')->on('solicitudes');
            $table->string('nombreEpp', 100);
            $table->integer('cantidadSolicitudEpp');
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
        Schema::dropIfExists('solicitudepps');
    }
}
