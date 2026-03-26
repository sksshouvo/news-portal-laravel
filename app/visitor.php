<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class visitor extends Model
{
    protected $fillable = ['ip_address', 'visit_count', 'news_id'];
}
