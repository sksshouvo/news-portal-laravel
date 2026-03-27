<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateNewsCategoryNSubCategoriesTable extends Migration
{
    public function up()
    {
        Schema::create('news_category_n_sub_categories', function (Blueprint $table) {
            $table->increments('id');
            $table->integer('news_id')->nullable();
            $table->integer('category_id')->nullable();
            $table->integer('sub_category_id')->nullable();
            $table->timestamps();
        });
    }

    public function down()
    {
        Schema::dropIfExists('news_category_n_sub_categories');
    }
}
