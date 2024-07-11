<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateSeparationMeasuresTable extends Migration
{
    public function up()
    {
        Schema::create('separation_measures', function (Blueprint $table) {
            $table->id();
            $table->unsignedBigInteger('alternative_id');
            $table->double('separation_positive', 8, 4);
            $table->double('separation_negative', 8, 4);
            $table->timestamps();

            $table->foreign('alternative_id')->references('id')->on('alternatives')->onDelete('cascade');
        });
    }

    public function down()
    {
        Schema::dropIfExists('separation_measures');
    }
};
