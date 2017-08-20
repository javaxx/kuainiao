<div class="navbar navbar-inverse navbar-fixed-top" role="navigation" id="menu-nav">
    <div class="container">
        <div class="navbar-header">
            <button type="button" class="navbar-toggle" data-toggle="collapse" data-target=".navbar-collapse">
                <span class="sr-only">切换导航</span>
                <span class="icon-bar"></span>
                <span class="icon-bar"></span>
                <span class="icon-bar"></span>
            </button>
            <a class="navbar-brand" href="#">快鳥先飛</a>
        </div>
        <div class="navbar-collapse collapse">
            <ul class="nav navbar-nav">
                <ul class="nav navbar-nav navbar-left">
                    <li>
                        <a class=" " href="/posts">首页</a>
                    </li>
                    <li>
                        <a class="blog-nav-item" href="/posts/create">写文章</a>
                    </li>
                    <li>
                        <a class="blog-nav-item" href="/notices">通知</a>
                    </li>
                    {{--            <li>
                                    <input name="query" type="text" value="@if(!empty($query)){{$query}}@endif" class="form-control" style="margin-top:10px" placeholder="搜索词">
                                </li>
                                <li>
                                    <button class="btn btn-default" style="margin-top:10px" type="submit">Go!</button>
                                </li>、--}}
                </ul>


                {{--<li><a href="#summary-container">简述</a></li>
                <li class="dropdown">
                    <a href="#" class="dropdown-toggle" data-toggle="dropdown">特点 <span class="caret"></span></a>
                    <ul class="dropdown-menu" role="menu">
                        <li><a href="#feature-tab" data-tab="tab-chrome">Chrome</a></li>
                        <li><a href="#feature-tab" data-tab="tab-firefox">Firefox</a></li>
                        <li><a href="#feature-tab" data-tab="tab-safari">Safari</a></li>
                        <li><a href="#feature-tab" data-tab="tab-opera">Opera</a></li>
                        <li><a href="#feature-tab" data-tab="tab-ie">IE</a></li>
                    </ul>
                </li>--}}
            </ul>

            <ul class="nav navbar-nav navbar-right">
                <li class="dropdown">
                    <div>
                        @if($user)
                            <img src="{{$user->avatar}}" alt="" class="img-rounded" style="border-radius:500px; height: 30px">
                            <a href="#" class="blog-nav-item dropdown-toggle" data-toggle="dropdown" role="button" aria-haspopup="true" aria-expanded="false">{{$user->name}}  <span class="caret"></span></a>
                            <ul class="dropdown-menu">
                                <li><a href="/me">我的主页</a></li>
                                {{--
                                                        <li><a href="/user/{{$user->id}}/setting">个人设置</a></li>
                                --}}
                                <li><a href="/logout">登出</a></li>
                            </ul>
                            <ul class="nav navbar-nav navbar-right">

                                @else
                                    <li>
                                        <a class="blog-nav-item " href="/login">登陆</a>
                                    </li>
                                    <li>
                                        <a class="blog-nav-item " href="/register">注册</a>
                                    </li>
                                @endif
                                    <li><a href="#" data-toggle="modal" data-target="#about-modal">推广获得积分</a></li>

                            </ul>

                    </div>
                </li>
            </ul>
        </div>
    </div>
</div>
