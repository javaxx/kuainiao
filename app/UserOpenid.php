<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class UserOpenid extends Model
{
    //
    protected $table = 'user_openid';
    protected $fillable = ['user_id', 'wx_openid', 'xcx_openid',
    ];

    public function user()
    {
        return $this->belongsTo(\App\User::class);

    }
}
