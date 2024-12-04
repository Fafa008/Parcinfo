<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class MaterielMigraion extends Migration
{
    public function up()
    {
        Schema::create('materiels', function (Blueprint $table) {
            $table->id();
            $table->string('nom_Mat');
            $table->string('serial_number');
            $table->longText('description');
            $table->string('garentie');
            $table->string('statue');
            $table->date('date_integration');
            $table->unsignedBigInteger('user_id')->nullable();
            $table->unsignedBigInteger('departement_id')->nullable();
            $table->unsignedBigInteger('logiciel_id')->nullable();
            $table->timestamps();

            $table->foreign('user_id')->references('id')->on('users')->onDelete('set null');
            $table->foreign('departement_id')->references('id')->on('departements')->onDelete('set null');
            $table->foreign('logiciel_id')->references('id')->on('logiciels')->onDelete('set null');
        });
    }

    public function down()
    {
        Schema::dropIfExists('materiels');
    }
}
