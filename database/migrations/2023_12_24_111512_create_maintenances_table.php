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
        Schema::create('maintenances', function (Blueprint $table) {
            $table->id('id_maintenance');
            $table->unsignedBigInteger('id_vehicule');
            $table->unsignedBigInteger('id_prestataire');
            $table->unsignedBigInteger('id_type_maintenance');
            $table->string('numero_facture');
            $table->integer('cout');
            $table->date('date_debut');
            $table->date('date_fin');
            $table->text('travaux');
            $table->string('statut');
            $table->foreign('id_type_maintenance')->references('id_type_maintenance')->on('type_maintenances');
            $table->foreign('id_vehicule')->references('id_vehicule')->on('vehicules');
            $table->foreign('id_prestataire')->references('id_prestataire')->on('prestataires');
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('maintenances');
    }
};
