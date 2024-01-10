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
        Schema::create('assurances', function (Blueprint $table) {
            $table->id('id_assurance');
            $table->string('nom_assurance')->nullable();
            $table->string('type_assurance');
            $table->unsignedBigInteger('id_vehicule');
            $table->date('date_debut');
            $table->date('date_fin');
            $table->string('statut');
            $table->integer('jours_restant');
            $table->foreign('id_vehicule')->references('id_vehicule')->on('vehicules');
            $table->timestamps();
        });
        
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('assurances');
    }
};
