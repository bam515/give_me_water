<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreatePlantImagesTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('plant_images', function (Blueprint $table) {
            $table->id('image_id')->comment('plant_images.PK');
            $table->foreignId('plant_id')->comment('화초 ID');
            $table->string('file_path', 255)->comment('파일 경로');
            $table->string('file_name', 255)->comment('파일 이름');
            $table->dateTime('created_at')->comment('등록일시');
            $table->dateTime('updated_at')->nullable()->comment('수정일시');

            $table->foreign('plant_id')->references('plant_id')->on('plants');
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('plant_images');
    }
}
