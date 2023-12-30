<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    /**
     * Run the migrations.
     */
    public function up(): void
    {
        Schema::create('affectations', function (Blueprint $table) {
            $table->id('id_affectation');
            $table->unsignedBigInteger('id_service');
            $table->unsignedBigInteger('id_modele');
            $table->unsignedBigInteger('id_marque');
            $table->unsignedBigInteger('id_vehicule');
            $table->date('date_affectation');
            $table->string('statut');
            $table->foreign('id_service')->references('id_service')->on('services');
            $table->foreign('id_marque')->references('id_marque')->on('marques');
            $table->foreign('id_modele')->references('id_modele')->on('modeles');
            $table->foreign('id_vehicule')->references('id_vehicule')->on('vehicules');
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('affectations');
    }
};
