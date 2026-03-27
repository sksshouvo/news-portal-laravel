<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateSocialMediasTable extends Migration
{
    public function up()
    {
        Schema::create('social_medias', function (Blueprint $table) {
            $table->increments('id');
            $table->string('site_name', 100)->nullable();
            $table->string('site_url', 255)->nullable();
            $table->string('site_icon', 100)->nullable();
            $table->string('remember_token', 100)->nullable();
            $table->integer('group_id')->nullable();
            $table->integer('created_by')->nullable();
            $table->timestamps();
        });
    }

    public function down()
    {
        Schema::dropIfExists('social_medias');
    }
}
