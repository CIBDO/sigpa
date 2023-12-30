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
        Schema::create('incidents', function (Blueprint $table) {
            $table->id('id_incident');
            $table->unsignedBigInteger('id_vehicule');
            $table->date('date_incident');
            $table->string('causes');
            $table->string('gravite');
            $table->text('degat');
            $table->text('description');
            $table->string('fichiers');
            $table->foreign('id_vehicule')->references('id_vehicule')->on('vehicules');
            $table->timestamps();
        });
       
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('incidents');
    }
};
