<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreatePortalConcernAndGroupTables extends Migration
{
    public function up()
    {
        Schema::create('portal_concern', function (Blueprint $table) {
            $table->increments('id');
            $table->string('concern_name', 100)->nullable();
            $table->integer('group_id')->nullable();
            $table->integer('status')->nullable();
            $table->integer('created_by')->nullable();
            $table->timestamps();
        });

        Schema::create('portal_group', function (Blueprint $table) {
            $table->increments('id');
            $table->string('group_name', 100)->nullable();
            $table->integer('status')->nullable();
            $table->timestamps();
        });
    }

    public function down()
    {
        Schema::dropIfExists('portal_group');
        Schema::dropIfExists('portal_concern');
    }
}
