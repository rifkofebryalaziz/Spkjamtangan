<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateNormalizedMatrixTable extends Migration
{
    public function up()
    {
        Schema::create('normalized_matrix', function (Blueprint $table) {
            $table->id();
            $table->unsignedBigInteger('alternative_id');
            $table->unsignedBigInteger('criterion_id');
            $table->double('value', 8, 4); // Adjust precision as needed
            $table->timestamps();

            $table->foreign('alternative_id')->references('id')->on('alternatives')->onDelete('cascade');
            $table->foreign('criterion_id')->references('id')->on('criteria')->onDelete('cascade');
        });
    }

    public function down()
    {
        Schema::dropIfExists('normalized_matrix');
    }
};
