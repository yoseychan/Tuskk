<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Article extends Model
{

    protected $fillable = [ 'title', 'body', 'excerpt', 'image', 'user_id', 'category_id'];


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

}
