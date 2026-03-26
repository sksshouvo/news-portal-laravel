<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class sub_category extends Model
{
    /**
     * The attributes that are mass assignable.
     *
     * @var array
     */
    protected $fillable = [
        'sub_category','sub_category_eng', 'category_id','sub_category_description', 'sub_category_icon', 'created_by', 'updated_by', 'action_ip', 'concern_id', 'created_at', 'updated_at', 'status'
    ];

    /**
     * The attributes that should be hidden for arrays.
     *
     * @var array
     */
    public function categories()
    {
        return $this->belongsTo('App\category');
    }
   
}
