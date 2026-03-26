<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class news_table extends Model
{
    protected $table = 'news_table';
    protected $fillable = ['news_by','post_title_eng','post_content_eng','post_type','post_status','comment_status','post_url_eng','post_title_bng','post_content_bng','post_url_bng','entry_by','updated_by','created_at','updated_at','meta_description_bng','meta_description_eng','limit_description_bng', 'limit_description_eng', 'sub_title_eng','sub_title_bng', 'sub_title_bng_position', 'sub_title_eng_position'];


public function new_user()
{
    return $this->hasOne('App\user', 'id', 'entry_by');
}

public function news_tags(){

    return $this->hasMany(tag::class, 'post_id', 'id');
}



}
