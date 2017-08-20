<?php
/**
 * Created by PhpStorm.
 * User: si
 * Date: 2017/8/20
 * Time: 15:24
 */

namespace App\Http\Controllers;


use Gregwar\Captcha\CaptchaBuilder;
use Illuminate\Support\Facades\Redirect;
use Session;
class CaptchaController extends Controller
{
    public function getCaptcha()
    {

        //生成验证码图片的Builder对象，配置相应属性
        $builder = new CaptchaBuilder;
//可以设置图片宽高及字体
        $builder->build($width = 160, $height = 50, $font = null );
//获取验证码的内容
        $phrase = $builder->getPhrase();
// var_dump($phrase);
//把内容存入session
        Session::flash('Kuainiao_captcha', $phrase);
//生成图片
        header("Cache-Control: no-cache, must-revalidate");
        header('Content-Type: image/jpeg');
        $builder->output();

        }

    public static function verifyCaptcha( $captcha)
    {
        if (session('Kuainiao_captcha') !== $captcha) {
            flash('验证码错误')->warning();
            return Redirect::back();
        }
    }
}