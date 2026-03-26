<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class concern extends Model
{
protected $table = "portal_concern";

    /**
     * The attributes that are mass assignable.
     *
     * @var array
     */
    protected $fillable = [
        'concern_name'
    ];

    /**
     * The attributes that should be hidden for arrays.
     *
     * @var array
     */
}
