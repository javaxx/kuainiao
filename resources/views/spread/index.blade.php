@extends("layout.main")

@section("content")
    @include('flash::message')
    <div class="col-sm-8 blog-main">

        <table class="table table-bordered credit-table">
            <thead>
            <tr class="active">
                <th>积金币方法</th>
                <th>一次得金币</th>
                <th>可用次数</th>
            </tr>
            </thead>
            <tbody>
            <tr>
                <td>注册奖励</td>
                <td>20金币</td>
                <td>只有 1 次</td>
            </tr>
            <tr>
                <td>微信公众号绑定</td>
                <td>40 金币</td>
                <td>只有 1 次</td>
            </tr>
            <tr>
                <td>微信公众号签到</td>
                <td>(3+(连续天数)/2)金币</td>
                <td>每天 1 次(连续签到会更多奖励)</td>
            </tr>
            <tr>
                <td>贡献视频教程</td>
                <td>最低 50金币 </td>
                <td>每天 1 次</td>
            </tr>
            <tr>
                <td>注册推广</td>
                <td>10 金币</td>
                <td>每天 5 次</td>
            </tr>

            </tbody>
        </table>
        <div class="alert alert-success">
            <p><strong>*注1：</strong></p>
            <p><strong>1、注册推广：登录本站后，点击用户名->我的主页,复制自己的推广链接，别人通过此链接注册激活邮箱,本站后你就可以获取10金币。可以把自己的推广链接金币享到QQ群，朋友圈，贴吧等随便宣传一下几百金币还是很容易的</strong></p>
            <p><strong>2、如用金币换取的资源下载链接被取消或者下载的资源需要播放密码而没有提供的，请及时向我们反馈，反馈经核实后，奖励10金币！如有谎报，扣除所有金币！</strong></p>
            <p><strong>3、如对本站为本站的发展提出建议并被采纳的奖励10金币！</strong></p>
            <p><strong>4、投稿资源,发送到numbersi@vip.qq.com  最低50金币</strong></p>
        </div>
        <div class="alert alert-danger">
            <p><strong>扣金币项：</strong></p>
            <p>1、由于本站成本有限，服务器和数据库存储空间较低,微信公公众号签到的功能，评论功能的开通只为方便大家相互学习和交流，因此不必须要的留言如“签到”，“你好”等，不要发表，否则一律当垃圾评论处理，并扣除所有金币，请大家谅解！</p>
            <p>2、投稿功能是为了金币享大家的资源和技术文章而设，审核需要花费本站的人力和时间成本，希望要严格遵守本站的投稿指南要求，如果是明显的垃圾文章，将扣除所有金币！</p>
        </div>
    </div><!-- /.blog-main -->

@endsection