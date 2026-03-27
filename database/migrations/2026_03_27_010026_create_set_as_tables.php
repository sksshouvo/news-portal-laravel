<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateSetAsTables extends Migration
{
    public function up()
    {
        Schema::create('set_as', function (Blueprint $table) {
            $table->increments('id');
            $table->string('set_as', 100)->nullable();
            $table->integer('news_id')->nullable();
            $table->integer('created_by')->nullable();
            $table->timestamps();
        });

        Schema::create('set_as_breaking_news', function (Blueprint $table) {
            $table->increments('id');
            $table->string('set_as', 100)->nullable();
            $table->integer('news_id')->nullable();
            $table->integer('created_by')->nullable();
            $table->timestamps();
        });

        Schema::create('set_as_cat', function (Blueprint $table) {
            $table->increments('id');
            $table->integer('news_id')->nullable();
            $table->integer('category_id')->nullable();
            $table->integer('created_by')->nullable();
            $table->timestamps();
        });

        Schema::create('set_as_sub_cat', function (Blueprint $table) {
            $table->increments('id');
            $table->integer('news_id')->nullable();
            $table->integer('category_id')->nullable();
            $table->integer('sub_category_id')->nullable();
            $table->integer('created_by')->nullable();
            $table->timestamps();
        });
    }

    public function down()
    {
        Schema::dropIfExists('set_as_sub_cat');
        Schema::dropIfExists('set_as_cat');
        Schema::dropIfExists('set_as_breaking_news');
        Schema::dropIfExists('set_as');
    }
}
