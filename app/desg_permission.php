<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class desg_permission extends Model
{
    protected $fillable = [
        'desg_id', 'main_menu_id', 'sub_menu_id', 'created_by', 'concern_id','updated_at'
    ];
}
