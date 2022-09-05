<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateEtudiantsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('etudiants', function (Blueprint $table) {
            $table->id();
            $table->string('nom')->nullable();
            $table->string('prenom')->nullable();
            $table->string('matricule')->nullable();
            $table->string('date_naissance')->nullable();
            $table->string('adresse')->nullable();
            $table->string('nationalite')->nullable();
            $table->string('sexe')->nullable();
            $table->string('classe')->nullable();
            $table->string('pere')->nullable();
            $table->string('mere')->nullable();
            $table->string('contact1')->nullable();
            $table->string('contact2')->nullable();
            $table->string('annee_scolaire')->nullable();
            $table->string('reduction')->nullable();
            $table->string('maladie')->nullable();
            $table->string('photo')->nullable();
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
        Schema::dropIfExists('etudiants');
    }
}
