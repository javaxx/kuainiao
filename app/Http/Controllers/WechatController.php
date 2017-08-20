<?php
/**
 * Created by PhpStorm.
 * User: si
 * Date: 2017/8/18
 * Time: 23:27
 */

namespace App\Http\Controllers;


use App\Server\WechatMessageSever;
use EasyWeChat\Support\Log;
use Illuminate\Http\Request;
use Illuminate\Mail\Message;

class WechatController extends  Controller
{

    public function wechat(Request $request)
    {
        Log::info('request arrived.'); # 注意：Log 为 Laravel 组件，所以它记的日志去 Laravel 日志看，而不是 EasyWeChat 日志

        $wechat = app('wechat');
        $wmServer = new WechatMessageSever();

        $wechat->server->setMessageHandler(function($message) use ($wmServer){

            switch ($message->MsgType) {
                case 'event':
                    switch ($message->Event) {
                        case 'subscribe':
                            return '欢迎订阅 快鸟先飞';
                            break;
                        default:
                            # code...
                            break;
                    }
                    break;
                case 'text':
                    return $wmServer->index($message->Content,$message->FromUserName);
                //    return $message->Content.$message->FromUserName;
                    break;
                case 'image':
                    return '收到图片消息';
                    break;
                case 'voice':
                    return '收到语音消息';
                    break;
                case 'video':
                    return '收到视频消息';
                    break;
                case 'location':
                    return '收到坐标消息';
                    break;
                case 'link':
                    return '收到链接消息';
                    break;
                // ... 其它消息
                default:
                    return '收到其它消息';
                    break;
            }

        });

        Log::info('return response.');

        return $wechat->server->serve();
    }
}