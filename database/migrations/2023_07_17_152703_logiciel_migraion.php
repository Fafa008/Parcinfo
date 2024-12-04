<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class LogicielMigraion extends Migration
{
    public function up()
    {
        Schema::create('logiciels', function (Blueprint $table) {
            $table->id();
            $table->string('nom_logiciel');
            $table->string('version');
            $table->longText('description');
            $table->date('date_achat');
            $table->timestamps();
        });
    }

    public function down()
    {
        Schema::dropIfExists('logiciels');
    }
}
