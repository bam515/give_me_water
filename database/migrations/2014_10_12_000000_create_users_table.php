<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateUsersTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('users', function (Blueprint $table) {
            $table->id('user_id')->comment('users.PK');
            $table->string('login_id', 45)->unique()->comment('로그인 아이디');
            $table->string('password', 255)->comment('로그인 비밀번호');
            $table->string('nick_name', 45)->comment('닉네임');
            $table->date('user_birth')->nullable()->comment('생년월일');
            $table->string('user_gender', 45)->nullable()->comment('성별 male | female');
            $table->string('kakao_id', 100)->nullable()->comment('카카오 로그인 ID');
            $table->string('google_id', 100)->nullable()->comment('구글 로그인 ID');
            $table->tinyInteger('status')->default(0)->comment('0: 정상 / 1: 차단');
            $table->dateTime('created_at')->comment('등록일시');
            $table->dateTime('updated_at')->nullable()->comment('수정일시');
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('users');
    }
}
