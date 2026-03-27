<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateNewsTable extends Migration
{
    public function up()
    {
        Schema::create('news_table', function (Blueprint $table) {
            $table->increments('id');
            $table->string('post_title_eng', 255)->nullable();
            $table->longText('post_content_eng')->nullable();
            $table->integer('post_type')->nullable();
            $table->integer('post_status')->nullable();
            $table->integer('comment_status')->nullable();
            $table->string('post_url_eng', 255)->nullable();
            $table->string('post_title_bng', 255)->nullable();
            $table->longText('post_content_bng')->nullable();
            $table->string('post_url_bng', 255)->nullable();
            $table->string('news_by', 100)->nullable();
            $table->string('remember_token', 100)->nullable();
            $table->integer('concern_id')->nullable();
            $table->longText('meta_description_bng')->nullable();
            $table->longText('meta_description_eng')->nullable();
            $table->integer('limit_description_bng')->nullable();
            $table->integer('limit_description_eng')->nullable();
            $table->text('sub_title_eng')->nullable();
            $table->text('sub_title_bng')->nullable();
            $table->enum('sub_title_bng_position', ['top_of_title_bng','bottom_of_title_bng'])->nullable();
            $table->enum('sub_title_eng_position', ['top_of_title_eng','bottom_of_title_eng'])->nullable();
            $table->integer('entry_by')->nullable();
            $table->integer('updated_by')->nullable();
            $table->timestamps();
        });
    }

    public function down()
    {
        Schema::dropIfExists('news_table');
    }
}
