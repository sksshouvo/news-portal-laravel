<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class ad extends Model
{
    /**
     * The attributes that are mass assignable.
     *
     * @var array
     */
    protected $fillable = [
        'ad_title','ad_section','ad_link','ad_code','ad_path','ad_category','ad_size_type','ad_size','remember_token','status','concern_id','created_by','updated_by','created_at','updated_at'

    ];

    /**
     * The attributes that should be hidden for arrays.
     *
     * @var array
     */
}
