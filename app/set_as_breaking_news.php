<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class set_as_breaking_news extends Model
{
    protected $table = "set_as_breaking_news";

    protected $fillable = [
        'set_as', 'news_id', 'created_by'
    ];
}
