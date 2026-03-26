<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class user_permission extends Model
{
    protected $fillable = [
        'user_id', 'main_menu_id', 'sub_menu_id', 'created_by', 'concern_id','updated_at'
    ];

    public function user_info(){
        return $this->hasMany('App\user', 'id');
    }
}
