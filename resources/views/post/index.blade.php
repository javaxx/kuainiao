@extends("layout.main")

@section("content")
    @include('flash::message')

    <div class="col-sm-8 blog-main">
        @include("post.carousel")
        <div style="height: 20px;">
        </div>
        <div>
            @foreach($posts as $post)
            <div class="blog-post">
                <h2 class="blog-post-title"><a href="/posts/{{$post->id}}" >{{$post->title}}</a></h2>
                <p class="blog-post-meta">{{$post->created_at->toFormattedDateString()}}          by     <mark>{{$post->user->name}}</mark></p>
                {!! str_limit($post->content, 400, '...') !!}
                <p class="blog-post-meta">  浏览  {{ count($post->visitors) }}  |  兑换 {{$post->buys_count}}    |   赞 {{$post->zans_count}}  | 评论 {{$post->comments_count}}  </p>
            </div>
            @endforeach

            {{$posts->links()}}
        </div><!-- /.blog-main -->
    </div>
@endsection