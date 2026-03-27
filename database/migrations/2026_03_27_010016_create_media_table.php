<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateMediaTable extends Migration
{
    public function up()
    {
        Schema::create('media', function (Blueprint $table) {
            $table->increments('id');
            $table->string('file_name', 100)->nullable();
            $table->string('file_path', 100)->nullable();
            $table->string('file_type', 100)->nullable();
            $table->string('remember_token', 100)->nullable();
            $table->integer('group_id')->nullable();
            $table->integer('concern_id')->nullable();
            $table->timestamps();
        });
    }

    public function down()
    {
        Schema::dropIfExists('media');
    }
}
