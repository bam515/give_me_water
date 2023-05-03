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
            $table->id('image_id');
            $table->foreignId('plant_id');
            $table->string('file_path', 255);
            $table->string('file_name', 255);
            $table->timestamps();

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
