<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateClientsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('clients', function (Blueprint $table) {
            $table->id();
            $table->string('password');
            $table->string('prenom');
            $table->string('nom');
            $table->string('telephone')->unique();
            $table->string('email')->nullable();
            $table->string('photo')->nullable();
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
        Schema::dropIfExists('clients');
    }
}
