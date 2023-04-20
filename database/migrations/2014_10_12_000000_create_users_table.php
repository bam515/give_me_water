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
            $table->id('user_id');
            $table->string('login_id', 45);
            $table->string('password', 255);
            $table->string('nick_name', 45);
            $table->dateTime('user_birth')->nullable();
            $table->string('user_gender', 45)->nullable();
            $table->string('kakao_id', 45)->nullable();
            $table->string('google_id', 45)->nullable();
            $table->timestamps();
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
