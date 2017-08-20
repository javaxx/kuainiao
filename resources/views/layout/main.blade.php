
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

    <meta name="viewport" content="width=device-width, initial-scale=1.0, minimum-scale=1.0, maximum-scale=1.0 user-scalable=no">
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


    <!-- Custom styles for this template -->
    <link href="/css/blog.css" rel="stylesheet">
    <link rel="stylesheet" type="text/css" href="/css/wangEditor.min.css">

<script src="https://cdn.bootcss.com/jquery/1.11.1/jquery.min.js"></script>
<script src="https://cdn.bootcss.com/bootstrap/3.3.7/js/bootstrap.min.js"></script>
    <!-- HTML5 shim and Respond.js for IE8 support of HTML5 elements and media queries -->
    <!--[if lt IE 9]>
    <script src="https://cdn.bootcss.com/html5shiv/3.7.3/html5shiv.min.js"></script>
    <script src="https://cdn.bootcss.com/respond.js/1.4.2/respond.min.js"></script>

    <![endif]-->

<style>

    body {
        padding-top: 50px;
        padding-bottom: 40px;
        color: #5a5a5a;
    }

    /* 轮播广告 */

    .carousel {
        height: 500px;
        margin-bottom: 60px;
    }

    .carousel .item {
        height: 500px;
        background-color: #000;
    }

    .carousel .item img {
        width: 100%;
    }

    .carousel-caption {
        z-index: 10;
    }

    .carousel-caption p {
        margin-bottom: 20px;
        font-size: 20px;
        line-height: 1.8;
    }

    /* 简介 */

    .summary {
        padding-right: 15px;
        padding-left: 15px;
    }

    .summary .col-md-4 {
        margin-bottom: 20px;
        text-align: center;
    }

    /* 特性 */

    .feature-divider {
        margin: 40px 0;
    }

    .feature {
        padding: 30px 0;
    }

    .feature-heading {
        font-size: 50px;
        color: #2a6496;
    }

    .feature-heading .text-muted {
        font-size: 28px;
    }

    /* 响应式布局 */

    @media (max-width: 768px) {

        .summary {
            padding-right: 3px;
            padding-left: 3px;
        }

        .carousel {
            height: 300px;
            margin-bottom: 30px;
        }

        .carousel .item {
            height: 300px;
        }

        .carousel img {
            min-height: 300px;
        }

        .carousel-caption p {
            font-size: 16px;
            line-height: 1.4;
        }

        .feature-heading {
            font-size: 34px;
        }

        .feature-heading .text-muted {
            font-size: 22px;
        }
    }
    .col-center-block {
        float: none;
        display: block;
        margin-left: auto;
        margin-right: auto;
    }

    @media (min-width: 992px) {
        .feature-heading {
            margin-top: 120px;
        }
    }
</style>
</head>

<body>
<!-- 顶部导航 -->
@include('layout.nav')


<div id="ad-carousel" class="carousel slide" data-ride="carousel">
    <ol class="carousel-indicators">
        <li data-target="#ad-carousel" data-slide-to="0" class="active"></li>

    </ol>
    <div class="carousel-inner">
        <div class="item active">
            <img src="http://ouqn3vrmw.bkt.clouddn.com/c.jpg" alt="1 slide">

            <div class="container">
                <div class="carousel-caption">
                    <h1>飛鳥</h1>

                    <p>若能飞.无需徘徊</p>

                    {{--                    <p><a class="btn btn-lg btn-primary" href="http://www.google.cn/intl/zh-CN/chrome/browser/"
                                              role="button" target="_blank">点我下载</a></p>--}}
                </div>
            </div>
        </div>

    </div>
    <a class="left carousel-control" href="#ad-carousel" data-slide="prev"><span
                class="glyphicon glyphicon-chevron-left"></span></a>
    <a class="right carousel-control" href="#ad-carousel" data-slide="next"><span
                class="glyphicon glyphicon-chevron-right"></span></a>
</div>

<!-- 主要内容 -->
<div class="col-lg-12">

    <div class="col-lg-8 ">
        <div class="col-center-block">
            @yield("content")
        </div>

    </div>
    <div class="col-lg-4">
        @include("layout.sidebar")

    </div>
</div>
<div class="col-lg-12">
@include("layout.footer")

</div>


</body>

<script>
    $('#flash-overlay-modal').modal();

</script>
<script>
    $(function () {
        $('#ad-carousel').carousel();
    });
</script>

</html>
