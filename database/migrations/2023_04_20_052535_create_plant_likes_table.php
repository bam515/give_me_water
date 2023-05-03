<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreatePlantLikesTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('plant_likes', function (Blueprint $table) {
            $table->id('like_id');
            $table->foreignId('plant_id');
            $table->foreignId('user_id');
            $table->timestamps();

            $table->foreign('plant_id')->references('plant_id')->on('plants');
            $table->foreign('user_id')->references('user_id')->on('users');
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('plant_likes');
    }
}
