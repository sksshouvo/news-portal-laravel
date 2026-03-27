<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateMainSettingsTable extends Migration
{
    public function up()
    {
        Schema::create('main_settings', function (Blueprint $table) {
            $table->increments('id');
            $table->string('title', 100)->nullable();
            $table->longText('description')->nullable();
            $table->string('support_mail', 100)->nullable();
            $table->string('info_mail', 100)->nullable();
            $table->string('address', 255)->nullable();
            $table->longText('header_for_seo')->nullable();
            $table->string('phone', 100)->nullable();
            $table->longText('keywords')->nullable();
            $table->string('mail_driver', 100)->nullable();
            $table->string('mail_host', 100)->nullable();
            $table->string('mail_port', 100)->nullable();
            $table->string('mail_username', 100)->nullable();
            $table->string('mail_password', 100)->nullable();
            $table->string('mail_encryption', 100)->nullable();
            $table->string('validity_till', 100)->nullable();
            $table->string('remember_token', 100)->nullable();
            $table->integer('group_id')->nullable();
            $table->timestamps();
        });
    }

    public function down()
    {
        Schema::dropIfExists('main_settings');
    }
}
