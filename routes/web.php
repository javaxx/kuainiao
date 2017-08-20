<?php

/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
| Here is where you can register web routes for your application. These
| routes are loaded by the RouteServiceProvider within a group which
| contains the "web" middleware group. Now create something great!
|
/*
 *推广
*/

    Route::get('/', '\App\Http\Controllers\PostController@index');
    Route::get('/test', function () {
     return    \App\Server\WechatMessageSever::index('签到','oPNmtt-xrda9Ye_jrqch2vSxhIcg','23123');
    });    Route::get('/test2', function () {
     return    \App\Server\WechatMessageSever::index('绑定:136222866@qq.com','oPNmtt-xrda9Ye_jrqch2vSxhIcg','23123');
    });

    Route::any('/numbersi_deploy','DeployController@deploy');
    Route::any('/wechat', "\App\Http\Controllers\WechatController@wechat");
    Route::any('/captcha/{random}', "\App\Http\Controllers\CaptchaController@getCaptcha");
    Route::group(['middleware' => 'throttle'], function () {
    Route::get('/spread/{sid}', "\App\Http\Controllers\SpreadController@spread")->name('spread');
    Route::get('/spread', "\App\Http\Controllers\SpreadController@index");
    Route::post('/spread/register', "\App\Http\Controllers\SpreadController@register");
    Route::get('/mail', '\App\Http\Controllers\SpreadController@mail');
    Route::get('/mail/verify/{token}', '\App\Http\Controllers\SpreadController@verifyMail')->name('email.verify');
    Route::get('/login', "\App\Http\Controllers\LoginController@index");
// 文章
    Route::get('/posts', '\App\Http\Controllers\PostController@index');
    Route::get('/topic/{topic}', '\App\Http\Controllers\TopicController@show');\
    Route::get('/posts/create', '\App\Http\Controllers\PostController@create');
    Route::get('/posts/{post}', '\App\Http\Controllers\PostController@show');

    Route::group(['middleware' => 'auth:web'], function(){

        Route::post('/posts', '\App\Http\Controllers\PostController@store');

        Route::get('/posts/search', '\App\Http\Controllers\PostController@search');
        Route::get('/posts/{post}/edit', '\App\Http\Controllers\PostController@edit');
        Route::put('/posts/{post}', '\App\Http\Controllers\PostController@update');
        Route::post('/posts/img/upload', '\App\Http\Controllers\PostController@imageUpload');
        Route::post('/posts/comment', '\App\Http\Controllers\PostController@comment');
        Route::get('/posts/{post}/zan', '\App\Http\Controllers\PostController@zan');
        Route::get('/posts/{post}/unzan', '\App\Http\Controllers\PostController@unzan');

        Route::get('/posts/{post}/get', '\App\Http\Controllers\PostController@get');
        // 个人主页
        Route::get('/user/{user}', '\App\Http\Controllers\UserController@show');
        Route::get('/me', '\App\Http\Controllers\UserController@me');
        Route::post('/user/{user}/fan', '\App\Http\Controllers\UserController@fan');
        Route::post('/user/{user}/unfan', '\App\Http\Controllers\UserController@unfan');

        // 个人设置
        Route::get('/user/{user}/setting', '\App\Http\Controllers\UserController@setting');
        Route::post('/user/{user}/setting', '\App\Http\Controllers\UserController@settingStore');

        // 专题
        // Route::get('/topic/{topic}', '\App\Http\Controllers\TopicController@show');
        Route::get('/topic/{topic}/submit', '\App\Http\Controllers\TopicController@submit');

        // 通知
        Route::get('/notices', '\App\Http\Controllers\NoticeController@index');
    });

    Route::get('/login', "\App\Http\Controllers\LoginController@index")->name('login');
    Route::post('/login', "\App\Http\Controllers\LoginController@login");
    Route::get('/logout', "\App\Http\Controllers\LoginController@logout");

    Route::get('/register', "\App\Http\Controllers\RegisterController@index");
    Route::post('/register', "\App\Http\Controllers\RegisterController@register");

});


Route::group(['prefix' => 'NumbersiAdmin'], function() {

    Route::get('/login', '\App\Admin\Controllers\LoginController@index');
    Route::post('/login', '\App\Admin\Controllers\LoginController@login');
    Route::get('/logout', '\App\Admin\Controllers\LoginController@logout');

    // 需要登陆的
    Route::group(['middleware' => 'auth:admin'], function(){
        Route::get('/home', '\App\Admin\Controllers\HomeController@index');

        // 系统管理
        Route::group(['middleware' => 'can:system'], function(){
            // 用户管理
            Route::get('/users', '\App\Admin\Controllers\UserController@index');
            Route::get('/users/create', '\App\Admin\Controllers\UserController@create');
            Route::post('/users/store', '\App\Admin\Controllers\UserController@store');
            Route::get('/users/{user}/role', '\App\Admin\Controllers\UserController@role');
            Route::post('/users/{user}/role', '\App\Admin\Controllers\UserController@storeRole');

            // 角色管理
            Route::get('/roles', '\App\Admin\Controllers\RoleController@index');
            Route::get('/roles/create', '\App\Admin\Controllers\RoleController@create');
            Route::post('/roles/store', '\App\Admin\Controllers\RoleController@store');
            Route::get('/roles/{role}/permission', '\App\Admin\Controllers\RoleController@permission');
            Route::post('/roles/{role}/permission', '\App\Admin\Controllers\RoleController@storePermission');

            // 权限管理
            Route::get('/permissions', '\App\Admin\Controllers\PermissionController@index');
            Route::get('/permissions/create', '\App\Admin\Controllers\PermissionController@create');
            Route::post('/permissions/store', '\App\Admin\Controllers\PermissionController@store');
        });

        // 文章管理
        Route::group(['middleware' => 'can:post'], function() {
            // 文章管理
            Route::get('/posts', '\App\Admin\Controllers\PostController@index');
            Route::post('/posts/{post}/status', '\App\Admin\Controllers\PostController@status');
        });

        // 专题模块
        Route::group(['middleware' => 'can:topic'], function(){
            Route::resource('topics', '\App\Admin\Controllers\TopicController', ['only' => [
                'index', 'create', 'store', 'destroy'
            ]]);
        });

        // 通知模块
        Route::group(['middleware' => 'can:notice'], function(){
            Route::resource('notices', '\App\Admin\Controllers\NoticeController', [
                'only' => ['index', 'create', 'store'],
            ]);
        });
    });
});