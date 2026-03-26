<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class set_as_sub_cat extends Model
{
    protected $table = "set_as_sub_cat";

    protected $fillable = ['news_id', 'category_id','sub_category_id','created_by'];

}
