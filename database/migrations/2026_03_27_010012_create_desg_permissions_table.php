<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateDesgPermissionsTable extends Migration
{
    public function up()
    {
        Schema::create('desg_permissions', function (Blueprint $table) {
            $table->increments('id');
            $table->integer('main_menu_id')->nullable();
            $table->integer('sub_menu_id')->nullable();
            $table->integer('desg_id')->nullable();
            $table->string('remember_token', 100)->nullable();
            $table->integer('created_by')->nullable();
            $table->integer('updated_by')->nullable();
            $table->timestamp('created_at')->useCurrent();
            $table->timestamp('updated_at')->nullable();
            $table->integer('concern_id')->nullable();
        });
    }

    public function down()
    {
        Schema::dropIfExists('desg_permissions');
    }
}
