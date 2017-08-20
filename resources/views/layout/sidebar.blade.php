<div id="sidebar"   class="col-xs-12 col-sm-4 col-md-4 col-lg-4     ">


    <aside id="widget-welcome" class="widget panel panel-default">
        <div class="panel-heading">
            欢迎  来到快鸟先飞！

        </div>
        <div class="panel-body">
            <p>
                关注 快鸟先飞 公众号.每天签到领金币
            </p>
            <p>
               <img  style="width: 220px;height: 220px" src="/erweima.jpg"  />
            </p>
            <div class="bdsharebuttonbox bdshare-button-style0-24" data-bd-bind="1494580268777"><a href="#" class="bds_more" data-cmd="more"></a><a href="#" class="bds_tsina" data-cmd="tsina" title="分享到新浪微博"></a><a href="#" class="bds_renren" data-cmd="renren" title="分享到人人网"></a><a href="#" class="bds_douban" data-cmd="douban" title="分享到豆瓣网"></a><a href="#" class="bds_weixin" data-cmd="weixin" title="分享到微信"></a><a href="#" class="bds_qzone" data-cmd="qzone" title="分享到QQ空间"></a><a href="#" class="bds_tqq" data-cmd="tqq" title="分享到腾讯微博"></a><a href="#" class="bds_bdhome" data-cmd="bdhome" title="分享到百度新首页"></a></div>

        </div>
    </aside>
    <aside id="widget-categories" class="widget panel panel-default">
        <div class="panel-heading">
            专题
        </div>

        <ul class="category-root list-group">
            @foreach($topics as $topic)
                <li class="list-group-item">
                    <a href="/topic/{{$topic->id}}">{{$topic->name}}>>><data style="float: right;font-size:20px;" >{{$topic->posts->count()}}</data>
                    </a>
                </li>
            @endforeach
        </ul>

    </aside>
</div>
</div>