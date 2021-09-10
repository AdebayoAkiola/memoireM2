<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateCoursesTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('courses', function (Blueprint $table) {
            $table->id();
            $table->string('date_depart');
            $table->String('heure_depart');
            $table->String('duree');
            $table->integer('prix');
            $table->unsignedBigInteger('id_vehicule')->nullable();
            $table->unsignedBigInteger('id_trajet');
            $table->unsignedBigInteger('id_chauffeur')->nullable();
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
        Schema::dropIfExists('courses');
    }
}
