@extends("layout.main")

@section("content")

    <!-- 广告轮播 -->
    @include("post.carousel")

    <div class="container summary">

        <!-- 简介 -->
        @foreach($posts->chunk(4) as $chunk)

        <div class="row" id="summary-container">
            @foreach($chunk as $post)

               <div class="col-md-3">
                    <h5><a href="/posts/{{$post->id}}" >{{$post->title}}</a></h5>
                    <p class="blog-post-meta">{{$post->created_at->toFormattedDateString()}}          by     <mark>{{$post->user->name}}</mark></p>
                    <p class="blog-post-meta">  浏览  {{ count($post->visitors) }}  |  兑换 {{$post->buys_count}}    |   赞 {{$post->zans_count}}  | 评论 {{$post->comments_count}}  </p>
                    <p><a class="btn btn-default" href="/posts/{{$post->id}}"  role="button">点我下载</a></p>
                </div>
            @endforeach



        </div>
        @endforeach

        </div>



@endsection