<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreatePkCoursesTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::table('courses', function (Blueprint $table) {
           // $table->primary(['id_trajet', 'id_chauffeur', 'date_depart']);

            $table->foreign('id_chauffeur')->references('id')->on('chauffeurs')->onUpdate('cascade');
            $table->foreign('id_trajet')->references('id')->on('trajets')->onUpdate('cascade');
            $table->foreign('id_vehicule')->references('id')->on('vehicules')->onUpdate('cascade');
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('pk_courses');
    }
}
