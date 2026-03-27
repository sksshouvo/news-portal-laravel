<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateCategoriesTableLaravel extends Migration
{
    public function up()
    {
        Schema::create('categories', function (Blueprint $table) {
            $table->increments('id');
            $table->string('category', 100)->nullable();
            $table->string('category_eng', 100)->nullable();
            $table->string('category_description', 1000)->nullable();
            $table->string('category_icon', 100)->nullable();
            $table->string('remember_token', 100)->nullable();
            $table->integer('created_by')->nullable();
            $table->integer('updated_by')->nullable();
            $table->string('action_ip', 100)->nullable();
            $table->integer('concern_id')->nullable();
            $table->timestamps();
            $table->integer('status')->nullable();
        });
    }

    public function down()
    {
        Schema::dropIfExists('categories');
    }
}
