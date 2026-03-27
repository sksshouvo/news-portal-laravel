<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateNewsSubComTable extends Migration
{
    public function up()
    {
        Schema::create('news_sub_com', function (Blueprint $table) {
            $table->increments('id');
            $table->unsignedInteger('post_id')->nullable();
            $table->unsignedInteger('com_id')->nullable();
            $table->unsignedInteger('user_id')->nullable();
            $table->longText('sub_comments')->nullable();
            $table->integer('status')->nullable();
            $table->unsignedInteger('group_id')->nullable();
            $table->unsignedInteger('concern_id')->nullable();
            $table->string('remeber_token', 100)->nullable();
            $table->timestamps();
        });
    }

    public function down()
    {
        Schema::dropIfExists('news_sub_com');
    }
}
