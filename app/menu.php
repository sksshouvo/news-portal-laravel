<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class menu extends Model
{
     /**
     * The attributes that are mass assignable.
     *
     * @var array
     */
    protected $fillable = [
        'menu_name', 'menu_url', 'status', 'concern_id', 'entry_by', 'modify_by', 'icon'
    ];

    /**
     * The attributes that should be hidden for arrays.
     *
     * @var array
     */

    public function sub_menu()
    {
        return $this->hasMany('App\sub_menu', 'main_menu_id');
    }
}
