<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Category extends Model
{

    protected $fillable = ['title'];
    public $timestamps = false;

    public function articles()
    {
        return $this->hasMany(Article::class);
    }
}
