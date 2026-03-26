<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class tag extends Model
{
    protected $fillable = ['tags', 'post_id'];


    public function news_table()
    {
        return $this->belongsTo('App\news_table', 'post_id', 'id');
    }
    
}
