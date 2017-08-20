<?php

namespace App\Http\Controllers;

use App\User;
use Illuminate\Http\Request;
use Auth;

class LoginController extends Controller
{
    public function index()
    {
        if(\Auth::check()) {
            return redirect("/posts");
        }

        return view("spread.login");
    }

    public function login(Request $request)
    {
        CaptchaController::verifyCaptcha(request('captcha'));

        $this->validate($request, [
            'email' => 'required|email',
            'password' => 'required|min:6|max:30',
            'is_remember' => '',
        ]);

        $user = request(['email', 'password']);
        $remember = boolval(request('is_remember'));
        if (true == Auth::attempt(array_merge($user), $remember)) {

            if (Auth::user()->is_active == 0) {
                Auth::logout();
                flash('邮箱未激活!请先激活')->warning();
                return back();
            }
            flash('欢迎登陆!')->success();

            return redirect('/posts');
        }
        flash('用户名或密码错误')->warning();

        return \Redirect::back();
    }

    public function logout()
    {
        \Auth::logout();
        return redirect('/login');
    }
}
