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
        Schema::create('vehicules', function (Blueprint $table) {
            $table->id('id_vehicule');
            $table->string('immatriculation')->nullable();
            $table->date('date_immatriculation')->nullable();
            $table->string('etat_vehicule')->nullable();
            $table->string('numero_chasis')->nullable();
            $table->date('date_circulation')->nullable();
            $table->string('utilite')->nullable();
            $table->string('statut')->nullable();
            $table->unsignedBigInteger('id_modele')->nullable();
            $table->unsignedBigInteger('id_marque')->nullable();
            $table->string('energie')->nullable();
            $table->date('date_acquisition')->nullable();
            
            $table->foreign('id_modele')->references('id_modele')->on('modeles');
            $table->foreign('id_marque')->references('id_marque')->on('marques');
            $table->timestamps();
        });
        DB::table('vehicules')->insert([
            ['utilite' => 'Service'],
            ['utilite' => 'Mission'],
            ['utilite' => 'Liaison'],
        ]);

        DB::table('vehicules')->insert([
            ['energie' => 'Essence'],
            ['energie' => 'Diesel'],
        ]);

        DB::table('vehicules')->insert([
            ['etat_vehicule' => 'Neuf'],
            ['etat_vehicule' => 'Très Bon'],
            ['etat_vehicule' => 'Bon'],
            ['etat_vehicule' => 'Assez Bon'],
            ['etat_vehicule' => 'Pas Bon'],
        ]);
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('vehicules');
    }
};
