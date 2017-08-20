@extends("layout.main")

@section("content")

    <div class="col-sm-8 blog-main">
            @foreach($notices as $notice)
                <div class="blog-post">
                    {{--<p class="blog-post-meta"  style="   border-bottom:1px solid darkgrey;" >{{$notice->title}}</p>--}}

                    <p  style="    border-bottom:1px solid darkgrey;">{{$notice->title}} ：{{$notice->content}}</p>
                </div>
            @endforeach
    </div><!-- /.blog-main -->


@endsection