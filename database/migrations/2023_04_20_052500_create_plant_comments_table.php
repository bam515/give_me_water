<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreatePlantCommentsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('plant_comments', function (Blueprint $table) {
            $table->id('comment_id')->comment('plant_comments.PK');
            $table->foreignId('plant_id')->comment('화초 ID');
            $table->foreignId('user_id')->comment('화초 등록 유저 ID');
            $table->string('comment', 255)->comment('댓글');
            $table->dateTime('created_at')->comment('등록일시');
            $table->dateTime('updated_at')->nullable()->comment('수정일시');

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
        Schema::dropIfExists('plant_comments');
    }
}
