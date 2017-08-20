<?php

namespace App\Http\Controllers;

use App\Topic;
use App\User;
use Illuminate\Http\Request;
use App\Post;
use Auth;
use Visitor;

class PostController extends Controller
{
    /*
     * 文章列表
     */
    public function index()
    {
        $user = \Auth::user();
        $posts = Post::aviable()->orderBy('created_at', 'desc')->withCount(["zans", "comments",'buys'])->with(['user'])->paginate(6);

        return view('post/index', compact('posts'));
    }



    public function create()
    {
        $topics = Topic::all();

        if (Auth::check()){
            $id = Auth::id();
            if($id ==1){
                return view('post/create',compact('topics'));
            }
        }
        flash('尚未开放,若想推荐资源,发邮件到 numbersi@vip.qq.com 至少获得50金币')->info();
        return back();
    }

    public function store(Request $request)
    {
        $this->validate($request, [
            'title' => 'required|max:255|min:1',
            'content' => 'required|min:1',
        ]);
       $topic = Topic::find(request('topic'));
       $params = array_merge(request(['title', 'content','links','gold']), ['user_id' => \Auth::id()]);


        $topic->posts()->attach(Post::create($params));


        return redirect('/posts');
    }

    public function edit(Post $post)
    {
        return view('post/edit', compact('post'));
    }

    public function show(\App\Post $post)
    {
        Visitor::log($post->id);
        return view('post/show', compact('post'));
    }

    public function update(Request $request, Post $post)
    {
        $this->validate($request, [
            'title' => 'required|max:255|min:4',
            'content' => 'required|min:100',
        ]);

        $this->authorize('update', $post);

        $post->update(request(['title', 'content']));
        return redirect("/posts/{$post->id}");
    }

    /*
     * 文章评论保存
     */
    public function comment()
    {
        $this->validate(request(),[
            'post_id' => 'required|exists:posts,id',
            'content' => 'required|min:10',
        ]);

        $user_id = \Auth::id();

        $params = array_merge(
            request(['post_id', 'content']),
            compact('user_id')
        );
        \App\Comment::create($params);
        return back();
    }

    /*
     * 点赞
     */
    public function zan(Post $post)
    {
        $zan = new \App\Zan;
        $zan->user_id = \Auth::id();
        $post->zans()->save($zan);
        return back();
    }

    /*
     * 取消点赞
     */
    public function unzan(Post $post)
    {
        $post->zan(\Auth::id())->delete();
        return back();
    }
    /*
     * get 获取
     */
    public function get(Post $post)
    {
        $user = \Auth::user();

        if ($post->isBuy($user)) {
            return back();
        }
        $residue_gold =   $user->gold - $post->gold;
        if ($residue_gold >=0) {

            $user->gold = $residue_gold;
            $post->buys()->attach($user);
            if ($user->save()) {
                $messages = '获取成功';

            }else{
                $messages = '失败';
            }

            flash(   $messages)->success();
            return back();


        } else {
            $messages = '金币不够, 你还有' . $user->gold . '  差' . -$residue_gold;
            flash()->overlay($messages, 'Yay');
        }
        flash()->overlay('Modal Message', 'Modal Title');
            return back();
    }

    /*
     * 搜索页面
     */
    public function search()
    {
        $this->validate(request(),[
            'query' => 'required'
        ]);

        $query = request('query');
        $posts = Post::search(request('query'))->paginate(10);
        return view('post/search', compact('posts', 'query'));
    }
}
