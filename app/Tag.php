<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Tag extends Model
{
//Relationships

    public function articles()
    {
        return $this->belongsToMany(Article::class);
    }
}
