<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateNoticeCommentsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('notice_comments', function (Blueprint $table) {
            $table->id('comment_id');
            $table->foreignId('notice_id');
            $table->foreignId('user_id');
            $table->string('comment', 255);
            $table->timestamps();

            $table->foreign('notice_id')->references('notice_id')->on('notices');
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
        Schema::dropIfExists('notice_comments');
    }
}
