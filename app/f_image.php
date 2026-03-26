<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class f_image extends Model
{
    protected $fillable = ['post_id', 'image_name', 'image_path', 'image_caption'];
        
}
