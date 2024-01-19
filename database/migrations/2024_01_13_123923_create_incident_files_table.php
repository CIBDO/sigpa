<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateIncidentFilesTable extends Migration
{
    public function up()
    {
        Schema::create('incident_files', function (Blueprint $table) {
            $table->id('id_file');
            $table->unsignedBigInteger('id_incident');
            $table->string('file_path');
            $table->timestamps();

            $table->foreign('id_incident')->references('id_incident')->on('incidents')->onDelete('cascade');
        });
    }

    public function down()
    {
        Schema::dropIfExists('incident_files');
    }
}
