<?php
/**
 * Created by PhpStorm.
 * User: si
 * Date: 2017/8/18
 * Time: 17:00
 */

namespace  App\Server;


use App\User;

class GoldServer
{

    public static function addGold($user_id,$gold)
    {
        $user = User::where('id', $user_id)->first();
        $user->gold +=$gold;
        $user->save();

        return $user->gold;
    }
}