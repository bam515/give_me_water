<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreatePlantsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('plants', function (Blueprint $table) {
            $table->id('plant_id')->comment('plants.PK');
            $table->foreignId('user_id')->comment('등록자 id');
            $table->string('plant_name', 45)->comment('화초 이름');
            $table->string('water_cycle', 255)->comment('물 주기 정보');
            $table->dateTime('created_at')->comment('등록일시');
            $table->dateTime('updated_at')->nullable()->comment('수정일시');

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
        Schema::dropIfExists('plants');
    }
}
