<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class set_as_cat extends Model
{
    protected $table = "set_as_cat";

    protected $fillable = ['news_id', 'category_id','created_by'];
}
