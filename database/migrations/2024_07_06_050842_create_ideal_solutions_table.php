<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateIdealSolutionsTable extends Migration
{
    public function up()
    {
        Schema::create('ideal_solutions', function (Blueprint $table) {
            $table->id();
            $table->unsignedBigInteger('criterion_id');
            $table->double('ideal_positive', 8, 4);
            $table->double('ideal_negative', 8, 4);
            $table->timestamps();

            $table->foreign('criterion_id')->references('id')->on('criteria')->onDelete('cascade');
        });
    }

    public function down()
    {
        Schema::dropIfExists('ideal_solutions');
    }
};
