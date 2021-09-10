<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateReservationsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('reservations', function (Blueprint $table) {
            $table->id();
            $table->integer('nombre_de_place');
            $table->string('point_depart');
            $table->string('point_darrivee');
            $table->unsignedBigInteger('id_course');
            $table->unsignedBigInteger('id_client');
            $table->enum('etat', ['desactiver', 'activer', 'suspendus']);
            $table->timestamps();
            $table->foreign('id_course')->references('id')->on('courses')->onUpdate('cascade');
            $table->foreign('id_client')->references('id')->on('clients')->onUpdate('cascade');
        });

    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('reservations');
    }
}
