@extends("layout.main")

@section("content")
    @include('flash::message')
    <div class="col-sm-8 blog-main">

            <form class="form-signin" method="POST" action="/spread/register">
                {{csrf_field()}}
                <h2 class="form-signin-heading">请注册</h2>
                <label for="name" class="">名字</label>
                <input type="text" name="name" id="name" class="form-control" placeholder="名字" required autofocus>
                <label for="inputEmail" >邮箱</label>
                <input type="email" name="email" id="inputEmail" class="form-control" placeholder="邮箱" required autofocus>
                <label for="inputPassword" class="">密码</label>
                <input type="password" name="password" id="inputPassword" class="form-control" placeholder="输入密码" required>
                <label  for="password_confirmation"  >重复密码</label>
                <input type="password" name="password_confirmation" class="form-control" placeholder="重复输入密码" required>
                <label  for="captcha"  >验证码</label>
                <div >
                    <input type="text" name="captcha" class="form-control"  required>
                    <img src="/captcha/1" title="点击刷新" width="160" alt="验证码"  onclick="this.src='/captcha/'+Math.random();">
                </div>



            @if(isset($sid)){
                        <label  for="promoter_id"  >推荐人ID</label>
                        <input type="" name="promoter_id" class="form-control " readonly  value="{{$sid}}"  required>
                @endif
                @include('layout.error')
                <br/>
                <button class="btn btn-lg btn-primary btn-block" type="submit">注册</button>
            </form>
    </div><!-- /.blog-main -->

@endsection