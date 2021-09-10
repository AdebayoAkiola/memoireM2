<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateVehiculesTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('vehicules', function (Blueprint $table) {
            $table->id();
            $table->string('immatriculation');
            $table->integer('nombre_de_place');
            $table->unsignedBigInteger('id_transporteur');
            $table->string('photo1');
            $table->string('photo2');
            $table->string('photo3');
            $table->enum('etat', ['desactiver', 'activer', 'suspendus']);
            $table->integer('is_deleted');
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
        Schema::dropIfExists('vehicules');
    }
}
