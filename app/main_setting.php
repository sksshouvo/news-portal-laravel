<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class main_setting extends Model
{
/**
     * The attributes that are mass assignable.
     *
     * @var array
     */
    protected $fillable = [
        'title', 'description','address','phone','header_for_seo', 'keywords', 'support_mail', 'info_mail', ' mail_driver', 'mail_host', 'mail_port', 'mail_username', 'mail_password', 'mail_encryption', 'validity_till', 'group_id'
    ];

    /**
     * The attributes that should be hidden for arrays.
     *
     * @var array
     */
}
