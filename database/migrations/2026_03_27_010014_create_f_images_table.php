<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateFImagesTable extends Migration
{
    public function up()
    {
        Schema::create('f_images', function (Blueprint $table) {
            $table->increments('id');
            $table->integer('post_id')->nullable();
            $table->string('image_name', 100)->nullable();
            $table->longText('image_caption')->nullable();
            $table->string('image_path', 100)->nullable();
            $table->string('remember_token', 100)->nullable();
            $table->timestamps();
        });
    }

    public function down()
    {
        Schema::dropIfExists('f_images');
    }
}
