<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateSubCategoriesTable extends Migration
{
    public function up()
    {
        Schema::create('sub_categories', function (Blueprint $table) {
            $table->increments('id');
            $table->string('sub_category', 100)->nullable();
            $table->string('sub_category_eng', 100)->nullable();
            $table->string('sub_category_description', 1000)->nullable();
            $table->integer('category_id')->nullable();
            $table->string('sub_category_icon', 100)->nullable();
            $table->string('remember_token', 100)->nullable();
            $table->integer('concern_id')->nullable();
            $table->string('action_ip', 100)->nullable();
            $table->integer('status')->nullable();
            $table->timestamps();
            $table->integer('created_by')->nullable();
            $table->integer('updated_by')->nullable();
        });
    }

    public function down()
    {
        Schema::dropIfExists('sub_categories');
    }
}
