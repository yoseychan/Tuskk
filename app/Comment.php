<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Comment extends Model
{
     protected $fillable = ['article_id', 'user_id', 'content'];


    //Relations
    public function user()
    {
        return $this->belongsTo(User::class);
    }
}
