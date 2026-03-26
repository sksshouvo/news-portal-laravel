<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class category extends Model
{
  /**
     * The attributes that are mass assignable.
     *
     * @var array
     */
    protected $fillable = [
        'category','category_eng', 'category_description', 'category_icon', 'created_by', 'updated_by', 'action_ip', 'concern_id', 'created_at', 'updated_at', 'status'
    ];

    /**
     * The attributes that should be hidden for arrays.
     *
     * @var array
     */

    public function sub_categories()
    {
        return $this->hasMany('App\sub_category');
    }
}
