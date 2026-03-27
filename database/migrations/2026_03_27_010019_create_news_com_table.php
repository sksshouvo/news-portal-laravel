<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateNewsComTable extends Migration
{
    public function up()
    {
        Schema::create('news_com', function (Blueprint $table) {
            $table->increments('id');
            $table->integer('post_id')->nullable();
            $table->longText('comments')->nullable();
            $table->string('user_id', 100)->nullable();
            $table->integer('status')->nullable();
            $table->string('remember_token', 100)->nullable();
            $table->integer('group_id')->nullable();
            $table->integer('concern_id')->nullable();
            $table->timestamps();
        });
    }

    public function down()
    {
        Schema::dropIfExists('news_com');
    }
}
