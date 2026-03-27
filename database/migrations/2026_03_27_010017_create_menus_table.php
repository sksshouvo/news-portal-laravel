<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateMenusTable extends Migration
{
    public function up()
    {
        Schema::create('menus', function (Blueprint $table) {
            $table->increments('id');
            $table->string('menu_name', 255)->nullable();
            $table->string('menu_url', 255)->nullable();
            $table->integer('status')->nullable();
            $table->timestamps();
            $table->bigInteger('entry_by')->nullable();
            $table->bigInteger('modify_by')->nullable();
            $table->string('remember_token', 1000)->nullable();
            $table->integer('concern_id')->nullable();
            $table->text('icon')->nullable();
        });
    }

    public function down()
    {
        Schema::dropIfExists('menus');
    }
}
