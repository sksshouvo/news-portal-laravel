<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateAdsTable extends Migration
{
    public function up()
    {
        Schema::create('ads', function (Blueprint $table) {
            $table->increments('id');
            $table->string('ad_title', 100)->nullable();
            $table->string('ad_section', 100)->nullable();
            $table->string('ad_link', 255)->nullable();
            $table->text('ad_code')->nullable();
            $table->string('ad_path', 100)->nullable();
            $table->string('ad_category', 100)->nullable();
            $table->enum('ad_size_type', ['responsive','custom'])->nullable();
            $table->string('ad_size', 100)->nullable();
            $table->string('remember_token', 100)->nullable();
            $table->integer('status')->nullable();
            $table->integer('concern_id')->nullable();
            $table->integer('created_by')->nullable();
            $table->integer('updated_by')->nullable();
            $table->timestamps();
        });
    }

    public function down()
    {
        Schema::dropIfExists('ads');
    }
}
