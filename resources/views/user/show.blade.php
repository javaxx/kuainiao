@extends("layout.main")

@section("content")

    <div class="col-sm-8 blog-main">
        <blockquote>
            <p><img src="{{$user->avatar}}" alt="" class="img-rounded" style="border-radius:500px; height: 40px"> {{$user->name}}
            </p>


            <footer>关注：{{$user->stars_count}}｜粉丝：{{$user->fans_count}}｜文章：{{$user->posts_count}}</footer>
            @include('user.badges.like', ['target_user' => $user])
        </blockquote>
    </div>
    <div class="col-sm-8 blog-main">
        <div class="nav-tabs-custom">
            <ul class="nav nav-tabs">
                <li class=""><a href="#tab_1" data-toggle="tab" aria-expanded="false">已获取的教程</a></li>
                <li class="active"><a href="#tab_2" data-toggle="tab" aria-expanded="true">金币</a></li>
            </ul>
            <div class="tab-content">
                <div class="tab-pane " id="tab_1">
                    @foreach($posts as $post)
                        <div class="blog-post" style="margin-top: 30px;border: 1px solid darkcyan;padding: 20px">
                            <?php \Carbon\Carbon::setLocale('zh');?>

                                <div class="hero-unit">
                                    <h1>
                                      {{$post->title}}<text style="float: right;margin-left: 20px;font-size: small"> 发表于:{{$post->created_at->diffForHumans()}} </text>
                                    </h1>
                                    <p>{{$post->links}}</p>

                                    <p>

                                        <a class="btn btn-primary btn-large"  href="/posts/{{$post->id}}">参看更多 »</a>
                                    </p>
                                </div>
                                <p  style="font-size: small"></p>
                        </div>



                    @endforeach
                </div>
                <!-- /.tab-pane -->
                <div class="tab-pane active" id="tab_2"style="padding: 20px">

                <h1>你总共金币有{{$user->gold}}个金币,</h1>
                    @if($user->signs))
                    <p>微信公众号连续{{$user->signs->sign_num}}</p>
                        @else
                        <p>关注公众号 快鸟先飞  ,发送文字消息签到,就可以获得更多金币</p>
                        签到步骤 :
                        <ul style="color: #9c3328">
                            <li>扫描 左侧二维码,关注公众号</li>
                            <li>绑定站点登陆邮箱;发送文字消息  [ <text style="color: red">绑定:xxxx@xxx.com </text>]  (请注意格式) </li>
                            <li> 绑定成功后, 回复文字消息 [ <text style="color: red">签到 </text>]</li>
                        </ul>
                    @endif


                    <div  style="background-color: #2c3b41;color: white;padding: 22px">
                        <h2 style="color: red">想要教程,积分却不够?</h2>
                        <p>快速增加金币的途径</p>
                        <ul>
                            <li>网站注册奖励:30金币</li>
                            <li>微信公众号绑定奖励:30金币</li>
                            <li>微信公众号签到奖励:(3+(连续天数)/2)金币</li>
                            <li><ul>
                                    推广注册成功:奖励10金币
                                    <li>  你的推广连接 {{route('spread',$user->id)}}</li>
                                </ul>
                            </li>
                        </ul>

                    </div>

                </div>

            </div>
            <!-- /.tab-content -->
        </div>


    </div><!-- /.blog-main -->


@endsection