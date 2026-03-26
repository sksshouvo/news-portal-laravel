<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class social_media extends Model
{
    protected $table = 'social_medias';
    /**
     * The attributes that are mass assignable.
     *
     * @var array
     */
    protected $fillable = [
        'site_name', 'site_url', 'site_icon', 'created_by'
    ];

    /**
     * The attributes that should be hidden for arrays.
     *
     * @var array
     */
}
