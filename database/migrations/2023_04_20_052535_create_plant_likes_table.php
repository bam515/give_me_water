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
            $table->id('like_id')->comment('plant_likes.PK');
            $table->foreignId('plant_id')->comment('화초 ID');
            $table->foreignId('user_id')->comment('좋아요 등록 ID');
            $table->dateTime('created_at')->comment('등록일시');

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
