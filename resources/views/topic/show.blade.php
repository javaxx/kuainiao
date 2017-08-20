@extends("layout.main")

@section("content")

    <div class="col-sm-2">
        <blockquote>
            <p>{{$topic->name}}</p>
            <footer>文章：{{$topic->posts()->count()}}</footer>
            @if(\Auth::user())
                <button class="btn btn-default topic-submit"  data-toggle="modal" data-target="#topic_submit_modal" topic-id="{{$topic->id}}" _token="{{csrf_token()}}" type="button">投稿</button>

                @endif
        </blockquote>
    </div>

    <div class="container summary">

        <!-- 简介 -->
        <div class="row" id="summary-container">
            @foreach($posts as $post)
                <div class="col-md-4">

                    <h2><a href="/posts/{{$post->id}}" >{{$post->title}}</a></h2>
                    <p class="blog-post-meta">{{$post->created_at->toFormattedDateString()}}          by     <mark>{{$post->user->name}}</mark></p>
                    <p class="blog-post-meta">  浏览  {{ count($post->visitors) }}  |  兑换 {{$post->buys_count}}    |   赞 {{$post->zans_count}}  | 评论 {{$post->comments_count}}  </p>

                    <p><a class="btn btn-default" href="#" role="button">点我下载</a></p>
                </div>



            @endforeach
        </div>

    </div>

@endsection