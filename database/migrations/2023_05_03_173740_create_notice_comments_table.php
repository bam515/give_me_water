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
            $table->id('comment_id')->comment('notice_comments.PK');
            $table->foreignId('notice_id')->comment('공지사항 ID');
            $table->foreignId('user_id')->comment('댓글 등록 유저 ID');
            $table->string('comment', 255)->comment('댓글');
            $table->dateTime('created_at')->comment('등록일시');
            $table->dateTime('updated_at')->nullable()->comment('수정일시');

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
