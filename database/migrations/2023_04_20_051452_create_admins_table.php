<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateAdminsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('admins', function (Blueprint $table) {
            $table->id('admin_id')->comment('admins.PK');
            $table->string('login_id', 45)->unique()->comment('관리자 로그인 ID');
            $table->string('password', 255)->comment('관리자 로그인 비밀번호');
            $table->string('admin_name', 45)->comment('관리자 이름');
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
        Schema::dropIfExists('admins');
    }
}
