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
        Schema::create('bons', function (Blueprint $table) {
            $table->id('id_bon');
            $table->unsignedBigInteger('id_vehicule');
            $table->string('numero_bon');
            $table->date('date_delivrance');
            $table->integer('quantite');
            $table->integer('valeur_espece');
            $table->foreign('id_vehicule')->references('id_vehicule')->on('vehicules');
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('bons');
    }
};
