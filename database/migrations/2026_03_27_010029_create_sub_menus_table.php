<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateSubMenusTable extends Migration
{
    public function up()
    {
        Schema::create('sub_menus', function (Blueprint $table) {
            $table->unsignedInteger('id')->primary();
            $table->string('sub_menu_name', 100)->nullable();
            $table->string('sub_menu_url', 100)->nullable();
            $table->integer('main_menu_id')->nullable();
            $table->integer('status')->nullable();
            $table->text('icon')->nullable();
            $table->integer('concern_id')->nullable();
            $table->string('action_ip', 100)->nullable();
            $table->timestamp('created_at')->nullable();
            $table->timestamp('updated_at')->nullable();
            $table->bigInteger('entry_by')->nullable();
            $table->bigInteger('modify_by')->nullable();
        });
    }

    public function down()
    {
        Schema::dropIfExists('sub_menus');
    }
}
