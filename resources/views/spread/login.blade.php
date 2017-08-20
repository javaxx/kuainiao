@extends("layout.main")

@section("content")
    @include('flash::message')
    <div class="col-sm-8 blog-main">

        <form class="form-signin" method="POST" action="/login">
            {{csrf_field()}}
            <h2 class="form-signin-heading">请登录</h2>
            <label for="inputEmail" class=" ">邮箱</label>
            <input type="email" name="email" id="inputEmail" class="form-control" placeholder="Email address" required autofocus>
            <label for="inputPassword" class=" ">密码</label>
            <input type="password" name="password" id="inputPassword" class="form-control" placeholder="Password" required>
            <div >
                <input type="text" name="captcha" class="form-control"  required>
                <img src="/captcha/1" title="点击刷新" width="160" alt="验证码"  onclick="this.src='/captcha/'+Math.random();">
            </div>

            <div class="checkbox">
                <label>
                    <input type="checkbox" value="1" name="is_remember"> 记住我
                </label>
            </div>
            @include('layout.error')
            <button class="btn btn-lg btn-primary btn-block" type="submit">登陆</button>
            <a href="/register" class="btn btn-lg btn-primary btn-block" type="submit">去注册>></a>
        </form>
    </div><!-- /.blog-main -->

@endsection