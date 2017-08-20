<?php
/**
 * Created by PhpStorm.
 * User: si
 * Date: 2017/8/18
 * Time: 23:49
 */

namespace App\Server;


use App\User;
use App\UserOpenid;
use App\UserSign;
use Cache;
use EasyWeChat\Support\Log;
use Illuminate\Support\Facades\Storage;

class WechatMessageSever
{

    public static function index($message,$openid,$wxuser){
        Storage::put('wx.txt',$wxuser);

        $message = trim($message);
        $openid = trim($openid);
       $beginStr=  mb_substr($message , 0 , 2);
        $userOpenid= UserOpenid::where('wx_openid', $openid)->first();
        if (Cache::get('sign')){
            sleep(2);

        }
        Cache::put('sign', '1',1);
        switch ($beginStr) {
            case '签到' :


                if (is_null($userOpenid)) {
                    return '你尚未绑定,请回复邮件绑定';
                }else{


                   return UserSignServer::sign($userOpenid->user->id);
                }

                break;
            case '绑定':
                if (is_null($userOpenid)){
                    $email =  mb_substr($message , 3 , strlen($message)-3);
                    $user=User::where('email',$email)->first();
                    if (is_null($user)) {
                        return '你输入的#'.$email.'#不存在,请到网站上注册,如果邮箱格式错误,请注意格式[绑定:你的邮箱]###例如(绑定:kuainiao@xianfei.com)';
                    }
                    if (is_null($user->openid)) {
                        $user->name = $wxuser->nickname;
                        $user->avatar = $wxuser->headimgurl;
                        Log::warning($user);
                        UserOpenid::create([
                            'user_id' => $user->id,
                            'wx_openid' => $openid,
                        ]);
                    }else{
                        if ($user->openid->wx_openid == 0) {
                            $user->openid->wx_openid = $openid;
                            $user->openid->save();
                            $gold = GoldServer::addGold($user->id, 40);
                            return '绑定成功,奖励10金币,现在共计:'.$gold.'个金币';
                        }else{
                        }

                    }
                }
                return '此微信已经绑定了'.$userOpenid->user->email.',请勿重复操作,为了减少服务器的压力,重复操作的将会扣分';




                break;
            default:
                return '你输入的指令不存在,现有指令[签到][绑定:内容][留言:内容]';
                break;
        }
        }
}