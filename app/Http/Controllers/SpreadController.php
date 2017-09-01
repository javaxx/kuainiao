<?php
/**
 * Created by PhpStorm.
 * User: si
 * Date: 2017/8/18
 * Time: 10:46
 */

namespace App\Http\Controllers;


use App\Server\GoldServer;
use App\User;
use Illuminate\Http\Request;
use Cache;
use Illuminate\Routing\Route;
use Mail;
use Auth;

class SpreadController extends Controller
{
    public function index()
    {
        return view('spread.index');
    }
    public function spread($sid)
    {
        if (!$sid) {
            $sid = 0;
        }
        return view('register.index', compact('sid'));

    }
    public function register(Request $request)
    {
        CaptchaController::verifyCaptcha(request('captcha'));


        $this->validate(request(),[
            'name' => 'required|min:3|unique:users,name',
            'email' => 'required|unique:users,email|email',
            'password' => 'required|min:5|confirmed',
        ]);

        $password = bcrypt(request('password'));
        $name = request('name');
        $email = request('email');
        $confirmation_token = str_random(40);
        $promoter_id = request('promoter_id')?request('promoter_id'):0;
        flash('注册成功,请激活您的邮箱,进行登陆');
        $user = \App\User::create(compact('name', 'email', 'password','confirmation_token','promoter_id'));
        $this->sendMail($user);
        return redirect('/login');
    }

    public function sendMail($user)
    {


        Mail::raw('欢迎注册 快鸟先飞,点击链接激活账号.'.route('email.verify',['token'=>$user->confirmation_token]), function ($messages) use($user){
            $messages->from('numbersi@163.com','快鸟');
            $messages->subject('激活 快鸟先飞 账号,领取');
            $messages->to($user->email);
        });


    }

    public function verifyMail($token)
    {
        /**
         * @param $token
         * @return \Illuminate\Http\RedirectResponse|\Illuminate\Routing\Redirector
         */
        $user = User::where(['confirmation_token'=>$token])->first();

        if ( is_null($user) ) {
            flash('邮箱验证失败', 'danger');
            return redirect('/');
        }
        if ($user->is_active) {
            flash('邮箱已经验证,不需要再次验证！', 'info');
            return redirect('/');
        }
        $user->is_active = 1;
        $user->confirmation_token = str_random(40);
        $user->save();


        Auth::login($user);
        flash('邮箱验证成功！请登陆', 'success');

        return redirect('/login');

    }


}