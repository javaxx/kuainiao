<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class UserSign extends Model
{
    //
    protected $table = 'user_sign';

    protected $fillable = ['user_id', 'sign_num',];
}
