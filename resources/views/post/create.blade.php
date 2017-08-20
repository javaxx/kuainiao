@extends("layout.main")

@section("content")
    @include('vendor.ueditor.assets')

    <div class="col-sm-8 blog-main">
        <form action="/posts" method="POST">
            {{csrf_field()}}
            <div class="form-group">
                <label>标题</label>
                <input name="title" type="text" class="form-control" placeholder="这里是标题">
            </div>
            <div class="form-group">
                <label>链接</label>
                <input name="links" type="text" class="form-control" placeholder="这是链接">
            </div>
            <div class="form-group">
                <label>金币</label>
                <input name="gold" type="text" class="form-control" placeholder="金币数量">
            </div>
            <div class="form-group">
                <label>内容</label>
{{--
                <textarea id="content"  style="height:400px;max-height:500px;" name="content" class="form-control" placeholder="这里是内容"></textarea>
--}}



                <!-- 编辑器容器 -->
                <script id="container" name="content" type="text/plain"></script>
            </div>

            @include("layout.error")
            <button type="submit" class="btn btn-default">提交</button>
        </form>
        <br>

        <script type="text/javascript">
            var ue = UE.getEditor('container');
            ue.ready(function() {
                ue.execCommand('serverparam', '_token', '{{ csrf_token() }}'); // 设置 CSRF token.
            });
        </script>

    </div><!-- /.blog-main -->

    <!-- 实例化编辑器 -->

@endsection