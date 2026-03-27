<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateUsersTable extends Migration
{
    public function up()
    {
        Schema::create('users', function (Blueprint $table) {
            $table->increments('id');
            $table->string('name')->nullable();
            $table->string('email')->nullable();
            $table->timestamp('email_verified_at')->nullable();
            $table->string('password')->nullable();
            $table->string('mobile', 100)->nullable();
            $table->string('country_id', 100)->nullable();
            $table->integer('desg_id')->nullable();
            $table->enum('permission', ['menu','desg'])->nullable();
            $table->string('remember_token')->nullable();
            $table->integer('group_id')->nullable();
            $table->integer('concern_id')->nullable();
            $table->integer('created_by')->nullable();
            $table->integer('updated_by')->nullable();
            $table->timestamps();
            $table->integer('status')->default(0);
        });
    }

    public function down()
    {
        Schema::dropIfExists('users');
    }
}
