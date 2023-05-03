<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateNoticeLikesTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('notice_likes', function (Blueprint $table) {
            $table->id('like_id');
            $table->foreignId('user_id');
            $table->foreignId('notice_id');
            $table->timestamp('created_at');

            $table->foreign('user_id')->references('user_id')->on('users');
            $table->foreign('notice_id')->references('notice_id')->on('notices');
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('notice_likes');
    }
}
