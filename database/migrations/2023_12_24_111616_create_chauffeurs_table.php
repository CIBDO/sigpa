<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    /**
     * Run the migrations.
     */
    public function up(): void
    {
        Schema::create('chauffeurs', function (Blueprint $table) {
            $table->id('id_chauffeur');
            $table->string('matricule');
            $table->string('nom');
            $table->string('prenom');
            $table->date('date_naiss');
            $table->string('genre');
            $table->string('email');
            $table->string('telephone');
            $table->string('numero_permis');
            $table->string('categorie_permis');
            $table->date('validite_permis');
            $table->unsignedBigInteger('id_service');
            $table->foreign('id_service')->references('id_service')->on('services');
            $table->timestamps();
        });
        
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('chauffeurs');
    }
};
