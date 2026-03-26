<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class set_as extends Model
{
    protected $table = "set_as";

    protected $fillable = [
        'set_as', 'news_id', 'created_by'
    ];
}
