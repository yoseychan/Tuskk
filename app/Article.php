<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Article extends Model
{
    protected $appends = ['likes_count', 'if_i_liked'];
    protected $fillable = ['title', 'body', 'excerpt', 'image', 'featured', 'user_id', 'role_id', 'category_id', 'avatar'];


    //Relations
    public function user()
    {
        return $this->belongsTo(User::class);
    }

    public function category()
    {
        return $this->belongsTo(Category::class);
    }

    public function tags()
    {
        return $this->belongsToMany(Tag::class);
    }

    public function comments()
    {
        return $this->hasMany(Comment::class);
    }

    public function likes()
    {
        return $this->belongsToMany(User::class, 'likes', 'article_id', 'user_id');
    }

    public function getLikesCountAttribute()
    {
        return $this->likes()->count();
    }

    public function getIfILikedAttribute()
    {
        $user = \Auth::user() ?? \Auth::guard("api")->user();

        if ($user) {
            return ($this->likes()->where('user_id', $user->id)->exists()) ?? true;
        }
        return false;
    }

}
