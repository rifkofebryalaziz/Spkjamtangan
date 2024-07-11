<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateRelativeClosenessTable extends Migration
{
    public function up()
    {
        Schema::create('relative_closeness', function (Blueprint $table) {
            $table->id();
            $table->unsignedBigInteger('alternative_id');
            $table->double('value', 8, 4);
            $table->timestamps();

            $table->foreign('alternative_id')->references('id')->on('alternatives')->onDelete('cascade');
        });
    }

    public function down()
    {
        Schema::dropIfExists('relative_closeness');
    }
};
