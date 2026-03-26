<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class sub_menu extends Model
{
    /**
     * The attributes that are mass assignable.
     *
     * @var array
     */
    protected $fillable = [
        'sub_menu_name', 'sub_menu_url','main_menu_id', 'status', 'entry_by', 'modify_by', 'action_ip', 'concern_id', 'created_at', 'updated_at', 'icon'
    ];

    /**
     * The attributes that should be hidden for arrays.
     *
     * @var array
     */
    public function menus()
    {
        return $this->belongsTo('App\menus');
    }
}
