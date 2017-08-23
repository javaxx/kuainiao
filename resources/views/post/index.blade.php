@extends("layout.main")

@section("content")

    <!-- 广告轮播 -->
    @include("post.carousel")

    <div class="container summary">

        <!-- 简介 -->
        <div class="row" id="summary-container">
            @foreach($posts as $post)
                <div class="col-md-4">

                    <h2><a href="/posts/{{$post->id}}" >{{$post->title}}</a></h2>
                    <p class="blog-post-meta">{{$post->created_at->toFormattedDateString()}}          by     <mark>{{$post->user->name}}</mark></p>
                    <p class="blog-post-meta">  浏览  {{ count($post->visitors) }}  |  兑换 {{$post->buys_count}}    |   赞 {{$post->zans_count}}  | 评论 {{$post->comments_count}}  </p>

                    <p><a class="btn btn-default" href="/posts/{{$post->id}}"  role="button">点我下载</a></p>
                </div>



            @endforeach
        </div>

        </div>



@endsection