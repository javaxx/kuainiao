
@extends("layout.main")

@section("content")

    <div class="col-lg-8">
        <div class="blog-post">
            <div style="display:inline-flex">
                    <h2 class="blog-post-title">{{$post->title}}</h2>
                   @if(\Auth::check())
                    @if (Auth::user()->can('update', $post))
                        <a style="margin: auto"  href="/posts/{{$post->id}}/edit">
                            <span class="glyphicon glyphicon-pencil" aria-hidden="true"></span>
                        </a>
                    @endif
                    @if (Auth::user()->can('update', $post))
                        <a style="margin: auto"  href="/posts/{{$post->id}}/delete">
                            <span class="glyphicon glyphicon-remove" aria-hidden="true"></span>
                        </a>
                    @endif
                @endif
            </div>
            <p class="blog-post-meta">{{$post->created_at->toFormattedDateString()}} by  <a href="">{{$post->user->name}}</a></p>
            <div style="margin-top: 20px">


                @if(($post->user == \Auth::user())||(\Auth::user()&&$post->isBuy(\Auth::user())))
                    <p class="bg-aqua" style="    color: #3c763d;
    background-color: #dff0d8;
    border-color: #d6e9c6;padding: 25px">{{$post->links}}</p>
                @else
                    <p>  <a href="/posts/{{$post->id}}/get" type="button" class="btn  btn-lg btn-danger">获取</a> 所需金币  : {{$post->gold}}</p>
                @endif

                @include("layout.error")

            </div>
            <p  style="margin-top: 40px">{!! $post->content !!}</p>
            <div class="" style="margin-top: 100px">
                @if($post->zan(\Auth::id())->exists())
                    <a href="/posts/{{$post->id}}/unzan" type="button" class="btn btn-default btn-lg">取消赞</a>
                @else
                    <a href="/posts/{{$post->id}}/zan" type="button" class="btn btn-primary btn-lg">赞</a>
                @endif
            </div>

        </div>
{{--
        <div class="panel panel-default">
            <!-- Default panel contents -->
            <div class="panel-heading">评论</div>

            <!-- List group -->
            <ul class="list-group">
                @foreach($post->comments as $comment)
                <li class="list-group-item">
                    <h5>{{$comment->created_at}} by {{$comment->user->name}}</h5>
                    <div>
                        {{$comment->content}}
                    </div>
                </li>
                @endforeach
            </ul>
        </div>

        <div class="panel panel-default">
            <!-- Default panel contents -->
            <div class="panel-heading">发表评论</div>

            <!-- List group -->
            <ul class="list-group">
                <form action="/posts/comment" method="post">
                    {{csrf_field()}}
                    <input type="hidden" name="post_id" value="{{$post->id}}"/>
                    <li class="list-group-item">
                        <textarea name="content" class="form-control" rows="10"></textarea>
                        <button class="btn btn-default" type="submit">提交</button>
                    </li>
                </form>

            </ul>
        </div>--}}

    </div><!-- /.blog-main -->



@endsection