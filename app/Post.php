<?php

namespace App;

use \App\Model;
use Laravel\Scout\Searchable;
use Illuminate\Database\Eloquent\Builder;

class Post extends Model
{
   // use Searchable;

    protected $table = "posts";




    /*
     * 所有评论
     */
    public function comments()
    {
        return $this->hasMany('\App\Comment')->orderBy('created_at', 'desc');
    }

    /*
     * 作者
     */
    public function user()
    {
        return $this->belongsTo(\App\User::class, 'user_id', 'id');
    }

    /*
     * 点赞
     */
    public function zans()
    {
        return $this->hasMany(\App\Zan::class)->orderBy('created_at', 'desc');
    }

    /*
     * 判断一个用户是否已经给这篇文章点赞了
     */
    public function zan($user_id)
    {
        return $this->hasOne(\App\Zan::class)->where('user_id', $user_id);
    }

    /*
     * 一篇文章有哪些主题
     */
    public function topics()
    {
        return $this->belongsToMany(\App\Topic::class, 'post_topics', 'post_id', 'topic_id')->withPivot(['topic_id', 'post_id']);
    }

    public function postTopics()
    {
        return $this->hasMany(\App\PostTopic::class, 'post_id');
    }

    public function scopeTopicNotBy(Builder $query, $topic_id)
    {
        return $query->doesntHave('postTopics', 'and', function($q) use ($topic_id) {
            $q->where("topic_id", $topic_id);
        });
    }


    public function scopeAuthorBy($query, $user_id)
    {
        return $query->where('user_id', $user_id);
    }

    /*
     * 可以显示的文章
     */
    public function scopeAviable($query)
    {
        return $query->whereIn('status', [0, 1]);
    }
    /*
     * 是否购买
     */

    public function isBuy(User $user)
    {
       return $this->buys->contains($user);
    }
    public function buys()
    {
        return $this->belongsToMany(\App\User::class, 'get', 'post_id', 'user_id')->withTimestamps();
    }


    /**
     * 文章与访问登记数一对多的关联关系
     */
    public function visitors()
    {
        return $this->hasMany('App\VisitorRegistry');
    }
}
