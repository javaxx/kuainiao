
<!DOCTYPE html>
<html lang="zh-CN">
<head>
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <!-- 上述3个meta标签*必须*放在最前面，任何其他内容都*必须*跟随其后！ -->
    <meta name="description" content="">
    <meta name="author" content="">
    <meta name="csrf-token" content="{{ csrf_token() }}">
        <meta name="renderer" content="webkit">
        <meta http-equiv="Cache-Control" content="no-siteapp">
        <meta http-equiv="Cache-Control" content="no-transform ">
        <meta http-equiv="X-UA-Compatible" content="IE=Edge,chrome=1">
        <meta name="viewport" content="width=device-width, initial-scale=1.0">
        <meta name="keywords" content="快鸟先飞 - 致力于分享全面优质的IT编程开发视频教程">
        <meta name="description" content="快鸟先飞 - 致力于分享全面优质的IT编程开发视频教程">
         <meta name="baidu_union_verify" content="a49f5c3e8a49b9beb34caae0e2db534a">
        <meta name="keywords" content="Android,ios,java,php,视频教程,IT开发,自学,计算机网络，操作系统，黑客技术，数据库，单片机，嵌入式开发,自学编程">
        <meta name="description" content="Android,ios,java,php,视频教程,IT开发,自学，计算机网络，操作系统，黑客技术，数据库，单片机，嵌入式开发，自学编程">
        <script>
            var _hmt = _hmt || [];
            (function() {
                var hm = document.createElement("script");
                hm.src = "https://hm.baidu.com/hm.js?8f6175d0c293c8af59ef57d18c1a3f84";
                var s = document.getElementsByTagName("script")[0];
                s.parentNode.insertBefore(hm, s);
            })();
        </script>
        <title>快鸟先飞 - 致力于分享全面优质的IT编程开发视频教程</title>

        <link rel="canonical" href="https://www.numbersi.cn">


        <meta name="keywords" content="开发教程，Android视频教程，ios教程，javaweb教程,c语言，c++语言，web前端，asp.net"><meta name="description" content="开发教程，Android视频教程，ios教程，javaweb教程,c语言，c++语言，web前端，asp.net"></head>
    <title>laravel for blog</title>

    <!-- Bootstrap core CSS -->
    <link href="https://cdn.bootcss.com/bootstrap/3.3.7/css/bootstrap.min.css" rel="stylesheet">

    <style>body {
          padding-top: 200px;/*有顶部固定导航条时设置*/
            padding-bottom: 200px;/*有底部固定导航条时设置*/
        }</style>
    <!-- Custom styles for this template -->
    <link href="/css/blog.css" rel="stylesheet">
    <link rel="stylesheet" type="text/css" href="/css/wangEditor.min.css">


    <!-- HTML5 shim and Respond.js for IE8 support of HTML5 elements and media queries -->
    <!--[if lt IE 9]>
    <script src="https://cdn.bootcss.com/html5shiv/3.7.3/html5shiv.min.js"></script>
    <script src="https://cdn.bootcss.com/respond.js/1.4.2/respond.min.js"></script>

    <![endif]-->
</head>

<body>

@include('layout.nav')

<div class="container">

    <div class="blog-header">
    </div>

    <div class="row">
        @include('flash::message')

        @yield("content")

        @include("layout.sidebar")
    </div><!-- /.row -->
</div><!-- /.container -->

@include("layout.footer")

@yield("pagejs")
<!-- Bootstrap core JavaScript
================================================== -->
<!-- Placed at the end of the document so the pages load faster -->
<script src="https://cdn.bootcss.com/jquery/1.12.4/jquery.min.js"></script>
<script src="https://cdn.bootcss.com/bootstrap/3.3.7/js/bootstrap.min.js"></script>
<script type="text/javascript" src="/js/wangEditor.min.js"></script>
<script src="{{ mix('/js/ylaravel.js') }}">



</script>
<script>
    $('#flash-overlay-modal').modal();
</script>

</body>
</html>
