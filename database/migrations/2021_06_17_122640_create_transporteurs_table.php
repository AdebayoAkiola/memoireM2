<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateTransporteursTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('transporteurs', function (Blueprint $table) {
            $table->id();
            $table->string('login')->unique();
            $table->string('password');
            $table->string('prenom');
            $table->string('nom');
            $table->integer('note');
            $table->string('telephone')->unique();
            $table->string('email')->nullable();
            $table->enum('etat', ['desactiver', 'activer', 'suspendus']);
            $table->string('photo')->nullable();
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
        Schema::dropIfExists('transporteurs');
    }
}
